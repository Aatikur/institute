<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\BranchWallet;
use App\Models\StudentDetail;
use App\Models\WalletHistory;
use App\Models\BranchDetails;
use App\Models\StudentQualification;
use Auth;
use DB;
use Image;
use Carbon\Carbon;
class StudentController extends Controller
{
    public function studentList(){
        return view('branch.student.student_list');
    }

    public function registerStudentForm(){
        $courses = Course::get();
        return view('branch.student.student_register_form',compact('courses'));
    }

    public function registerStudent(Request $request){
        $this->validate($request,[
            'course'=>'required|numeric',
            'student_name'=>'required',
            'mob_no'=>'required|numeric|digits:10',
            'sign'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dob'=>'required|date',
            'state'=>'required',
            'city'=>'required',
            'country'=>'required',
            'pin'=>'required|numeric',
            'address'=>'required',
            'category'=>'required|numeric',
            'gender'=>'required|numeric',
            'medium'=>'required|numeric',
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sign'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'exam'=>'array|min:1',
            'board'=>'array|min:1',
            'college'=>'array|min:1',
            'year'=>'array|min:1',
            'marks'=>'array|min:1',

        ]);
      
       
        $branch_wallet = BranchWallet::where('branch_id',Auth::user()->id)->first();
        $course = Course::where('id',$request->input('course'))->first();
        if($branch_wallet->amount >= $course->reg_fees){
            $branch_wallet->amount = $branch_wallet->amount -  $request->input('course_fees');
            $branch_wallet->save();
            $wallet_history = new WalletHistory();
            $wallet_history->wallet_id = $branch_wallet->id;
            $wallet_history->transaction_type = 2;
            $wallet_history->amount = $request->input('course_fees');
            $wallet_history->save();
           
        }
        else{
            return redirect()->back()->with('error','Not enough money in wallet to pay for course fees');
        }    
        $student =  new Student();
        $student->course_id = $request->input('course');
        $student->is_reg_fee_paid = 2;
        $student->branch_id = Auth::user()->id;
        $student->reg_fee_paid_date = Carbon::today();
        if($student->save()){
            $wallet_history->comment = 'Registration Fees Of Amount="'.$request->input('course_fees').'" Paid For Student ID="'.$student->id.'"';
                $wallet_history->save();
            $enrollment_id = $this->generateEnrollmentId($student->id);
            if($enrollment_id == false){
                return redirect()->back()->with('error','Center not found');
            }else{
                $student->enrollment_id = $enrollment_id;
                $student->save();
            }
        }

        if($student){
          
            $exam = $request->input('exam');
            $board = $request->input('board');
            $college = $request->input('college');
            $year = $request->input('year');
            $marks = $request->input('marks');
            for($i=0;$i<count($exam);$i++){
                $qualification =  new StudentQualification();
                $qualification->student_id = $student->id;
                $qualification->exam_name= $exam[$i];
                $qualification->board = $board[$i];
                $qualification->college = $college[$i];
                $qualification->year_of_passing = $year[$i];
                $qualification->marks_obtained = $marks[$i];
                $qualification->save();

            }
            $student_details = new StudentDetail();
            $student_details->student_id =$student->id;
            $student_details->branch_id = Auth::user()->id;
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
            if ($request->hasFile('sign')) {
                $image = $request->file('sign');
                $image_name = time() . date('Y-M-d') . '.' . $image->getClientOriginalExtension();
                $destinationPath = base_path() . '/public/images/student/';
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath . '/' . $image_name);
                $destination = base_path() . '/public/images/student/thumb';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination . '/' . $image_name);
                $student_details->sign = $image_name;
                $student_details->save();
            }
           

        }
        return redirect()->back()->with('message','Student Registered Successfully');
    }

    private function generateEnrollmentId($student_id){
        $branch = BranchDetails::where('branch_id',Auth::user()->id)->first();
        $branch_name = $branch->center_name;
        if(!empty($branch_name)){
            $branch = substr($branch_name,0,3);
            $id = str_pad('GCLM', 5, '0',STR_PAD_RIGHT);
            $enrollment_id = $id.$student_id;
            return $enrollment_id;
        }else{
            return false;
        }

    }
    public function retriveCourseFees($course_id){
        $course = Course::where('id',$course_id)->where('status',1)->first();
        $course_fees = $course->reg_fees;
        if($course_fees){
            return $course_fees;
        }else{
            return 2;
        }
    }

    public function StudentListAjax(Request $request)
    {
        return datatables()->of(StudentDetail::where('branch_id',Auth::user()->id)->get())
            ->addIndexColumn()
            ->addColumn('course_name', function ($row) {
                
                if (isset($row->student->course->name)) {
                    return $row->student->course->name;
                } else {
                    return null;
                }
            })->addColumn('gender', function ($row) {
                if($row->gender ==1){
                    return "Male";
               
                }else{
                    return "Female";
                }
            })->addColumn('medium', function ($row) {
                if($row->medium ==1){
                    return "English";
               
                }else{
                    return "Hindi";
                }
            })->addColumn('enrollment_id', function ($row) {
                return $row->student->enrollment_id;
            })->addColumn('status', function ($row) {
                $btn='';
                // if($row->student->status==1){
                //     $btn .= '<a href="' . route('branch.status',['id'=>$row->student_id,'status'=>2]).'"class="btn btn-danger btn-sm">Disable</a>';
                   
               
                // }else{
                //     $btn .= '<a href="' . route('branch.status',['id'=>$row->student_id,'status'=>1]).'"class="btn btn-primary btn-sm">Enable</a>';
                  
                // }

              
                    $btn .= '<a class="btn btn-info btn-sm">Reg Fee Paid</a>';
               

                return $btn;
            })->rawColumns(['course_name','gender','medium','status','enrollment_id'])
            ->make(true);
    }

    public function status($id,$status){
        $student = Student::where('id',$id)->update([
            'status'=>$status
        ]);

        return redirect()->back();

    }

    public function examFeesForm($id){
        $wallet = BranchWallet::where('branch_id',Auth::user()->id)->first();
        $student = StudentDetail::where('student_id',$id)->first();
      
        return view('branch.student.exam_fees_form',compact('wallet','student'));
    }

    public function payExamFees($id){
        $student = Student::where('id',$id)->first();
        $wallet = BranchWallet::where('branch_id',Auth::user()->id)->first();
        if($wallet->amount > $student->course->exam_fees && $student->is_exam_fee_paid == 1){
            $wallet->amount = $wallet->amount  - $student->course->exam_fees;
            if($wallet->save()){
                $wallet_history = new WalletHistory();
                $wallet_history->wallet_id = $wallet->id;
                $wallet_history->transaction_type = 2;
                $wallet_history->amount =  $student->course->exam_fees;
                $wallet_history->comment = "Exam Fees of amount ".$student->course->exam_fees." Paid for student Id ".$student->id." of Branch ".Auth::user()->id."";

            }
            if($wallet_history->save()){
                $student->is_exam_fee_paid = 2;
                $student->exam_fee_paid_date  = Carbon::now();
                $student->save();
            }

        }else{
            return redirect()->back()->with('error','Not Enough Funds Available In Branch Wallet');
        }

        if($student->save()){
            return redirect()->back()->with('message','Exam Fees Paid Successfully');
        }

        
        
        
    }

    
}
