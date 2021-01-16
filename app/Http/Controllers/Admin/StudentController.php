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
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
           
            })->addColumn('status', function ($row) {
               if($row->student->is_exam_fee_paid == 2){
                   return '<a class="btn btn-success btn-sm">Exam Fee Paid</a>';
               }else{
                return '<a class="btn btn-warning btn-sm">Exam Fee Not Paid</a>';
               }
           
            })->addColumn('action', function ($row) {
                $btn = '<a href="'.route('admin.branch_wallet_history',['id'=>$row->id]).'" class="btn btn-primary">View</a>';
                return $btn .= '<a href="'.route('admin.edit_student_form',['student_id'=>$row->id]).'" class="btn btn-info">Edit</a>';
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
            'father_name'=>'required',
            'mother_name'=>'required',
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
         
            $student_details->father_name = $request->input('father_name');
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

                    $prev_img_delete_path = base_path().'/public/images/student/'.$cat_prev_image->image;
                    $prev_img_delete_path_thumb = base_path().'/public/images/student/thumb/'.$cat_prev_image->image;
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
           
            })->addColumn('status', function ($row) {
               if($row->student->is_admit_generated == 2){
                   return '<a class="btn btn-success btn-sm">Admit Card Generated</a>';
               }else{
                return '<a class="btn btn-warning btn-sm">Admit Card Not Generated</a>';
               }
           
            })->addColumn('action', function ($row) {
                if($row->student->is_admit_generated == 1){
                    return '<a  href="'.route('admin.admit_Card_form',['id'=>$row->id]).'" class="btn btn-success btn-sm">Generate Admit Card</a>';
                }else{
                 return '<a class="btn btn-warning btn-sm">Edit Admit Card</a>';
                }
            
             })->rawColumns(['branch','course','status','action'])
            ->make(true);
    }

    public function admitCardForm($id){
        $student_details = StudentDetail::where('id',$id)->first();
        return view('admin.student.admit_card_form',compact('student_details'));

    }

}