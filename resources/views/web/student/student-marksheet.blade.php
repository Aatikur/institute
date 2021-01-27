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
                  <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px;"><strong style="font-family:lucida calligraphy;">Student's Name : <span style="font-family:Arial;">{{$student_details->name}}</span> </strong> </h2>
                  <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;"><strong style="font-family:lucida calligraphy;">Reg. No : <span style="font-family:Arial;">{{$student_details->student->reg_no}}</span> </strong> </h2>
               </div>
               <div style="width: 100%; overflow: auto;">
                  <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Mother's Name : <span style="font-family:Arial;">{{$student_details->mother_name}}</span> </strong> </h2>
                  <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Duration : <span style="font-family:Arial;">{{$student_details->student->duration}}</span> </strong> </h2>
               </div>
               <div style="width: 100%; overflow: auto;">
                  <h2 style="font-weight: 500;width: 60%; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Father's Name : <span style="font-family:Arial;">{{$student_details->father_name}}</span> </strong> </h2>
                  <h2 style="font-weight: 500;width: 40%; float:right; font-size: 18px;margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Examination : <span style="font-family:Arial;">{{$student_details->student->exam_date}}</span> </strong> </h2>
               </div>
               <div style="width: 100%; overflow: auto;">
                  <h2 style="font-weight: 500; float:left; font-size: 18px; margin-top: 0px;"><strong style="font-family:lucida calligraphy;">Course Name : <span style="font-family:Arial;">{{$student_details->student->course->name}} </span> </strong> </h2>
               </div>
               <div style="width: 100%; overflow: auto;">
                  <table style="width:100%;border: 2px solid #fe5a17;">
                     <thead style="background-color: #fe4a00e8;">
                        <tr>
                           <th rowspan="3" style="width: 45%; color:#fff;font-family: system-ui;font-weight: 500;">Subject/Module/Paper</th>
                           <th style="width: 45%;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td colspan="6" style="color:#fff;font-family: system-ui;font-weight: 500;">Max.Marks</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2" style="color:#fff; font-family: system-ui;font-weight: 500;">Theory</td>
                                       <td colspan="3" style="color:#fff; font-family: system-ui;font-weight: 500;">Practical</td>
                                    </tr>
                                    <tr>
                                       <td style="font-size: 10px;color:#fff; font-family: system-ui;font-weight: 500;">Full Marks</td>
                                       <td style="font-size: 10px;color:#fff; font-family: system-ui;font-weight: 500;">Marks Obtained</td>
                                       <td style="font-size: 10px;color:#fff; font-family: system-ui;font-weight: 500;">Full Marks</td>
                                       <td style="font-size: 10px;color:#fff; font-family: system-ui;font-weight: 500;">Marks Obtained</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </th>
                           <th rowspan="3" style="width: 10%; color:#fff;font-family: system-ui;font-weight: 500;">Total Obtained Marks</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700; font-size:15px">{!!$student_details->student->course->detail!!}</td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td style="font-family: system-ui;font-weight: 500;">{{$marks->theory_full_marks}}</td>
                                       <td style="font-family: system-ui;font-weight: 500;">{{$marks->theory_marks_obtained}}</td>
                                       <td style="font-family: system-ui;font-weight: 500;">{{$marks->prac_full_marks}}</td>
                                       <td style="font-family: system-ui;font-weight: 500;">{{$marks->prac_marks_obtained}}</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;">{{$marks->total_marks_obtained}}</td>
                        </tr>
                        {{-- <tr>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700; font-size:15px">Computer Advance Diploma </td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;">100</td>
                        </tr>
                        <tr>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700; font-size:15px">Computer Advance Diploma </td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;">100</td>
                        </tr>
                        <tr>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700; font-size:15px">Computer Advance Diploma </td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;">100</td>
                        </tr>
                        <tr>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700; font-size:15px">Computer Advance Diploma </td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <tr>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                       <td style="font-family: system-ui;font-weight: 500;">50</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;">100</td>
                        </tr> --}}
                        <tr style="background-color: #f95416; height: 1px;">
                           <td style="width: 45%;text-align: center;font-family:lucida calligraphy;font-weight: 700; font-size:15px"></td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;"></td>
                        </tr>
                        <tr>
                           <td style="width: 45%;text-align: center;font-weight: 700; font-size:15px">Grand Total</td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                           </td>
                           <td style="width: 10%;;font-weight: 700; text-align: center;">{{$marks->grand_total}}</td>
                        </tr>
                        <tr style="background-color: #f95416; height: 1px;">
                           <td style="width: 45%;text-align: center;font-family:lucida calligraphy;font-weight: 700; font-size:15px"></td>
                           <td style="width: 45%;font-family:lucida calligraphy;font-weight: 700;">
                           </td>
                           <td style="width: 10%;font-family:lucida calligraphy;font-weight: 700; text-align: center;"></td>
                        </tr>
                        <tr style=" background-color: #175beb;color: #fff;">
                           <td style="width: 45%;font-weight: 700; font-size:17px;padding: 10px;">Percentage: {{$marks->percentage}} %</td>
                           <td style="width: 45%;text-align: center;font-weight: 700;">Grade</td>
                           <td style="width: 10%;font-weight: 700; text-align: center;">{{$student_details->student->grade}}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               
               <div style="width: 100%; overflow: auto;">
                  <table class="marks" style="width: 100%;">
                     <tbody style="border: 1px solid;display: block;margin-top: 20px;border-radius: 7px;">
                        <tr >
                           <td style="width: 20%;font-weight: 600;font-size: 15px; color: #fd0373;">Performance</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">Excellent</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">Very Good</td>
                           <td style="width: 20%;font-weight: 600;font-size: 15px;text-align: center;">Good</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">Satisfactory</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">Failure</td>
                        </tr>
                        <tr>
                           <td style="width: 20%;font-weight: 600;font-size: 15px; color: #fd0373;">Marks Range</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(85%-100%)</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(75%-84%)</td>
                           <td style="width: 20%;font-weight: 600;font-size: 15px;text-align: center;">(60%-74%")</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(40%-59%)</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(Below 40%)</td>
                        </tr>
                        <tr>
                           <td style="width: 20%;font-weight: 600;font-size: 15px; color: #fd0373;">Grade</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(A+)</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(A)</td>
                           <td style="width: 20%;font-weight: 600;font-size: 15px;text-align: center;">(B)</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(C)</td>
                           <td style="width: 20%;text-align: center;font-weight: 600;font-size: 15px;">(F)</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div style="width: 75%; float:left;margin-top: 20px;">
                  <h4 style="font-weight: 500; "><strong >Date of Issue: <span>{{$student_details->student->marksheet_date_of_issue}}</span></strong></h4>
               </div>
               <div style="width: 25%;float: right;margin-top: 20px;">
                  <h4 style="font-weight: 500;"><strong>Authorised Signature</strong></h4>
               </div>
               <img src="{{asset('web/assets/img/GCLM.png')}}" alt="watermark"  style="position: absolute;top: 55%;width: 60%;left: 20%;z-index: -1; opacity: 0.3;">
            </div>
         </div>
         <div style="text-align: center"><button onclick="window.print()"class="btn btn-success">Print</button></div>
      </div>
   </body>
</html>