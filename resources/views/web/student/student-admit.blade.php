<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Admit Card</title>
   </head>
   <style>
   </style>
   <body>
      <div>
         <div style="width:100%;margin: auto; background-image:url('{{asset('web/assets/img/gclm-bg.png')}}');background-size: 5%;padding-top: 10px;">
            <div style="text-align: center">   
               <img src="{{asset('web/assets/img/gclm-admit.png')}}" style="width: 70%;">
            </div>
            <div style="margin: 0px 50px 0px 50px;">
               <div style="width: 70%; float:left">
                  <h4 style="font-weight: 500; "><strong >Student's Name : </strong><span>Vishal</span></h4>
                  <h4 style="font-weight: 500;"><strong>Father's Name : </strong>Gulzar</h4>
                  <h4 style="font-weight: 500;width: 70%; float:left;margin-top: 0px;"><strong>Registration-no : </strong>GCLM234567</h4>
                  <h4 style="font-weight: 500;width: 30%; float:right;margin-top: 0px;"><strong>Year : </strong>2019</h4>
               </div>
               <div style="width: 30%;float: right;">
                  <img src="{{asset('web/assets/img/people.png')}}" style="width: 100%;">
               </div>
               <div style="width: 100%; overflow: auto;">
                  <h4 style="font-weight: 500;margin-top: 0px;"><strong>Course :</strong> Computer Advance Diploma Courses </h4>
                  <h4 style="font-weight: 500;width: 40%; float:left;margin-top: 0px;"><strong>Center :</strong>Guwahati</h4>
                  <h4 style="font-weight: 500;width: 60%; float:left;margin-top: 0px;"><strong>Examination to be held on :</strong> JUNE- 2021</h4>
               </div>
               {{-- <img src="{{asset ('web/images/logo-50.png') }}" alt="watermark"  style="position: absolute;top: 12%;width: 35%;left: 33%;z-index: -1;"> --}}
            </div>
         </div>
         <div style="text-align: center"><button onclick="window.print()"class="btn btn-success">Print</button></div>
      </div>
   </body>
</html>