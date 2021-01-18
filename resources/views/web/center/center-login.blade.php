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
               <img src="{{  asset('web/assets/img/icon/centers.png')}}" width="46" height="45" alt="contact" align="absmiddle">CENTER LOGIN   
            </h4>
         </div>
         <br />
         <div class="contact_forms_outer" style="float:left !important;">
            <form action="{{route('branch.login_submit')}}" method="post" name="form1" id="form1" class="contact_forms">
               @csrf
               <input type="hidden" name="hd" value="val" />
               <div class="contact_forms_element">
                  <input name="email" id="email" type="text" Placeholder="Center ID"  oninvalid="this.setCustomValidity('Please Enter Center ID')">
                  <span class="error msg_holder"></span>
               </div>
               <div class="contact_forms_element">
                  <input name="password" id="password" type="password" Placeholder="Password"   oninvalid="this.setCustomValidity('Please Enrter Password')">
                  <span class="error msg_holder"></span>
               </div>
               <div class="contact_forms_element" style="margin-bottom:20px;">
                  <a class="forgot_password" href="{{ route('web.center.center-forgot-password') }}"><img src="{{  asset('web/assets/img/icon/forgot-password.png')}}" height="30" alt=" ">Forgot Password?</a>
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