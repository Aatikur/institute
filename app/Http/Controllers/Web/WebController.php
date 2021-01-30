<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Student;
use App\Models\StudentDetail;
use App\Models\Marks;

class WebController extends Controller
{
    public function studentAdmitCard(Request $request){
        $this->validate($request, [
            'enrollment'=>'required',
            'dob'=>'required'
        ]);
        $enrollment = $request->input('enrollment');
        $dob= $request->input('dob');
        $student = Student::where('enrollment_id',$enrollment)->where('is_admit_generated',2)->first();
        if($student){
            $student_details = StudentDetail::where('student_id',$student->id)->where('dob',$dob)->first();
            if($student_details){
                return view('web.student.student-admit',compact('student_details'));
            }else{
                return redirect()->back()->with('error','Invalid Dob');
            }
        }else{
            return redirect()->back()->with('error','Invalid Enrollment Id Or Admit Not Generated Yet!');
        }
    }

    public function studentMarksheet(Request $request){
        $this->validate($request, [
            'enrollment'=>'required',
            'dob'=>'required'
        ]);
        $enrollment = $request->input('enrollment');
        $dob= $request->input('dob');
        $student = Student::where('enrollment_id',$enrollment)->where('is_marksheet_generated',2)->first();
        if($student){
            $student_details = StudentDetail::where('student_id',$student->id)->where('dob',$dob)->first();
            if($student_details){
                $marks = Marks::where('student_id',$student->id)->first();
                return view('web.student.student-marksheet',compact('student_details','marks'));
            }else{
                return redirect()->back()->with('error','Invalid Dob');
            }
        }else{
            return redirect()->back()->with('error','Invalid Enrollment Id Or Marksheet Not Generated Yet!');
        }
    }
    
    public function studentCertificate(Request $request){
        $this->validate($request, [
            'enrollment'=>'required',
            'dob'=>'required'
        ]);
        $enrollment = $request->input('enrollment');
        $dob= $request->input('dob');
        $student = Student::where('enrollment_id',$enrollment)->where('is_certificate_generated',2)->first();
        if($student){
            $student_details = StudentDetail::where('student_id',$student->id)->where('dob',$dob)->first();
            if($student_details){
                return view('web.student.student-admit',compact('student_details'));
            }else{
                return redirect()->back()->with('error','Invalid Dob');
            }
        }else{
            return redirect()->back()->with('error','Invalid Enrollment Id Or Certificate Not Generated Yet!');
        }
    }

    public function courses($category_id){
        $courses = Course::where('category_id',$category_id)->where('status',1)->get();
        $category = CourseCategory::findOrFail($category_id);
        return view('web.course.courses',compact('courses','category'));
    }

    public function courseDetails($course_id){
        $course_details =Course::findOrFail($course_id);
        return view('web.course.courses-details',compact('course_details'));
    }
}