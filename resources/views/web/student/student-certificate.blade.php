<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Student Certificate</title>
      <link src={{asset("web/assets/lucida calligraphy italic.ttf")}}>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>
   <style>
     @media print {
      #print-btn {
         display :  none;
      }
   }
   </style>

   <body>
      <div>
         <div style="border: 4px solid; border-image: linear-gradient(to right, rgb(254 74 0), rgb(241 234 22),rgb(241 234 22),rgb(254 74 0)) ;
         border-image-slice: 1; padding:5px">
         <div style="width:100%;margin: auto; background-image:url('{{asset('web/assets/img/gclm-bg.png')}}');background-size: 5%;padding-top: 10px; overflow: auto;">
            <div style="text-align: center">   
               <img src="{{asset('web/assets/img/gclm-certificate.png')}}" style="width: 90%;">
            </div>
            <div style="margin-top: -15%;">
            <div style="width: 20%;float: left;margin: 0px 0px 0px 8px;">
               {!!$qr_code!!}
            </div>
            <div style="width: 20%;float: right;">
               <img src="{{asset('images/student/'.$student_details->image)}}" style="width: 115px;height:125px;">
            </div>
            </div>
            <div style="margin: 0px 15px 0px 15px;">
              <div style="width: 100%; overflow: auto;">
                  <h2 style="font-weight: 500;width: 23%; float:left; font-family:lucida calligraphy;font-size: 20px;"><strong>Presented to </strong> </h2>
                  <h3 style="font-weight: 500;width: 77%; float:right;border-bottom:1px solid;"><span style="padding-left: 10px;">{{$student_details->name}}</span></h3>
               </div>
            <div style="width: 100%; overflow: auto;">
                <h2 style="font-weight: 500;width: 18%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>S/D/W/O </strong> </h2>
                <h3 style="font-weight: 500;width: 82%; float:right;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">
                  @if(!empty($student_details->father_name))
                     {{$student_details->father_name}}
                  @elseif(!empty($student_details->mother_name))
                     {{$student_details->mother_name}}
                  @endif
               </span></h3>
             </div>
             <div style="width: 100%; overflow: auto;">
                <h2 style="font-weight: 500;width: 52%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>has successfully completed the </strong> </h2>
                <h3 style="font-weight: 500;width: 48%; float:right;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->course->name??null}}</span></h3>
             </div>
             <div style="width: 100%; overflow: auto;">
               <h2 style="font-weight: 500;width: 5%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>at </strong> </h2>
               <h3 style="font-weight: 500;width: 60%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->branchDetails->center_name??null}}</span></h3>
               <h2 style="font-weight: 500;width: 35%; float:right;margin-top: 0px; font-family:lucida calligraphy;font-size: 20px;"><strong style="padding-left: 10px;"> centre of duration </strong> </h2>
            </div>
            <div style="width: 100%; overflow: auto;">
               <h3 style="font-weight: 500;width: 17%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 20px;">{{$student_details->student->duration??null}}</span></h3>
               <h2 style="font-weight: 500;width: 42%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong style="padding-left: 10px;">and obtained the grade </strong> </h2>
               
               <h3 style="font-weight: 500;width: 9%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->grade}}</span></h3>
               <h2 style="font-weight: 500;width: 32%; float:right;margin-top: 0px; font-family:lucida calligraphy;font-size: 20px;"><strong style="padding-left: 10px;"> in recognition of </strong> </h2>
            </div>
            <div style="width: 100%; overflow: auto;">
               <h2 style="font-weight: 500;float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>his/her success this certificaten is awarded.</strong> </h2>
            </div>
            <div style="width: 100%; overflow: auto;">
               <h2 style="font-weight: 500;width: 30%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>Training Period </strong> </h2>
               <h3 style="font-weight: 500;width: 30%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->training_from}}</span></h3>
               <h2 style="font-weight: 500;width: 5%; float:left;margin-top: 0px; font-family:lucida calligraphy;font-size: 20px;"><strong style="padding-left: 10px;"> to </strong> </h2>
               <h3 style="font-weight: 500;width: 35%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->training_to}}</span></h3>
            </div>
            <div style="width: 100%; overflow: auto;">
               <h2 style="font-weight: 500;width: 26%; float:left;margin-top: 0px;font-family:lucida calligraphy;font-size: 20px;"><strong>Enrolment No  </strong> </h2>
               <h3 style="font-weight: 500;width: 28%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 20px;">{{$student_details->student->enrollment_id}}</span></h3>
               <h2 style="font-weight: 500;width: 26%; float:left;margin-top: 0px; font-family:lucida calligraphy;font-size: 20px;"><strong style="padding-left: 10px;"> Date of Issue </strong> </h2>
               <h3 style="font-weight: 500;width: 20%; float:left;border-bottom:1px solid;margin-top: 0px;"><span style="padding-left: 10px;">{{$student_details->student->date_of_issue}}</span></h3>
            </div>
            <!--<div style="width: 30%; float:left;margin-top: 25px;"></div>-->
            <div style="width: 70%; float:left;margin-top:10px;">
               <div>   
                  <img src="{{asset('web/assets/img/iso.png')}}" style="width: 20%;">
                  <img src="{{asset('web/assets/img/uasl.png')}}" style="width: 35%;">
               </div>
            </div>
               <div style="width: 30%;float: right;">
                   <img src="{{ asset('images/board/thumb/'.$board->sign) }}" alt="test" style="width: 150px;height:38px;">
                  <h2 style="font-weight: 500;font-family:lucida calligraphy;font-size: 21px;"><strong>Chairman</strong></h2>
                  <h3 style="font-weight: 500;margin-top: -16px; margin-bottom:2px;font-family:lucida calligraphy;font-size: 15px;"><strong>Board of Examination</strong></h3>
               </div>
               <div style="width: 100%; overflow: auto; padding-bottom: 12px;">
                  <h2 style="font-weight: 500;font-size:15.7px;background-color:#50a808; padding:8px;"><strong>Grade : 80% & Above"A+", 70 to 79% "A", 60 to 69% "B+", 50 to 59% "B", 40 to 49 "C"  </strong> </h2>
                 </div>
                 <div style="text-align: center;margin-top: -2%;">   
                  <img src="{{asset('web/assets/img/web.png')}}" >
               </div>
               <img src="{{asset('web/assets/img/watermark.png')}}" alt="watermark"  style="position: absolute;top: 42%;width: 60%;left: 22%;z-index: -1; opacity: 0.3;">
            </div>
         </div>
         </div>
         <div style="text-align: center"><button onclick="window.print()"class="btn btn-success" id="print-btn">Print</button></div>
      </div>
   </body>
</html>