<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentDetail;
use App\Models\Course;
use App\Models\Branch;
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
                
                return isset($row->student->branch->email)?$row->student->branch->email:'';
           
            })->addColumn('course', function ($row) {
                
                return isset($row->student->course->name)?$row->student->course->name:'';
           
            })->addColumn('action', function ($row) {
                $btn = '<a href="'.route('admin.branch_wallet_history',['id'=>$row->id]).'" class="btn btn-primary">View</a>';
                return $btn .= '<a href="'.route('admin.edit_student_form',['student_id'=>$row->id]).'" class="btn btn-info">Edit</a>';
            })->rawColumns(['branch','action','course'])
            ->make(true);
    }

    public function studentEditForm($student_id){
        $student_details = StudentDetail::where('student_id',$student_id)->first();
        
        return view('admin.student.edit_student_form',compact('student_details'));

    }

}