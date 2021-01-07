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
            <img src="{{  asset('web/assets/img/icon/centers.png')}}" width="48" height="46" alt="centers">Centers                                            
         </h4>
         <div class="centerFilter">
            <div class="centerFilter_div">
               <label>Select State</label>
               <select name="state" id="state" onChange="changeState();">
                  <option value="All">Show All</option>
                  <option value="1">Andhra Pradesh</option>
                  <option value="2">Arunachal Pradesh</option>
                  <option value="3">Assam</option>
                  <option value="4">Bihar</option>
                  <option value="5">Chhattisgarh</option>
                  <option value="6">Goa</option>
                  <option value="7">Gujarat</option>
                  <option value="8">Haryana</option>
                  <option value="9">Himachal Pradesh</option>
                  <option value="10">Jammu & Kashmir</option>
                  <option value="11">Jharkhand</option>
                  <option value="12">Karnataka</option>
                  <option value="13">Kerala</option>
                  <option value="14">Madhya Pradesh</option>
                  <option value="15">Maharashtra</option>
                  <option value="16">Manipur</option>
                  <option value="17">Meghalaya</option>
                  <option value="18">Mizoram</option>
                  <option value="19">Nagaland</option>
                  <option value="20">Odisha</option>
                  <option value="21">Punjab</option>
                  <option value="22">Rajasthan</option>
                  <option value="23">Sikkim</option>
                  <option value="24">Tamil Nadu</option>
                  <option value="25">Telangana</option>
                  <option value="26">Tripura</option>
                  <option value="28">Uttar Pradesh</option>
                  <option value="27">Uttarakhand</option>
                  <option value="29">West Bengal</option>
               </select>
            </div>
         </div>
         <div class="content_details_holder">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="centers_table_holder">
               <tr class="centers_heading">
                  <td width="10%" align="center" valign="middle">Center Code</td>
                  <td width="34%" align="center" valign="middle">Center Name </td>
                  <td width="8%" align="center" valign="middle">Address</td>
                  <td width="10%" align="center" valign="middle">District</td>
                  <td width="13%" align="center" valign="middle">State</td>
                  <td width="13%" align="center" valign="middle">Type</td>
                  <td width="10%" align="center" valign="middle">Status</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1063</td>
                  <td align="center" valign="middle">ALWAYS COMPUTER INSTITUTE</td>
                  <td align="center" valign="middle">1498 HANUMAN MANDIR ROAD KUNHADI KOTA</td>
                  <td align="center" valign="middle">KOTA</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1062</td>
                  <td align="center" valign="middle">RCT Multi Service Institute</td>
                  <td align="center" valign="middle">Rajabari Sologuri MEM</td>
                  <td align="center" valign="middle">Nagaon</td>
                  <td align="center" valign="middle">Assam</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1061</td>
                  <td align="center" valign="middle">MAHESH VED COMPUTER INSTITUTE AND TRAINING CENTER DHOOLKOT</td>
                  <td align="center" valign="middle">Dhoolkot</td>
                  <td align="center" valign="middle">Dausa</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1060</td>
                  <td align="center" valign="middle">SHREE RAM COMPUTER ACADEMY</td>
                  <td align="center" valign="middle">TEHLA ROAD RAJGARH ALWAR</td>
                  <td align="center" valign="middle">ALWAR</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre (H.B.)</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1059</td>
                  <td align="center" valign="middle">DIGITAL EDUCATION</td>
                  <td align="center" valign="middle">LABANA</td>
                  <td align="center" valign="middle">JAIPUR</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre (H.B.)</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1058</td>
                  <td align="center" valign="middle">V S M COMPUTER CENTER</td>
                  <td align="center" valign="middle">BARARA AGRA</td>
                  <td align="center" valign="middle">AGRA</td>
                  <td align="center" valign="middle">Uttar Pradesh</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1057</td>
                  <td align="center" valign="middle">SHRI HARI GRAMIN EMITRA KIOSK CENTER</td>
                  <td align="center" valign="middle">VPO-FATEHPURA BANSA VIA-SAMOD TEH-CHOMU</td>
                  <td align="center" valign="middle">JAIPUR</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Suspended</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1056</td>
                  <td align="center" valign="middle">SRIMANTA SANKARDEV VIDYALAYA</td>
                  <td align="center" valign="middle">HOWARGHT</td>
                  <td align="center" valign="middle">KARBI ANGLONG</td>
                  <td align="center" valign="middle">Assam</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1055</td>
                  <td align="center" valign="middle">DGLA INSTITUTE</td>
                  <td align="center" valign="middle">Ward No 4</td>
                  <td align="center" valign="middle">SRI GANGANAGAR</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1054</td>
                  <td align="center" valign="middle">NEW AMBITIONS THOUGHTS COMPUTER TRAINING CENTER</td>
                  <td align="center" valign="middle">HOWRAGHAT</td>
                  <td align="center" valign="middle">KARBI ANGLONG</td>
                  <td align="center" valign="middle">Assam</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1053</td>
                  <td align="center" valign="middle">AGARWAL COMPUTERS</td>
                  <td align="center" valign="middle">AJMER ROAD KEKRI</td>
                  <td align="center" valign="middle">AJMER</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1052</td>
                  <td align="center" valign="middle">AMBITIONS THOUGHTS COMPUTER TRAINING CENTER</td>
                  <td align="center" valign="middle">HOWARGHT</td>
                  <td align="center" valign="middle">KARBI ANGLONG</td>
                  <td align="center" valign="middle">Assam</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1051</td>
                  <td align="center" valign="middle">CHAHAT COMPUTERS</td>
                  <td align="center" valign="middle">SHREE RAM BHOJNALAY K SAMNE AASHRAM ROAD</td>
                  <td align="center" valign="middle">BHAWANI MANDI</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1050</td>
                  <td align="center" valign="middle">SONU COMPUTER TRAINING CENTER</td>
                  <td align="center" valign="middle">Kasan Road, Near Dena Bank, Bus Stand</td>
                  <td align="center" valign="middle">Gurgaon</td>
                  <td align="center" valign="middle">Haryana</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1049</td>
                  <td align="center" valign="middle">R. K. INSTITUTE OF COMPUTER EDUCATION</td>
                  <td align="center" valign="middle">COD ROAD SUKHDAM COLONY DEFENCE COLONY AGRA 282001</td>
                  <td align="center" valign="middle">AGRA</td>
                  <td align="center" valign="middle">Uttar Pradesh</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1048</td>
                  <td align="center" valign="middle">SUMAN I.T. & VOCATIONAL</td>
                  <td align="center" valign="middle">kultiranitala</td>
                  <td align="center" valign="middle">West Burdwan</td>
                  <td align="center" valign="middle">West Bengal</td>
                  <td align="center" valign="middle">Training Centre (H.B.)</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1047</td>
                  <td align="center" valign="middle">EAGLE WINGS COMPUTER CENTRE</td>
                  <td align="center" valign="middle">Balachanda</td>
                  <td align="center" valign="middle">West Garo hills meghalaya</td>
                  <td align="center" valign="middle">Meghalaya</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1046</td>
                  <td align="center" valign="middle">INSTITUTE OF ADVANCE COMPUTER SCIENCE</td>
                  <td align="center" valign="middle">CHAPAI</td>
                  <td align="center" valign="middle">DARRANG</td>
                  <td align="center" valign="middle">Assam</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1045</td>
                  <td align="center" valign="middle">MAA JAGDAMBA COMPUTER ACADEMY</td>
                  <td align="center" valign="middle">VPO RANOLI , RANOLI</td>
                  <td align="center" valign="middle">TONK</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
               <tr class="centers_list">
                  <td align="center" valign="middle">GCLM-BC-1044</td>
                  <td align="center" valign="middle">SHAIN INFOTECH</td>
                  <td align="center" valign="middle">Near SBI bank manoharpur Shahpura Jaipur Rajasthan</td>
                  <td align="center" valign="middle">Jaipur</td>
                  <td align="center" valign="middle">Rajasthan</td>
                  <td align="center" valign="middle">Training Centre</td>
                  <td align="center" valign="middle">Active</td>
               </tr>
            </table>
            <table>
               <td>
               <tr></tr>
               </td>
            </table>
            <br />
            <center>
               <ul class='setPaginate'>
                  <li class='setPage'>Page 1 of 4</li>
                  <br>
                  <li><a class='current_page'>1</a></li>
                  <li><a href='#'>2</a></li>
                  <li><a href='#'>3</a></li>
                  <li><a href='#'>4</a></li>
                  <li><a href='#'>Next</a></li>
                  <li><a href='#'>Last</a></li>
               </ul>
            </center>
            <br /><br /><br />
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection