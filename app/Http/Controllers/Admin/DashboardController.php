<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Student;
use App\Models\Branch;
use App\Models\BranchDetails;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $course_cnt = Course::count();
        $branch_cnt = Branch::count();
        $student_cnt = Student::count();
        $branch=BranchDetails::latest()->limit(10)->get();
        return view('admin.dashboard',compact('course_cnt','branch_cnt','student_cnt','branch'));
    }

    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        $user = Admin::where('id',1)->first();
        
        if(Hash::check($request->input('current_password'), $user->password)){  
            Admin::where('id',1)->update([
                    'password'=>Hash::make($request->input('new_password')),
            ]);
            return redirect()->back()->with('message','Password Updated Successgully');
        }else{
            return redirect()->back()->with('error','Sorry Current Password Does Not Correct');
        }
    }
 }
