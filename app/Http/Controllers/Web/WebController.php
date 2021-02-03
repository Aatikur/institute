<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BranchDetails;
use App\Models\BranchWallet;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Student;
use App\Models\StudentDetail;
use App\Models\Marks;
use Image;
use File;
use Illuminate\Support\Facades\Hash;

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

    public function getBranch($state){
        $centers = BranchDetails::leftJoin('branch','branch.id','=','branch_details.branch_id')
                                ->where('center_state',$state)
                                ->select('branch_details.*','branch.status as status')
                                ->get();
        $all_centers = BranchDetails::get();
        return view('web.franchise.centers',compact('centers','all_centers'));
    }
    public function allBranch() {
        $centers = BranchDetails::orderBy('center_state')->get();
        $all_centers = BranchDetails::get();
        return view('web.franchise.centers',compact('centers','all_centers'));
    }

    public function addBranch(Request $request){
        $this->validate($request, [
            'email'=>'required|unique:branch,email',
            'cnt_name'=>'required',
            'cnt_email'=>'required',
            'cnt_state'=>'required',
            'cnt_city'=>'required',
            'cnt_dob'=>'required|date',
            'cnt_qctn'=>'required',
            'cnt_address'=>'required',
            'center_name'=>'required',
            'center_city'=>'required',
            'center_state'=>'required',
            'center_address'=>'required',
            'center_district'=>'required',
            'affil_by'=>'required',
            'tel_no'=>'required|numeric|min:10',
            'theory_room'=>'required|numeric',
            'prac_room'=>'required|numeric',
            'no_of_comps'=>'required|numeric',
            'no_of_faculties'=>'required|numeric',
            'no_of_colleges'=>'required|numeric',
            'no_of_schools'=>'required|numeric',
            'com_specs'=>'required',
            'center_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'course'=>'required|numeric',
            'voter_card'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pan_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'theo_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prac_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'off_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'front_photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'trade_licence'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);
            
        $branch = new Branch();
        $branch->email = $request->input('email');
        $branch->status =3;    
        $branch->save();
        if($branch->save()){

            $branch_details = new BranchDetails();
            $branch_details->branch_id=$branch->id;
            $branch_details->contact_person = $request->input('cnt_name');
            $branch_details->email_address = $request->input('cnt_email');
            $branch_details->residence_address = $request->input('cnt_address');
            $branch_details->city = $request->input('cnt_city');
            $branch_details->state = $request->input('cnt_state');
            $branch_details->dob = $request->input('cnt_dob');
            $branch_details->qualification = $request->input('cnt_qctn');
            $branch_details->center_name = $request->input('center_name');
            $branch_details->center_address = $request->input('center_address');
            $branch_details->center_city = $request->input('center_city');
            $branch_details->center_state	 = $request->input('center_state');
            $branch_details->center_district = $request->input('center_district');
            $center_code = $this->generateCenterCode($branch->id);
            $branch_details->center_code = $center_code;
            $branch_details->save();
            if($branch_details->save()){
                $wallet =  new BranchWallet();
                $wallet->branch_id = $branch->id;
                $wallet->save();
                
                $branch_details->center_affiliated_by = $request->input('affil_by');
                $branch_details->ph_no = $request->input('tel_no');
                $branch_details->theory_room = $request->input('theory_room');
                $branch_details->practical_room = $request->input('prac_room');
                $branch_details->no_of_computers = $request->input('no_of_comps');
                $branch_details->no_of_faculties = $request->input('no_of_faculties');
                $branch_details->no_of_colleges = $request->input('no_of_colleges');
                $branch_details->no_of_schools = $request->input('no_of_schools');
                $branch_details->computer_spec = $request->input('com_specs');
                $branch_details->course_interested = $request->input('course');
                
                $center_photo =  $request->file('center_photo');
                $center = $this->uploadDocs($center_photo,1);
                
                $voter_card = $request->file('voter_card');
                $voter= $this->uploadDocs($voter_card,2);
        
                $pan = $request->file('pan_photo');
                $pann = $this->uploadDocs($pan,3);
        
                $trade = $request->file('trade_licence');
                $trd=$this->uploadDocs($trade,4);
                
                $theory_room = $request->file('theo_photo');
                $thery=$this->uploadDocs($theory_room,5);     
        
                $prac_room = $request->file('prac_photo');
                $prac=$this->uploadDocs($prac_room,6);
                
                $office =  $request->file('off_photo');
                $off=$this->uploadDocs($office,7);
                
                $front =  $request->file('front_photo');
                $fr= $this->uploadDocs($front,8);
               
                $branch_details->center_photo = $center;  
                $branch_details->voter_card = $voter;
                $branch_details->pan_card = $pann;
                $branch_details->trade_licence = $trd;
                $branch_details->theory_room_photo = $thery;
                $branch_details->practical_room_photo = $prac;
                $branch_details->office_room_photo = $off;
                $branch_details->front_side_photo = $fr;
                $branch_details->save();
            }
            if($branch_details->save()){
                return redirect()->back()->with('message','Your Branch Request Has Been Registered Successfully');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }
           
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

    private function uploadDocs($doc,$status){
        $image = $doc;
        
        $image_name = time() . date('Y-M-d') . '.' . $image->getClientOriginalExtension();
       
        if($status =1){
            $destinationPath = base_path() . '/public/images/docs/center/';
            
        }else if($status =2){
            $destinationPath = base_path() . '/public/images/docs/voter/';
            
        }else if($status = 3){
            $destinationPath = base_path() . '/public/images/docs/pan/';
            
        }else if($status =4){
            $destinationPath = base_path() . '/public/images/docs/trade/';
            
        }else if($status = 5){
            $destinationPath = base_path() . '/public/images/docs/theoryroom/';
           
        }else if($status = 6){
            $destinationPath = base_path() . '/public/images/docs/practicalroom/';
           
        }else if($status =7){
            $destinationPath = base_path() . '/public/images/docs/officeroom/';
           
        }else{
            if($status = 8){
            $destinationPath = base_path() . '/public/images/docs/frontside/';
          } 
        

        }
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath . '/' . $image_name);
        return $image_name;
    }

    public function generateCenterCode($branch_id){
        $center_code ='GCLM-BC-'.$branch_id;
        return $center_code;
    }
}