@extends('web.template.master')



@section('content')
<!------------header end------------>
<div class="marquee_hld">
   <marquee scrollamount="4">An ISO 9001 : 2015 Certified Autonomous Body | The Best Institute of Information Technology Education & Development.</marquee>
</div>
<!------------body start------------>
<div id="innerpage_body_holder">
   <div class="inner_wrap">
      <div class="content_holder">
         <div class="innerheading_div">
            <h4>
               <img src="{{  asset('web/assets/img/icon/centers.png')}}" width="46" height="45" alt="contact" align="absmiddle">Head Branch FORGOT PASSWORD
               <div class="account_btn">
                  <a href="#">Head Branch Login</a>
               </div>
            </h4>
         </div>
         <div class="contact_forms_outer" style="float:left !important;">
           <form action="#" method="post" name="form1" id="form1" class="contact_forms">
               <input type="hidden" name="hd" value="val" />
               <div class="contact_forms_element">
                  <label>Center ID</label>
                  <input name="cnntid" id="email" type="text" required oninvalid="this.setCustomValidity('Please Enter Center ID')" >
                  <span class="error msg_holder"></span>
               </div>
               <div class="contact_forms_element">
                  <label>PAN Card Number</label>
                  <input name="panno" id="email" type="text" required oninvalid="this.setCustomValidity('Please Enter PAN Card No')" >
                  <span class="error msg_holder"></span>
               </div>
               <div class="contact_forms_element2">
                  <input name="submit" id="submit" type="submit" value="Login">&nbsp;
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection