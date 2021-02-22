<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentQualification;
use App\Models\BranchWallet;
use App\Models\WalletHistory;
use App\Models\Board;
use App\Models\BranchDetails;
use App\Models\Marks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use File;
use Image;

class StudentController extends Controller
{

    public function studentList(){
        return view('admin.student.student_list');
    }

    public function studentListAjax(){
        return datatables()->of(StudentDetail::latest()->get())
            ->addIndexColumn()
            ->addColumn('branch', function ($row) {
                return isset($row->student->branchDetails->center_name)?$row->student->branchDetails->center_name:'';
           
            })->addColumn('course', function ($row) {
                return isset($row->student->course->name)?$row->student->course->name:'';
           
            })->addColumn('enrollment_id', function ($row) {
                return isset($row->student->enrollment_id)?$row->student->enrollment_id:'';
           
            })->addColumn('status', function ($row) {
               if($row->student->is_reg_fee_paid == 2){
                    return '<a class="btn btn-success btn-sm">Reg Fee Paid</a>';
               }else{
                    return '<a class="btn btn-warning btn-sm">Reg Fee Not Paid</a>';
               }
           
            })->addColumn('action', function ($row) {
                // $btn = '<a href="'.route('admin.branch_wallet_history',['id'=>$row->id]).'" class="btn btn-primary">View</a>';
        
                return $btn = '<a href="'.route('admin.edit_student_form',['student_id'=>$row->student->id]).'" class="btn btn-info">Edit</a>';
            })->rawColumns(['branch','action','course','status'])
            ->make(true);
    }

    public function studentEditForm($student_id){
        $student_details = StudentDetail::where('student_id',$student_id)->first();
        $courses = Course::get();
        $qualification =StudentQualification::where('student_id',$student_id)->get();
        return view('admin.student.edit_student_form',compact('student_details','courses','qualification'));

    }
    
    public function retriveCourseFees($course_id){
        $course = Course::where('id',$course_id)->where('status',1)->first();
        $course_fees = $course->course_fees;
        if($course_fees){
            return $course_fees;
        }else{
            return 2;
        }
    }

    public function removeQual($qual_id){
        $qualification =StudentQualification::where('id',$qual_id)->first();
        $qualification->delete();
        return redirect()->back();
    }

    public function updateStudent(Request $request,$id,$branch_id){
        $this->validate($request,[
            'course'=>'required|numeric',
            'student_name'=>'required',
            'mob_no'=>'required|numeric|digits:10',
            'dob'=>'required|date',
            'state'=>'required',
            'city'=>'required',
            'country'=>'required',
            'pin'=>'required|numeric',
            'address'=>'required',
            'category'=>'required|numeric',
            'gender'=>'required|numeric',
            'medium'=>'required|numeric',
            'sign'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'profile'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'exam'=>'array|required|min:1',
            'board'=>'array|required|min:1',
            'college'=>'array|required|min:1',
            'year'=>'array|required|min:1',
            'marks'=>'array|required|min:1',

        ]);

        
        $student =  Student::where('id',$id)->first();
        $student->course_id = $request->input('course');
        $student->is_reg_fee_paid = 2;
        $student->reg_fee_paid_date = Carbon::today();
        
        if($student->save()){
          
            $exam = $request->input('exam');
            $board = $request->input('board');
          
            $college = $request->input('college');
            $year = $request->input('year');
            $marks = $request->input('marks');
            $quali_id = $request->input('quali_id');
            for($i=0;$i<count($exam);$i++){
                if(isset($quali_id[$i]) && !empty($quali_id[$i])){
                    $qualification = StudentQualification::where('id',$quali_id[$i])->first();
                    if($qualification){
                        $qualification->student_id = $student->id;
                        $qualification->exam_name= $exam[$i];
                        $qualification->board = $board[$i];
                        $qualification->college = $college[$i];
                        $qualification->year_of_passing = $year[$i];
                        $qualification->marks_obtained = $marks[$i];
                        $qualification->save();
                    }
                }else{
                    $qualification = new StudentQualification();
                    $qualification->student_id = $student->id;
                    $qualification->exam_name= $exam[$i];
                    $qualification->board = $board[$i];
                    $qualification->college = $college[$i];
                    $qualification->year_of_passing = $year[$i];
                    $qualification->marks_obtained = $marks[$i];
                    $qualification->save();

                }

            }
            
            
            
            $student_details = StudentDetail::where('student_id',$id)->first();
            $student_details->student_id =$student->id;
            $student_details->name = $request->input('student_name');
            if(!empty( $request->input('c_o'))){
                $student_details->father_name = $request->input('c_o');
            }
            $student_details->mother_name = $request->input('mother_name');
            if(!empty($request->input('hus_name'))){
                $student_details->husband_name = $request->input('hus_name');
            }
            $student_details->address = $request->input('address');
            $student_details->city = $request->input('city');
            $student_details->state_code = $request->input('state');
            $student_details->country = $request->input('country');
            $student_details->pin = $request->input('pin');
            if(!empty($request->input('tel_no'))){
                $student_details->tel_no = $request->input('tel_no');
            }
            $student_details->mob_no = $request->input('mob_no');
            if(!empty($request->input('email'))){
                $student_details->email = $request->input('email');
            }
            $student_details->dob = $request->input('dob');
            $student_details->category = $request->input('category');
            $student_details->gender = $request->input('gender');
            $student_details->medium = $request->input('medium');
            if($student_details->save()){
                if ($request->hasFile('profile')) {
                    $cat_prev_image = $student_details->image;
                    $prev_img_delete_path = base_path().'/public/images/student/'.$cat_prev_image;
                    $prev_img_delete_path_thumb = base_path().'/public/images/student/thumb/'.$cat_prev_image;
                    if ( File::exists($prev_img_delete_path)) {
                        File::delete($prev_img_delete_path);
                    }

                    if ( File::exists($prev_img_delete_path_thumb)) {
                        File::delete($prev_img_delete_path_thumb);
                    }
        

                    $image = $request->file('profile');
                    $image_name = time() . date('Y-M-d') . '.' . $image->getClientOriginalExtension();
                    $destinationPath = base_path() . '/public/images/student/';
                    $img = Image::make($image->getRealPath());
                    $img->save($destinationPath . '/' . $image_name);
                    $destination = base_path() . '/public/images/student/thumb';
                    $img = Image::make($image->getRealPath());
                    $img->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destination . '/' . $image_name);
                    $student_details->image = $image_name;
                    $student_details->save();
                }
                if ($request->hasFile('sign')) {
                    $prev_image = $student_details->sign;

                    $img_delete_path = base_path().'/public/images/student/'.$prev_image;
                    $img_delete_path_thumb = base_path().'/public/images/student/thumb/'.$prev_image;
                    if ( File::exists($img_delete_path)) {
                        File::delete($img_delete_path);
                    }

                    if ( File::exists($img_delete_path_thumb)) {
                        File::delete($img_delete_path_thumb);
                    }
        

                    $images = $request->file('sign');
                    $images_name = time() . date('Y-M-d') . '.' . $images->getClientOriginalExtension();
                    $destinationPath = base_path() . '/public/images/student/';
                    $imgs = Image::make($images->getRealPath());
                    $imgs->save($destinationPath . '/' . $images_name);
                    $destination = base_path() . '/public/images/student/thumb';
                    $img = Image::make($images->getRealPath());
                    $img->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destination . '/' . $images_name);
                    $student_details->sign = $images_name;
                    $student_details->save();
                }
            }
            
            if($student_details){
                return redirect()->back()->with('message','Student Details Updated Successfully');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }   
        }

    }

    public function examFeePaidList(){
        return view('admin.student.exam_fee_paid_list');
    }

    public function examFeePaidListAjax(){
        return datatables()->of(StudentDetail::latest()->get())
            ->addIndexColumn()
            ->addColumn('branch', function ($row) {
                return isset($row->student->branchDetails->center_name)?$row->student->branchDetails->center_name:'';
           
            })->addColumn('course', function ($row) {
                return isset($row->student->course->name)?$row->student->course->name:'';
           
            })->addColumn('dob', function ($row) {
                return isset($row->dob)?$row->dob:'';
           
            })->addColumn('enrollment_id', function ($row) {
                return isset($row->student->enrollment_id)?$row->student->enrollment_id:'';
           
            })->addColumn('status', function ($row) {
               if($row->student->is_admit_generated == 2){
                   return '<a class="btn btn-success btn-sm">Generated</a>';
               }else{
                return '<a class="btn btn-warning btn-sm">Not Generated</a>';
               }
           
            })->addColumn('action', function ($row) {
                $btn ='';
                if($row->student->is_admit_generated == 1 && $row->student->is_reg_fee_paid == 2){
                     $btn .='<a  href="'.route('admin.admit_Card_form',['id'=>$row->id]).'" class="btn btn-success btn-sm">Generate Admit Card</a>';
                }if($row->student->is_admit_generated ==2){
                  $btn .= '<a href="'.route('admin.edit_admit_card',['id'=>$row->id]).'" class="btn btn-warning btn-sm">Edit Admit Card</a>';
                  $btn .= '<a href="'.route('admin.view_admit',['id'=>$row->id]).'" class="btn btn-primary btn-sm">View</a>';
                }
                return $btn;
             })->addColumn('marksheet_status', function ($row) {
                if($row->student->is_marksheet_generated == 2 ){
                    return '<a class="btn btn-success btn-sm">Generated</a>';
                }else{
                 return '<a class="btn btn-warning btn-sm">Not Generated</a>';
                }
            
             })->addColumn('marksheet_action', function ($row) {
                $btn ='';
                if($row->student->is_marksheet_generated == 1 && $row->student->is_admit_generated == 2 && $row->student->is_reg_fee_paid == 2){
                     $btn .='<a  href="'.route('admin.marksheet_form',['id'=>$row->id]).'" class="btn btn-success btn-sm">Generate Marksheet</a>';
                }if($row->student->is_marksheet_generated ==2){
                  $btn .= '<a href="'.route('admin.edit_marksheet',['id'=>$row->id]).'" class="btn btn-warning btn-sm">Edit Marksheet</a>';
                  $btn .= '<a href="'.route('admin.view_marksheet',['id'=>$row->id]).'" class="btn btn-primary btn-sm">View</a>';
                }
                return $btn;
             })->addColumn('certificate_status', function ($row) {
                if($row->student->is_certificate_generated == 2){
                    return '<a class="btn btn-success btn-sm">Generated</a>';
                }else{
                 return '<a class="btn btn-warning btn-sm">Not Generated</a>';
                }
            
             })->addColumn('certificate_action', function ($row) {
                $btn ='';
                if($row->student->is_certificate_generated == 1 && $row->student->is_marksheet_generated == 2 && $row->student->is_admit_generated == 2 && $row->student->is_reg_fee_paid == 2){
                     $btn .='<a  href="'.route('admin.certificate_form',['id'=>$row->id]).'" class="btn btn-success btn-sm">Generate Certificate</a>';
                }
                    if($row->student->is_certificate_generated == 2){
                        $btn .= '<a href="'.route('admin.edit_certificate',['id'=>$row->id]).'" class="btn btn-warning btn-sm">Edit Certificate</a>';
                        $btn .= '<a href="'.route('admin.view_certificate',['id'=>$row->id]).'" class="btn btn-primary btn-sm">View</a>';
                    }
                
                return $btn;
             })->rawColumns(['branch','dob','course','status','action','enrollment_id','marksheet_status','certificate_status','certificate_action','marksheet_action'])
            ->make(true);
    }

    public function admitCardForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        $board = Board::first();
        return view('admin.student.admit_card_form',compact('student_details','board'));

    }
    public function editAdmitCardForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        $board = Board::first();
        $student = Student::findOrFail($student_details->student_id);
        return view('admin.student.admit_card_form',compact('student_details','board','student'));

    }
    

    

    public function updateAdminCard(Request $request,$id){
        $this->validate($request, [
            'center'=>'required',
            'exam_Date'=>'required',    
            'year'=>'required',

        ]);

        $student = Student::where('id',$id)->first();
        $student->center = $request->input('center');
        $student->exam_date = $request->input('exam_Date');
        $student->year = $request->input('year');
        $student->is_admit_generated = 2;
        if($student->save()){
            return redirect()->route('admin.exam_fee_paid_list')->with('message','Student Admit Updated');
        }

    }
    public function addAdminCard(Request $request,$id){
        $this->validate($request, [
            'center'=>'required',
            'exam_Date'=>'required',    
            'year'=>'required',

        ]);

        $student = Student::where('id',$id)->first();
        $student->center = $request->input('center');
        $student->exam_date = $request->input('exam_Date');
        $student->year = $request->input('year');
        $student->reg_no = $this->generateRegistration($id,$student->branch_id);
        $student->is_admit_generated = 2;
        if($student->save()){
            return redirect()->route('admin.exam_fee_paid_list')->with('message','Student Admit Generated Successfully');
        }

    }
    private function generateRegistration($student_id,$branch_id){
      $branch = BranchDetails::where('branch_id',$branch_id)->first();
      $dist = $branch->center_district;
      
      $string = 'GCLM'.substr(strtoupper($dist),0,3);
      $leng=strlen($string);
      $length =  6-strlen((string)$branch_id);
      $reg = str_pad($string, $length+$leng, "0"); 
    
      $reg_no = $reg.$student_id;
      return $reg_no;
        
    }
    public function viewAdmit($id){
        $student_details = StudentDetail::findorFail($id);
        $board = Board::first();
        return view('web.student.student-admit',compact('student_details','board'));

    }

    public function certificateForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        return view('admin.student.certificate_form',compact('student_details'));

    }
    public function editCertificateForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        $student= Student::findOrFail($student_details->student_id);
        return view('admin.student.certificate_form',compact('student_details','student'));

    }

    public function addCertificate(Request $request,$id){
        $this->validate($request, [
            'training_from'=>'required',
            'training_to'=>'required',
            'date_of_issue'=>'required',

        ]);

        $student = Student::where('id',$id)->first();
        $student->training_to = $request->input('training_to');
        $student->training_from = $request->input('training_from');
        $student->date_of_issue = $request->input('date_of_issue');
        $student->is_certificate_generated = 2;
        if($student->save()){
            return redirect()->route('admin.exam_fee_paid_list')->with('message','Student Certificate Generated Successfully');
        }

    }

    public function viewCertificate($id){
        $student_details = StudentDetail::findorFail($id);
        $course = $student_details->student->course->name;
        $center_name = $student_details->student->branchDetails->center_name;
        $name = $student_details->name;
        $co = $student_details->father_name;
        $grade = $student_details->student->grade;
        $enrollment = $student_details->student->enrollment_id;
        $training_from = $student_details->student->training_from;
        $training_to = $student_details->student->training_to;
        $issue_date = $student_details->student->date_of_issue; 
        $board = Board::first();
        $data = "Globalfast Computer Literacy Mission\nA National Programme Of Information Technology Education & Development\nwww.gclm.co.in\n\nSTUDENT DETAILS\n Course Name:$course\nCenter Name : $center_name\nName:$name\nC/O: $co\nDate Of Birth : $student_details->dob\nEnrollment No: $enrollment\nGrade:$grade\nTraining Period:$training_from(From)    $training_to(To)\nDate Of Issue:$issue_date\n";
        $qr_code = QrCode::generate($data); 
        return view('web.student.student-certificate',compact('student_details','board','qr_code'));

    }

    public function marksheetForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        return view('admin.student.marksheet_form',compact('student_details'));

    }
    public function editMarksheetForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        $student  = Marks::where('student_id',$student_details->student_id)->first();
        return view('admin.student.marksheet_form',compact('student_details','student'));

    }

    public function addmarksheet(Request $request,$id){
        $this->validate($request, [
            'duration'=>'required',
            'grade'=>'required',
            'theory_full_marks'=>'required|numeric',
            'theory_marks_obtained'=>'required|numeric',
            'prac_full_marks'=>'required|numeric',
            'prac_marks_obtained'=>'required|numeric',
            'total_marks'=>'required|numeric',
            'grand_total'=>'required|numeric',
            'percentage'=>'required|numeric',
            'date_of_issue'=>'required',

        ]);

        $student = Student::where('id',$id)->first();
        $student->duration = $request->input('duration');
        $student->grade = $request->input('grade');
        $student->marksheet_date_of_issue = $request->input('date_of_issue');
        $student->is_marksheet_generated = 2;
        if($student->save()){
            $marks = new Marks();
            $marks->student_id = $student->id;
            $marks->total_marks_obtained = $request->input('total_marks');
            $marks->theory_marks_obtained = $request->input('theory_marks_obtained');
            $marks->theory_full_marks = $request->input('theory_full_marks');
            $marks->prac_full_marks = $request->input('prac_full_marks');
            $marks->percentage = $request->input('percentage');
            $marks->grand_total = $request->input('grand_total');
            $marks->prac_marks_obtained = $request->input('prac_marks_obtained');
            $marks->save();
        }

        return redirect()->route('admin.exam_fee_paid_list')->with('message','Student Marksheet Generated Successfully');;


    }
    public function updateMarksheet(Request $request,$id){
        $this->validate($request, [
            'duration'=>'required',
            'grade'=>'required',
            'theory_full_marks'=>'required|numeric',
            'theory_marks_obtained'=>'required|numeric',
            'prac_full_marks'=>'required|numeric',
            'prac_marks_obtained'=>'required|numeric',
            'total_marks'=>'required|numeric',
            'grand_total'=>'required|numeric',
            'percentage'=>'required|numeric',
            'date_of_issue'=>'required',

        ]);

        $student = Student::where('id',$id)->first();
        $student->duration = $request->input('duration');
        $student->grade = $request->input('grade');
        $student->marksheet_date_of_issue = $request->input('date_of_issue');
        $student->is_marksheet_generated = 2;
        if($student->save()){
            $marks = Marks::where('student_id',$id)->first();
            $marks->student_id = $student->id;
            $marks->total_marks_obtained = $request->input('total_marks');
            $marks->theory_marks_obtained = $request->input('theory_marks_obtained');
            $marks->theory_full_marks = $request->input('theory_full_marks');
            $marks->prac_full_marks = $request->input('prac_full_marks');
            $marks->percentage = $request->input('percentage');
            $marks->grand_total = $request->input('grand_total');
            $marks->prac_marks_obtained = $request->input('prac_marks_obtained');
            $marks->save();
        }

        return redirect()->route('admin.exam_fee_paid_list')->with('message','Student Marksheet Updated Successfully');;


    }

    public function viewMarksheet($id){
        $student_details = StudentDetail::findorFail($id);
        $marks = Marks::where('student_id',$id)->first();
        $board = Board::first();
        return view('web.student.student-marksheet',compact('student_details','marks','board'));

    }

}