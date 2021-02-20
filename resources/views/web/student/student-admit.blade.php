<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Admit Card</title>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   </head>
   <style>
      @media print {
      #print-btn {
         display :  none;
      }
   }
   </style>
   <script type="text/javascript">
   //  $(document).ready(function () {
   //      window.print();
    });
  </script>
   <body>
      <div>
       <div style="border: 4px solid; border-image: linear-gradient(to right, rgb(254 74 0), rgb(241 234 22),rgb(241 234 22),rgb(254 74 0)) ;
         border-image-slice: 1; padding:5px">
         <div style="width:100%;margin: auto; background-image:url('{{asset('web/assets/img/gclm-bg.png')}}');background-size: 5%;padding-top: 10px; overflow: auto;">
            <div style="text-align: center">   
               <img src="{{asset('web/assets/img/gclm-admit.png')}}" style="width: 70%;">
            </div>
            <div style="margin: 0px 50px 0px 50px;">
               <div style="width: 80%; float:left">
                  <h4 style="font-weight: 500; "><strong >Student's Name : </strong><span>{{$student_details->name}}</span></h4>
                  @if(!empty($student_details->father_name))
                     <h4 style="font-weight: 500;"><strong>Father's Name : </strong>{{$student_details->father_name}} </h4>
                  @elseif(!empty($student_details->mother_name))
                     <h4 style="font-weight: 500;"><strong>Mother's Name : </strong>{{$student_details->mother_name}} </h4>
                  @endif
                  <h4 style="font-weight: 500;width: 70%; float:left;margin-top: 0px;"><strong>Registration-no : </strong>{{$student_details->student->reg_no??null}}</h4>
                  <h4 style="font-weight: 500;width: 30%; float:right;margin-top: 0px;"><strong>Year : </strong>{{$student_details->student->year??null}}</h4>
               </div>
               <div style="width: 20%;float: right;">
                  <img src="{{asset('images/student/'.$student_details->image)}}" style="width: 130px;height:141px;">
               </div>
               <div style="width: 100%; overflow: auto;">
                  <h4 style="font-weight: 500;margin-top: 0px;"><strong>Course :</strong>{{$student_details->student->course->name??null}} </h4>
                  <h4 style="font-weight: 500;width: 40%; float:left;margin-top: 0px;"><strong>Center :</strong>{{$student_details->student->center??null}}</h4>
                  <h4 style="font-weight: 500;width: 60%; float:left;margin-top: 0px;"><strong>Examination to be held on :</strong> {{$student_details->student->exam_date??null}}</h4>
               </div>
               
               <div style="width: 30%; float:left;margin-top: 20px;">
                  @if(!empty($student_details->sign))
                     <img src="{{ asset('images/student/thumb/'.$student_details->sign) }}" alt="test" style="width: 150px; height:38px;">
                  @endif
                  <h4 style="font-weight: 500; margin-top: 0px;"><strong >Signature of Candidate</strong></h4>
               </div>
              <div style="width: 40%; float:left;margin-top: 40px;">
               <div style="text-align: center">   
                  <img src="{{asset('web/assets/img/iso.png')}}" style="width: 20%;">
                  <img src="{{asset('web/assets/img/uasl.png')}}" style="width: 35%;">
               </div>
            </div>
               <div style="width: 30%;float: right;margin-top: 20px;">
                  <img src="{{ asset('images/board/thumb/'.$board->sign) }}" alt="test" style="width: 150px;height:38px;">
                  <h4 style="font-weight: 500;margin-top: 0px;"><strong>Authorised Signature</strong></h4>
               </div>
               <img src="{{asset('web/assets/img/watermark.png')}}" alt="watermark"  style="position: absolute;top: 30%;width: 37%;left: 33%;z-index: -1; opacity: 0.3;">
            </div>
         </div>
         </div>
        <div style="text-align: center"><button onclick="window.print()"class="btn btn-success" id="print-btn">Print</button></div>
      </div>
   </body>
</html>