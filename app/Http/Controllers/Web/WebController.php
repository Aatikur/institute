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
use App\Models\Board;
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
            $board = Board::first();
            if($student_details){
                return view('web.student.student-admit',compact('student_details','board'));
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
            $board = Board::first();
            if($student_details){
                $marks = Marks::where('student_id',$student->id)->first();
                return view('web.student.student-marksheet',compact('student_details','marks','board'));
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
                $board = Board::first();
                return view('web.student.student-certificate',compact('student_details','board'));
            }else{
                return redirect()->back()->with('error','Invalid Dob');
            }
        }else{
            return redirect()->back()->with('error','Invalid Enrollment Id Or Certificate Not Generated Yet!');
        }
    }

    public function courses($category_id){
        $courses = Course::where('category_id',$category_id)->where('status',1)->get();
        $category = CourseCategory::where('status',1)->findOrFail($category_id);
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
            'no_of_comps'=>'required|numeric',
            'center_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pan_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adhar_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hs_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
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
                
                $branch_details->no_of_computers = $request->input('no_of_comps');
                
                $center_photo =  $request->file('center_photo');
                if(!empty($center_photo)){
                
                    $center = $this->uploadDocs($center_photo,1);
                }
                
                $adhar_card = $request->file('adhar_photo');
                if(!empty($adhar_card)){
                $adhar= $this->uploadDocs($adhar_card,2);
                }
    
                $pan = $request->file('pan_photo');
                if(!empty($pan)){
                    $pann = $this->uploadDocs($pan,3);
                }
    
                $hs_certificate = $request->file('hs_photo');
                if(!empty($hs_certificate)){
                    $hs_photo=$this->uploadDocs($hs_certificate,4);
                }
                
              
                
                if(!empty($center)){
                    $branch_details->center_photo = $center;  
                }
                if(!empty($adhar)){
                $branch_details->adhar_card = $adhar;
                }
                if(!empty($pann)){
                $branch_details->pan_card = $pann;
                }
                if(!empty($hs_photo)){
                $branch_details->hs_certificate = $hs_photo;
                }
                
             
               
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
       
        if($status ==1){
            $destinationPath = base_path() . '/public/images/docs/center';
            
        }else if($status ==2){
            $destinationPath = base_path() . '/public/images/docs/voter';
            
        }else if($status == 3){
            $destinationPath = base_path() . '/public/images/docs/pan';
            
        }else if($status ==4){
            $destinationPath = base_path() . '/public/images/docs/trade';
            
        }else if($status == 5){
            $destinationPath = base_path() . '/public/images/docs/theoryroom';
           
        }else if($status == 6){
            $destinationPath = base_path() . '/public/images/docs/practicalroom';
           
        }else if($status ==7){
            $destinationPath = base_path() . '/public/images/docs/officeroom';
           
        }else{
            if($status == 8){
            $destinationPath = base_path() . '/public/images/docs/frontside';
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