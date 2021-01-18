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
               <img src="{{  asset('web/assets/img/icon/centers.png')}}" width="46" height="45" alt="contact" align="absmiddle">ONLINE ADMIT CARD   
            </h4>
         </div>
         @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
         @endif @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
         @endif
         <br />
         <div class="contact_forms_outer" style="float:left !important;">
            <form action="{{route('web.admit.card')}}" method="post" name="form1" id="form1" class="contact_forms">
                @csrf
               <input type="hidden" name="hd" value="val" />
               <div class="contact_forms_element">
                  <input name="enrollment" id="enrollment" type="text" Placeholder="Enrollment No"  required oninvalid="this.setCustomValidity('Please Enter Enrollment No')">
                  <span class="error msg_holder">
                     @if($errors->has('enrollment'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                           <strong>{{ $errors->first('enrollment') }}</strong>
                        </span>
                     @enderror
                  </span>
                 
               </div>
               <div class="contact_forms_element">
                  <input name="dob" id="dob" type="date" Placeholder="Date Of Birth" required oninvalid="this.setCustomValidity('Please Enrter Dob')">
                  <span class="error msg_holder">
                     @if($errors->has('dob'))
                        <span class="invalid-feedback" role="alert" style="color:red">
                           <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                     @enderror
                  </span>
                  
               </div>
               {{-- <div class="contact_forms_element" style="margin-bottom:20px;">
                  <a class="forgot_password" href="{{ route('web.center.center-forgot-password') }}"><img src="{{  asset('web/assets/img/icon/forgot-password.png')}}" height="30" alt=" ">Forgot Password?</a>
               </div> --}}
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