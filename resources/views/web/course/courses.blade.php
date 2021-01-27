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
            <img src="{{asset('web/assets/img/icon/courses-icon3.png')}}" alt="course" align="absmiddle">COURSES OFFERED (COMPUTER ADVANCE DIPLOMA COURSES)                                            
         </h4>
         <div class="content_details_holder">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_holder">
               <tbody>
                  <tr class="courses_heading">
                     <td width="10%" align="center" valign="middle">#</td>
                     <td align="center" valign="middle">Courses</td>
                     <td width="15%" align="center" valign="middle">Code</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="{{route('web.course.courses-details')}}"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="{{route('web.course.courses-details')}}">Advance Diploma in  Information Technology (ADIT)</a></td>
                     <td align="center" valign="middle">GCLM 11</td>
                  </tr>
                  <tr class="courses_list2">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance  Diploma In Web Technology (ADWT) </a></td>
                     <td align="center" valign="middle">GCLM 17</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance Diploma In Software Application (ADSA)</a></td>
                     <td align="center" valign="middle">GCLM 19</td>
                  </tr>
                  <tr class="courses_list2">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">COMPUTER  TEACHER'S  TRANING (CTT)</a></td>
                     <td align="center" valign="middle">GCLM 20</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance Diploma in Financial Accounting (ADFA)</a></td>
                     <td align="center" valign="middle">GCLM 37</td>
                  </tr>
                  <tr class="courses_list2">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance Diploma in Hardware &amp; Networking Engineering (ADHNE)</a></td>
                     <td align="center" valign="middle">GCLM 43</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance Diploma in Computer Application (ADCA)</a></td>
                     <td align="center" valign="middle">GCLM-53</td>
                  </tr>
                  <tr class="courses_list2">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advance Diploma In Office Management &amp; Publishing (ADOMP)</a></td>
                     <td align="center" valign="middle">GCLM-54</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Master Diploma in Financial Accounting (MDFA)</a></td>
                     <td align="center" valign="middle">GCLM-77</td>
                  </tr>
                  <tr class="courses_list2">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Professional Advance Diploma in Computer Application (PADCA)</a></td>
                     <td align="center" valign="middle">GCLM-79</td>
                  </tr>
                  <tr class="courses_list">
                     <td align="center" valign="middle"><a href="#"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                     <td align="left" valign="middle"><a href="#">Advanced Diploma In Multimedia (ADM)</a></td>
                     <td align="center" valign="middle">GCLM-85</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection