<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class CourseController extends Controller
{
    public function courseCategoryList(){
        $category = CourseCategory::latest()->get();
        return view('admin.course.course_category_list',compact('category'));
    }

    public function addCategoryForm(){
        return view('admin.course.add_course_category');
    }

    public function addCategory(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);
        $category = new CourseCategory();
        $category->name = $request->input('name');
        if($category->save()){
            return redirect()->back()->with('message','Category Added Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }

    public function categoryStatus($category_id,$status){

        $category_status = CourseCategory::where('id',$category_id)->first();
        $category_status->status=$status;
        $category_status->save();
        if($category_status->save()){
            return redirect()->back()->with('message','Status Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }
    public function courseList(){
        $courses = Course::latest()->get();
        return view('admin.course.course_list',compact('courses'));
    }

    public function addCourseForm(){
        $category = CourseCategory::where('status',1)->get();
        return view('admin.course.add_course',compact('category'));
    }

    public function addCourse(Request $request){
       
        $this->validate($request, [
            'name'=>'required',
            'course_code'=>'required',
            'eligibility'=>'required',
            'duration'=>'required',
            'reg_fees'=>'required|numeric',
            // 'course_fees'=>'required',
            // 'exam_fees'=>'required',
            'details'=>'required',
            'category'=>'required|numeric',
        ]);
        $course = new Course();
        $course->name = $request->input('name');
        $course->category_id = $request->input('category');
        $course->course_code = $request->input('course_code');
        $course->duration = $request->input('duration');
        $course->eligibility = $request->input('eligibility');
        $course->detail = $request->input('details');
        $course->reg_fees = $request->input('reg_fees');
        // $course->course_fees = $request->input('course_fees');
        // $course->exam_fees = $request->input('exam_fees');
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
        $category=CourseCategory::where('status',1)->get();
        return view('admin.course.add_course',compact('course','category'));

    }

    public function updateCourse(Request $request,$id){
        $this->validate($request, [
            'name'=>'required',
            'course_code'=>'required',
            'eligibility'=>'required',
            'duration'=>'required',
            'reg_fees'=>'required|numeric',
            // 'course_fees'=>'required',
            // 'exam_fees'=>'required',
            'details'=>'required',
            'category'=>'required|numeric',
        ]);
        
        $course_name = $request->input('name');
        $course_code = $request->input('course_code');
        $duration =  $request->input('duration');
        $eligibility = $request->input('eligibility');
        $details = $request->input('details');
        $reg_fees = $request->input('reg_fees');
        // $course_fees = $request->input('course_fees');
        // $exam_fees = $request->input('exam_fees');
        $course_data = Course::where('id',$id)->first();
       
        $course_data->name = $course_name;
        $course_data->course_code =  $course_code;
        $course_data->duration =  $duration;
        $course_data->eligibility =  $eligibility;
        $course_data->detail =  $details;
        // $course_data->course_fees =  $course_fees;
        $course_data->reg_fees =  $reg_fees;
        $course_data->category_id =  $request->input('category');
        // $course_data->exam_fees =  $exam_fees;
        if($course_data->save()){
            
            return redirect()->back()->with('message','Course Details Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }

    }

    public function editCategory($id){
        $category = CourseCategory::findOrFail($id);
        return view('admin.course.add_course_category',compact('category'));

    }

    public function updateCategory(Request $request,$id){
        $this->validate($request,[
            'name'=>'required'
        ]);

        $category = CourseCategory::where('id',$id)->first();
        $category->name = $request->input('name');
        if($category->save()){
            return redirect()->back()->with('message','Category Updaqted Successfully');
        }

    }
}
