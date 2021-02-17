@extends('web.template.master')



@section('content')
<div id="innerpage_body_holder">
   <div class="inner_wrap">
      <div class="content_holder">
         <div class="innerheading_div">
            <h4>
               <img src="{{  asset('web/assets/img/icon/franchise.png')}}" width="53" height="41" alt="franchise" align="absmiddle">Franchise                                                    
            </h4>
         </div>
         @if (Session::has('message'))
            <div class="alert alert-success" >{{ Session::get('message') }}</div>
         @endif
         @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
         @endif
         <p><span class="error"> </span>
         </p>
         <br>
         <div class="content_details_holder">
            <form action="{{route('web.franchise.add_branch')}}" method="post" name="form1" id="form1" class="franchise_forms" enctype="multipart/form-data">
               @csrf
               <div class="franchise_forms_element">
                  <label>Branch Email(Will be used as Login Id) *</label>
                  <input name="email" id="email" type="text" value="{{old('email')}}">
                  @if($errors->has('email'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Contact Person *</label>
                  <input name="cnt_name" id="name" type="text" value="{{old('cnt_name')}}">
                  @if($errors->has('cnt_name'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_name') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Email Address *</label>
                  <input name="cnt_email" id="email" type="text" value="{{old('cnt_email')}}">
                  @if($errors->has('cnt_email'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_email') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Residence Address *</label>
                  <input name="cnt_address" id="residenceaddress" type="text" value="{{old('cnt_address')}}">
                  @if($errors->has('cnt_address'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_address') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>City</label>
                  <input name="cnt_city" id="city" type="text" value="{{old('cnt_city')}}">
                  @if($errors->has('cnt_city'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_city') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>State</label>
                  <input type="text" name="cnt_state" id="state" value="{{old('state')}}" >
                     {{-- <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                     <option value="Andhra Pradesh">Andhra Pradesh</option>
                     <option value="Assam">Assam</option>
                     <option value="Bihar">Bihar</option>
                     <option value="Chandigarh">Chandigarh</option>
                     <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                     <option value="NCT">NCT</option>
                     <option value="Gujarat">Gujarat</option>
                     <option value="Haryana">Haryana</option>
                     <option value="Himachal Pradesh">Himachal Pradesh</option>
                     <option value="Kashmir">Kashmir</option>
                     <option value="Kerala">Kerala</option>
                     <option value="Laccadives">Laccadives</option>
                     <option value="Madhya Pradesh ">Madhya Pradesh </option>
                     <option value="Maharashtra">Maharashtra</option>
                     <option value="Manipur">Manipur</option>
                     <option value="Meghalaya">Meghalaya</option>
                     <option value="Karnataka">Karnataka</option>
                     <option value="Nagaland">Nagaland</option>
                     <option value="Orissa">Orissa</option>
                     <option value="Pondicherry">Pondicherry</option>
                     <option value="Punjab">Punjab</option>
                     <option value="State of Rajasthan">State of Rajasthan</option>
                     <option value="Tamil Nadu">Tamil Nadu</option>
                     <option value="Tripura">Tripura</option>
                     <option value="Uttar Pradesh">Uttar Pradesh</option>
                     <option value="West Bengal">West Bengal</option>
                     <option value="Sikkim">Sikkim</option>
                     <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                     <option value="Mizoram">Mizoram</option>
                     <option value="Daman and Diu">Daman and Diu</option>
                     <option value="Goa">Goa</option>
                     <option value="Bihar">Bihar</option>
                     <option value="Madhya Pradesh">Madhya Pradesh</option>
                     <option value="Uttar Pradesh">Uttar Pradesh</option>
                     <option value="Chhattisgarh">Chhattisgarh</option>
                     <option value="Jharkhand">Jharkhand</option>
                     <option value="Uttarakhand">Uttarakhand</option>
                  </select> --}}
                  @if($errors->has('cnt_state'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_state') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Date Of Birth *</label>
               <input name="cnt_dob" id="dob" type="text" class="hasDatepicker" placeholder="dd-mm-yy">
                  @if($errors->has('cnt_dob'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_dob') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element ">
                  <label>Qualification *</label>
                  <input name="cnt_qctn" id="qualification" type="text" value="{{old('cnt_qctn')}}">
                  @if($errors->has('cnt_qctn'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('cnt_qctn') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="innerheading_div" style="margin-top: 20px;">
                  <h5>Center Information</h5>
               </div>
               <div class="franchise_forms_element">
                  <label>Center Name *</label>
                  <input name="center_name" id="centername" type="text" value="{{old('center_name')}}">
                  @if($errors->has('center_name'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_name') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Center Address *</label>
                  <input name="center_address" id="centeraddress" type="text" value="{{old('center_address')}}">
                  @if($errors->has('center_address'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_address') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Center City / Town *</label>
                  <input name="center_city" id="centercity" type="text" value="{{old('center_city')}}">
                  @if($errors->has('center_city'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_city') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Center State *</label>
                  <input name="center_state" type="text" id="centerstate" value="{{old('center_state')}}" >
                     {{-- <option value="">Select State</option>
                     <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                     <option value="Andhra Pradesh">Andhra Pradesh</option>
                     <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                     <option value="Assam">Assam</option>
                     <option value="Bihar">Bihar</option>
                     <option value="Chandigarh">Chandigarh</option>
                     <option value="Chhattisgarh">Chhattisgarh</option>
                     <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                     <option value="Daman and Diu">Daman and Diu</option>
                     <option value="Delhi">Delhi</option>
                     <option value="Goa">Goa</option>
                     <option value="Gujarat">Gujarat</option>
                     <option value="Haryana">Haryana</option>
                     <option value="Himachal Pradesh">Himachal Pradesh</option>
                     <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                     <option value="Jharkhand">Jharkhand</option>
                     <option value="Karnataka">Karnataka</option>
                     <option value="Kerala">Kerala</option>
                     <option value="Lakshdweep">Lakshdweep</option>
                     <option value="Madhya Pradesh">Madhya Pradesh</option>
                     <option value="Maharashtra">Maharashtra</option>
                     <option value="Manipur">Manipur</option>
                     <option value="Meghalaya">Meghalaya</option>
                     <option value="Mizoram">Mizoram</option>
                     <option value="Nagaland">Nagaland</option>
                     <option value="Odisha">Odisha</option>
                     <option value="Puducherry">Puducherry</option>
                     <option value="Punjab">Punjab</option>
                     <option value="Rajasthan">Rajasthan</option>
                     <option value="Sikkim">Sikkim</option>
                     <option value="Tamil Nadu">Tamil Nadu</option>
                     <option value="Tripura">Tripura</option>
                     <option value="Uttar Pradesh">Uttar Pradesh</option>
                     <option value="Uttarakhand">Uttarakhand</option>
                     <option value="West Bengal">West Bengal</option>
                  </select> --}}
                  @if($errors->has('center_state'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_state') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element" id="districts">
                  <label>Center District *</label>
                  <!-- <select name="centerdistrict" id="centerdistrict">
                     <option value="">Select District</option>
                  </select> -->
                  <input name="center_district" id="centerdistrict" type="text" value="{{old('center_district')}}">
                  @if($errors->has('center_district'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_district') }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="franchise_forms_element">
                  <label>Number of Computer * </label>
                  <input name="no_of_comps" id="numberofcomputer" type="text" value="{{old('no_of_comps')}}">
                  @if($errors->has('no_of_comps'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('no_of_comps') }}</strong>
                     </span>
                 @enderror
               </div>
             
               <div class="franchise_forms_element2" style="margin-top: 20px;">
                  <h5>Upload Documents (** Max file size should be 200KB.)</h5>
                  <div class="franchise_forms_element3">
                     <label class="document-upload"> Passport Size Photo</label>
                     <input name="center_photo" id="head" type="file">
                      @if($errors->has('center_photo'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('center_photo') }}</strong>
                     </span>
                  @enderror
                  </div>
                 
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Pan Card</label>
                     <input name="pan_photo" id="pan" type="file">
                      @if($errors->has('pan_photo'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('pan_photo') }}</strong>
                     </span>
                  @enderror
                  </div>
                  
                 
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Aadhaar Card</label>
                     <input name="adhar_photo" id="practical" type="file">
                      @if($errors->has('adhar_photo'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('adhar_photo') }}</strong>
                     </span>
                  @enderror
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">H.S Pass Certificate</label>
                     <input name="hs_photo" id="office" type="file">
                      @if($errors->has('hs_photo'))
                     <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $errors->first('hs_photo') }}</strong>
                     </span>
                  @enderror
                  </div>
                  
               </div>
               <!-- <div class="franchise_forms_element2">
                  <label>Captcha <span class="red-star">*</span></label>
                  <div style="float:left; width:416px; font:normal 14px/18px 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; text-align:left; color:#535353;">
                     <div class="default" style="float:left; text-align:left;">
                        <div class="contact_rpukzt2">
                           <div class="contact_us_form2_txt" style="float:left; width:100%;"><strong>Word Verification:</strong></div>
                           <div class="default" style="float:left; width:100%;">Type the characters you see in the picture below.</div>
                           <div class="contact_rpukzt" style="float:left; width:100%;"><img src="captcha.php" id="captcha">
                              <a onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();" id="change-image" style="cursor:pointer; display:block; font-weight:bold; color:#C00; margin-bottom:15px;">Not readable? Change text.</a>
                           </div>
                        </div>
                        <div class="contact_us_form4" style="float:left; width:100%;">
                           <div class="contact_us_form2_txt" style="float:left; width:100%;">Letters are not case sensitive:</div>
                           <div class="contact_us_form2_txt_fild" style="float:left; width:100%;"><input name="code" id="code" type="text"></div>
                           <span id="captu" class="error"></span>
                        </div>
                     </div>
                  </div>
               </div> -->
               <div class="franchise_forms_element2">
                  <input name="submit" id="submit" type="submit" value="Submit">                                
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')

@endsection