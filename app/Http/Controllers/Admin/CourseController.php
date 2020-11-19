<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function courseList(){
        $courses = Course::get();
        return view('admin.course.course_list',compact('courses'));
    }

    public function addCourseForm(){
        return view('admin.course.add_course');
    }

    public function addCourse(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'course_code'=>'required',
            'eligibity'=>'required',
            'duration'=>'required',
            'course_fees'=>'required',
            'exam_fees'=>'required',
            'details'=>'required',
        ]);
        $course = new Course();
        $course->name = $request->input('name');
        $course->course_code = $request->input('course_code');
        $course->duration = $request->input('duration');
        $course->eligibility = $request->input('eligibility');
        $course->detail = $request->input('details');
        $course->course_fees = $request->input('course_fees');
        $course->exam_fees = $request->input('exam_fees');
        $course->save();
        if($course->save()){
            return redirect()->back()->with('message','Course Added Successfully');
        }else{
            return redirect()->back()->with('error','Something Wenjt Wrong!');
        }
    }

    public function status($course_id,$status){

        $course_status = Course::where('id',$course_id)->first();
        $course_status->status=$status;
        $course_status->save();
        if($course_status->save()){
            return redirect()->back()->with('message','Status Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

    public function editCourseForm($course_id){
        $course = Course::where('id',$course_id)->first();
        return view('admin.course.add_course',compact('course'));

    }

    public function updateCourse(Request $request,$id){
        $this->validate($request, [
            'name'=>'required',
            'course_code'=>'required',
            'eligibity'=>'required',
            'duration'=>'required',
            'course_fees'=>'required',
            'exam_fees'=>'required',
            'details'=>'required',
        ]);
        $course_name = $request->input('name');
        $course_code = $request->input('course_code');
        $duration =  $request->input('duration');
        $eligibility = $request->input('eligibility');
        $details = $request->input('details');
        $course_fees = $request->input('course_fees');
        $exam_fees = $request->input('exam_fees');
        $course_data = Course::where('id',$id)->first();
       
        $course_data->name = $course_name;
        $course_data->course_code =  $course_code;
        $course_data->duration =  $duration;
        $course_data->eligibility =  $eligibility;
        $course_data->detail =  $details;
        $course_data->course_fees =  $course_fees;
        $course_data->exam_fees =  $exam_fees;
        $course_data->save();
        if($course_data->save()){
            return redirect()->back()->with('message','Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }

    }
}
