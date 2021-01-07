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
                        <img src="{{  asset('web/assets/img/icon/about.png')}}" width="46" height="45" alt="contact" align="absmiddle">STUDENT RESULT
                     </h4>
                  </div>
                  <div class="contact_forms_outer" style="float:left !important;">
                    <form action="#" method="post" name="form1" id="form1" class="contact_forms">
                        <div class="contact_forms_element">
                           <input name="enrollment" id="enrollment" type="text" Placeholder="Enrollment No."  required >
                           <span class="error msg_holder"></span>
                        </div>
                        <div class="contact_forms_element">
                           <input name="name" id="name" type="text" Placeholder="Student's Name" required >
                           <span class="error msg_holder"></span>
                        </div>
                        <div class="contact_forms_element2">
                           <input name="submit" id="submit" type="submit" value="Login">
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