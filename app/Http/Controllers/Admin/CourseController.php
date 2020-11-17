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
}
