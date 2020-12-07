<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\BranchWallet;
use App\Models\StudentDetail;
use App\Models\BranchDetails;
use Auth;
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
            'father_name'=>'required',
            'mother_name'=>'required',
            'mob_no'=>'required|numeric',
            
            'dob'=>'required|date',
            'state'=>'required',
            'city'=>'required',
            'country'=>'required',
            'pin'=>'required|numeric',
            'address'=>'required',
            'category'=>'required|numeric',
            'gender'=>'required|numeric',
            'medium'=>'required|numeric',
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
       
        $branch_wallet = BranchWallet::where('branch_id',Auth::user()->id)->first();
        $course = Course::where('id',$request->input('course'))->first();
        if($branch_wallet->amount >= $course->course_fees){
            $branch_wallet->amount = $branch_wallet->amount -  $request->input('course_fees');
            $branch_wallet->save();
        }
        else{
            return redirect()->back()->with('error','Not enough money in wallet to pay for course fees');
        }    
        $student =  new Student();
        $student->course_id = $request->input('course');
        $student->is_reg_fee_paid = 2;
        $student->reg_fee_paid_date = Carbon::today();
        if($student->save()){
            $enrollment_id = $this->generateEnrollmentId($student->id);
            if($enrollment_id == false){
                return redirect()->back()->with('error','Center not found');
            }else{
                $student->enrollment_id = $enrollment_id;
                $student->save();
            }
        }
        if($student){
            $student_details = new StudentDetail();
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
                return redirect()->back()->with('message','Student Registered Successfully');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }

        }

        

    }

    private function generateEnrollmentId($student_id){
        $branch = BranchDetails::where('branch_id',Auth::user()->id)->first();
        $branch_name = $branch->center_name;
        if(!empty($branch_name)){
            $branch = substr($branch_name,0,3);
            $id = str_pad($branch, 5, '0',STR_PAD_RIGHT);
            $enrollment_id = $id.$student_id;
            return $enrollment_id;
        }else{
            return false;
        }

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

    public function StudentListAjax(Request $request)
    {
        return datatables()->of(StudentDetail::get())
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
            })->addColumn('status', function ($row) {
                if($row->student->status==1){
                    $btn = '<a href="' . route('branch.status',['id'=>$row->student_id,'status'=>2]).'"class="btn btn-danger btn-sm">Disable</a>';
                    return $btn;
               
                }else{
                    $btn = '<a href="' . route('branch.status',['id'=>$row->student_id,'status'=>1]).'"class="btn btn-primary btn-sm">Enable</a>';
                    return $btn;
                }
            })->rawColumns(['course_name','gender','medium','status'])
            ->make(true);
    }

    public function status($id,$status){
        $student = Student::where('id',$id)->update([
            'status'=>$status
        ]);

        return redirect()->back();

    }
}
