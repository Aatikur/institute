<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\BranchDetails;
use App\Models\BranchWallet;
use Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Image;
use DB;
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
            $branch_details->center_state_code	 = $request->input('center_state_code');
            $branch_details->center_district = $request->input('center_district');
            $branch_details->save();
            $center_code = $this->generateCenterCode($branch->id,$branch_details->center_state_code);
            $branch_details->center_code = $center_code;
            $branch_details->no_of_computers = $request->input('no_of_comps');
            $branch_details->save();
            if($branch_details->save()){
                $wallet =  new BranchWallet();
                $wallet->branch_id = $branch->id;
                $wallet->save();
                
                
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
                return redirect()->back()->with('message','Branch Has Been Registered Successfully');
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
    public function approveBranch(Request $request){
        $center_code = $request->input('center_code');
        $branch_id = $request->input('branch_id');
        $branch = Branch::where('id',$branch_id)->update([
            'status'=>1
        ]);
        $branch_details = BranchDetails::where('branch_id',$branch_id)->first();
        $branch_details->center_state_code =$this->generateCenterCode($branch_id,$center_code);
     
        if($branch_details->save()){
            return 1;
        }else{
            return 2;
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
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back();
        }
        
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
            'no_of_comps'=>'required|numeric',
            'center_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adhar_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pan_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hs_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $branch = Branch::where('id',$id)->first();
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
        $branch_details->no_of_computers = $request->input('no_of_comps');
        
        $center_photo =  $request->file('center_photo');
        if(!empty($center_photo)){
           
            $center = $this->uploadDocs($center_photo,1);
        }
        
        $adhar_card = $request->file('adhar_photo');
        if(!empty($adhar_card)){
        $adhar_card= $this->uploadDocs($adhar_card,2);
        }

        $pan = $request->file('pan_photo');
        if(!empty($pan)){
            $pann = $this->uploadDocs($pan,3);
        }

        $hs_photo = $request->file('hs_photo');
        if(!empty($hs_photo)){
            $hs_photo=$this->uploadDocs($hs_photo,4);
        }
        
    
        
        
        if(!empty($center)){
            $branch_details->center_photo = $center;  
        }
        if(!empty($adhar_card)){
        $branch_details->adhar_card = $adhar_card;
        }
        if(!empty($pann)){
        $branch_details->pan_card = $pann;
        }
        if(!empty($hs_photo)){
        $branch_details->hs_certificate = $hs_photo;
        }
       
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

    public function generateCenterCode($branch_id,$center_state_code){
       
        $center_codes ='GCLM-'.strtoupper($center_state_code).'-';
        $center_code = strlen($center_codes);
        $code = str_pad($center_codes,$center_code+3-strlen((string)$branch_id),'0');
        $final = $code.$branch_id;
        return $final;
    }
}
