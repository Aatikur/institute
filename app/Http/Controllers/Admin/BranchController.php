<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchDetails;
use App\Models\BranchWallet;
use Hash;
use Image;
class BranchController extends Controller
{
    public function branchList(){
        $branch=Branch::where('status','=',1)->orWhere('status', '=', 2)->get();
        return view('admin.branch.branch_list',compact('branch'));
    }
    public function branchRequestList(){
        $branch=Branch::where('status',3)->get();
        return view('admin.branch.branch_request',compact('branch'));
    }

    public function addBranchForm(){
        return view('admin.branch.add_branch_form');
    }

    public function addBranch(Request $request){
        $this->validate($request, [
            'email'=>'required|unique:branch,email',
            'mobile'=>'required',
            'password'=>'required|min:8|same:password_confirmation',
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
            'center_district'=>'required'
            
        ]);
            
        $branch = new Branch();
        $branch->email = $request->input('email');
        $branch->password = Hash::make($request->input('password'));
        $branch->mobile = $request->input('mobile');
       
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
            }
            if($branch_details->save()){
                return redirect()->back()->with('message','New Branch Created Successfully');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }
           
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

    public function status($branch_id,$status){

        $branch_status = Branch::where('id',$branch_id)->first();
        $branch_status->status=$status;
        $branch_status->save();
        if($branch_status->save()){
            return redirect()->back()->with('message','Status Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

    public function editBranchForm($id){
        $branch_data = BranchDetails::where('branch_id',$id)->first();
        $branch = Branch::where('id',$id)->first();
        return view('admin.branch.edit_branch_form',compact('branch_data','branch'));
    }

    public function changePasswordForm($id){
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        return view('admin.branch.change_password',compact('id'));
    }
    public function addpasswordForm($id){
        return view('admin.branch.add_password_form',compact('id'));
    }

    public function changePassword(Request $request,$id)
    {
        $this->validate($request, [
           
            // 'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        $user = Branch::where('id',$id)->first();
        
       
        Branch::where('id',$id)->update([
            'password'=>Hash::make($request->input('new_password')),
        ]);
        return redirect()->back()->with('message','Branch Password Updated Successfully');
      
    }

    public function addPassword(Request $request,$id)
    {
        $this->validate($request, [
           
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        $user = Branch::where('id',$id)->first();
            Branch::where('id',$id)->update([
                'password'=>Hash::make($request->input('new_password')),
            ]);
            return redirect()->back()->with('message','Branch Password Added Successfully');
     
    }
    public function updateBranch(Request $request,$id){
        
        $this->validate($request, [
            'branch_email'=>'required',
            'branch_mobile'=>'required',
            'cnt_name'=>'required',
            'cnt_email'=>'required',
            'cnt_state'=>'required',
            'cnt_city'=>'required',
            'cnt_dob'=>'required',
            'cnt_qctn'=>'required',
            'cnt_address'=>'required',
            'center_name'=>'required',
            'center_city'=>'required',
            'center_state'=>'required',
            'center_district'=>'required',
            'center_address'=>'required',
            'affil_by'=>'required',
            'tel_no'=>'required|numeric',
            'theory_room'=>'required',
            'prac_room'=>'required',
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
        $branch = Branch::where('id',$id)->first();
        $branch->email = $request->input('branch_email');
        $branch->mobile = $request->input('branch_mobile');
        $branch->save();

        $branch_details = BranchDetails::where('branch_id',$id)->first();
        $branch_details->contact_person = $request->input('cnt_name');
        $branch_details->email_address = $request->input('cnt_email');
        $branch_details->residence_address = $request->input('cnt_state');
        $branch_details->city = $request->input('cnt_city');
        $branch_details->state = $request->input('cnt_state');
        $branch_details->dob = $request->input('cnt_dob');
        $branch_details->qualification = $request->input('cnt_qctn');
        $branch_details->center_name= $request->input('center_name');
        $branch_details->center_address = $request->input('center_address');
        $branch_details->center_city = $request->input('center_city');
        $branch_details->center_state = $request->input('center_state');
        $branch_details->center_district = $request->input('center_district');
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
       
        
        
        
        if($branch_details->save()){
            return redirect()->back()->with('message','Branch Detail Updated Successfully');
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
