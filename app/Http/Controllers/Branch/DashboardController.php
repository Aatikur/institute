<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentDetail;
use Auth;
class DashboardController extends Controller
{
    public function dashboardView()
    {
        $student = StudentDetail::where('branch_id',Auth::user()->id)->latest()->limit(10)->get();
        $student_cnt = Student::where('branch_id',Auth::user()->id)->count();
        return view('branch.dashboard',compact('student_cnt','student'));
    }
}
