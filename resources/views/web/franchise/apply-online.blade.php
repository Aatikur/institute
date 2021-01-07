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
         <p><span class="error"> </span>
         </p>
         <br>
         <div class="content_details_holder">
            <form action="apply-online-email.php" method="post" name="form1" id="form1" class="franchise_forms" enctype="multipart/form-data">
               <div class="franchise_forms_element">
                  <label>Contact Person *</label>
                  <input name="name" id="name" type="text">
                  <span class="error msg_holder" id="nameInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Email Address *</label>
                  <input name="email" id="email" type="text">
                  <span class="error msg_holder" id="emailInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Residence Address *</label>
                  <input name="residenceaddress" id="residenceaddress" type="text">
                  <span class="error msg_holder" id="residenceaddressInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>City</label>
                  <input name="city" id="city" type="text">
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>State</label>
                  <select name="state" id="state">
                     <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
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
                  </select>
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>Date Of Birth *</label>
                  <input name="dob" id="dob" type="text" class="hasDatepicker">
                  <span class="error msg_holder" id="dobInfo"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>Qualification *</label>
                  <input name="qualification" id="qualification" type="text">
                  <span class="error msg_holder" id="qualificationInfo"></span>
               </div>
               <div class="innerheading_div">
                  <h5>Center Information</h5>
               </div>
               <div class="franchise_forms_element">
                  <label>Center Name *</label>
                  <input name="centername" id="centername" type="text">
                  <span class="error msg_holder" id="centernameInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Center Address *</label>
                  <input name="centeraddress" id="centeraddress" type="text">
                  <span class="error msg_holder" id="centeraddressInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Center City / Town *</label>
                  <input name="centercity" id="centercity" type="text">
                  <span class="error msg_holder" id="centercityInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Center State *</label>
                  <select name="centerstate" id="centerstate" onchange="changeDistrict(this);">
                     <option value="">Select State</option>
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
                  </select>
                  <span class="error msg_holder" id="centerstateInfo"></span>
               </div>
               <div class="franchise_forms_element" id="districts">
                  <label>Center District *</label>
                  <!-- <select name="centerdistrict" id="centerdistrict">
                     <option value="">Select District</option>
                  </select> -->
                  <input name="centerdistrict" id="centerdistrict" type="text">
                  <span class="error msg_holder" id="centerdistrictInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Centre Affiliated by *</label>
                  <input name="centeraffiliatedby" id="centeraffiliatedby" type="text">
                  <span class="error msg_holder" id="centeraffiliatedbyInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Ph No. With STD code *</label>
                  <input name="phone" id="phone" type="text">
                  <span class="error msg_holder" id="phoneInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Total Space</label>
                  <input name="totalspace" id="totalspace" type="text">
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>Theory Room </label>
                  <input name="theoryroom" id="theoryroom" type="text">
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>Practical Room</label>
                  <input name="practicalroom" id="practicalroom" type="text">
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element">
                  <label>Number of Computer * </label>
                  <input name="numberofcomputer" id="numberofcomputer" type="text">
                  <span class="error msg_holder" id="numberofcomputerInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Number Of Faculties * </label>
                  <input name="numberoffaculties" id="numberoffaculties" type="text">
                  <span class="error msg_holder" id="numberoffacultiesInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>Computer Spec. Assembled/Branded)* </label>
                  <input name="computerspec" id="computerspec" type="text">
                  <span class="error msg_holder" id="computerspecInfo"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>No. of Colleges</label>
                  <input name="colleges" id="colleges" type="text">
                  <span class="error msg_holder"></span>
               </div>
               <div class="franchise_forms_element">
                  <label>No. of High Schools</label>
                  <input name="highschool" id="highschool" type="text">
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element2">
                  <h5>Courses interested</h5>
                  <div class="default" style="margin-top:10px;">
                     <label>
                     <input name="courses[]" id="softwarecourses" type="checkbox" value="Software Courses">
                     Software Courses
                     </label>
                     <label>
                     <input name="courses[]" id="hardwarecourses" type="checkbox" value="Hardware Courses">
                     Hardware Courses
                     </label>
                     <label>
                     <input name="courses[]" id="universitycourses" type="checkbox" value="University Courses">
                     University Courses
                     </label>
                  </div>
                  <span class="error msg_holder"> </span>
               </div>
               <div class="franchise_forms_element2">
                  <h5>Upload Documents (** Max file size should be 200KB.)</h5>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Colour Passport Size Photograph of The Head of The Center</label>
                     <input name="head" id="head" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Voter Card of The Center Head (Both Side in One Page)</label>
                     <input name="voter" id="voter" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Pan Card of The Center Head</label>
                     <input name="pan" id="pan" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Trade License / Registration Certificate of The Center</label>
                     <input name="trade" id="trade" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Colour Photograph of Theory Room</label>
                     <input name="theory" id="theory" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Colour Photograph of Practical Room</label>
                     <input name="practical" id="practical" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Colour Photograph of Office Room</label>
                     <input name="office" id="office" type="file">
                     <span class="error msg_holder"> </span>
                  </div>
                  <div class="franchise_forms_element3">
                     <label class="document-upload">Colour Photograph of Front Side of The Center</label>
                     <input name="front" id="front" type="file">
                     <span class="error msg_holder"> </span>
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