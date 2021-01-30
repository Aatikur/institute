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
            <img src="{{asset('web/assets/img/icon/courses-icon3.png')}}" alt="course" align="absmiddle">COURSES OFFERED ({{$course->name}})                                            
         </h4>
         <div class="content_details_holder">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_holder">
               <tbody>
                  <tr class="courses_heading">
                     <td width="10%" align="center" valign="middle">#</td>
                     <td align="center" valign="middle">Courses</td>
                     <td width="15%" align="center" valign="middle">Code</td>
                  </tr>
                  @foreach($courses as $course)
                     <tr class="courses_list">
                        <td align="center" valign="middle"><a href="{{route('web.course_details',['course_id'=>$course->id])}}"><img src="{{asset('web/assets/img/icon/courses-icon.png')}}" alt="courses" align="absmiddle"></a></td>
                        <td align="left" valign="middle"><a href="{{route('web.course_details',['course_id'=>$course->id])}}">{{$course->name}}</a></td>
                        <td align="center" valign="middle">{{$course->course_code}}</td>
                     </tr>
                  @endforeach
                
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