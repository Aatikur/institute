<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Student Certificate</title>
      <link src={{asset("web/assets/lucida calligraphy italic.ttf")}}>
   </head>
   <style>
   </style>
   <body>
      <div>
         <div style="width:100%;margin: auto; background-image:url('{{asset('web/assets/img/gclm-bg.png')}}');background-size: 5%;padding-top: 10px; overflow: auto;">
            <div style="text-align: center">   
               <img src="{{asset('web/assets/img/gclm-marks.png')}}" style="width: 100%;">
            </div>
            <div style="margin: 0px 30px 0px 30px;">
            <div style="width: 100%; overflow: auto;">
                  <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px;"><strong style="font-family:lucida calligraphy;">Student's Name : <span style="font-family:Arial;">Vishal Nag</span> </strong> </h2>
                  <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;"><strong style="font-family:lucida calligraphy;">Reg. No : <span style="font-family:Arial;">GCLM1234</span> </strong> </h2>
            </div>
            <div style="width: 100%; overflow: auto;">
                <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Mother's Name : <span style="font-family:Arial;">Vishal Nag</span> </strong> </h2>
                <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Duration : <span style="font-family:Arial;">One Year</span> </strong> </h2>
          </div>
            <div style="width: 100%; overflow: auto;">
            <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Father's Name : <span style="font-family:Arial;">Vishal Nag</span> </strong> </h2>
            <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Examination : <span style="font-family:Arial;">JUNE- 2021</span> </strong> </h2>
        </div>
        <div style="width: 100%; overflow: auto;">
            <h2 style="font-weight: 500; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Course Name : <span style="font-family:Arial;">Computer Advance Diploma Courses</span> </strong> </h2>
           
        </div>

               <img src="{{asset('web/assets/img/GCLM.png')}}" alt="watermark"  style="position: absolute;top: 50%;width: 60%;left: 20%;z-index: -1; opacity: 0.3;">
            </div>
         </div>
         <div style="text-align: center"><button onclick="window.print()"class="btn btn-success">Print</button></div>
      </div>
   </body>
</html>