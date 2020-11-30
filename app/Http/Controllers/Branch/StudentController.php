<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
class StudentController extends Controller
{
    public function studentList(){
        return view('branch.student.student_list');
    }

    public function registerStudentForm(){
        $courses = Course::get();
        return view('branch.student.student_register_form',compact('courses'));
    }
}
