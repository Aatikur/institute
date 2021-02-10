@extends('web.template.master')



@section('content')

<div class="marquee_hld">
   <marquee scrollamount="4">An ISO 9001 : 2015 Certified Autonomous Body | The Best Institute of Information Technology Education & Development.</marquee>
</div>
<!------------body start------------>
<div id="innerpage_body_holder">
   <div class="inner_wrap">
      <div class="content_holder">
         <h4>
           {{$course_details->name}}                                         
         </h4>
         <div class="content_details_holder">
            <p><strong>Duration:{{$course_details->duration}}&nbsp;</strong><br>
               <strong>Eligibility: {{$course_details->eligibility}}</strong><br>
               &nbsp;<br>
            </p>
            <ul style="list-style-type:circle;">
               {!!$course_details->detail!!}
            </ul>
            &nbsp;<br>
            Course fees -&nbsp;<span style="color: rgb(119, 119, 119); font-family: open_sansregular, Arial, Helvetica, sans-serif; font-size: 14.6666669845581px; line-height: 25px;">Contact Your Nearest GCLM Centre.</span>
            <p></p>
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection