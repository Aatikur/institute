@extends('web.template.master')



@section('content')

<!------------body start------------>
<div id="body_holder">
   <!--banner start-->
   <div class="banner">
      <div class="inner_wrap">
         <div id="owl-demo" class="owl-carousel">
            <div class="item"><img src="{{  asset('web/assets/img/slider/slider1.png')}}" width="100%"></div>
            <div class="item"><img src="{{  asset('web/assets/img/slider/slider2.png')}}" width="100%"></div>
            <div class="item"><img src="{{  asset('web/assets/img/slider/slider3.png')}}" width="100%"></div>
            <div class="item"><img src="{{  asset('web/assets/img/slider/slider4.jpg')}}" width="100%"></div>
         </div>
      </div>
   </div>
   <!--banner end-->
   <div class="marquee_hld">
      <marquee scrollamount="4">An ISO 9001 : 2015 Certified Autonomous Body | The Best Institute of Information Technology Education & Development.</marquee>
   </div>
   <!--welcome start-->
   <div class="welcome_holder">
      <div class="inner_wrap">
         <h1><span>WELCOME to</span> <font color="#147dc1">GLOBALFAST COMPUTER LITERACY MISSION</font></h1>
         <p>
         Globalfast Computer Literacy Mission is the new lighting of computer education in India. The great scholars realized to make each Indian&rsquo;s life fulfilled with prosperity and improvement, progress through computer education. Globalfast Computer Literacy Mission is pioneer of making their attempt real. On the Golden highway of twenty first centuries to make people united for formation of new India the first step Globalfast Computer Literacy Mission is at your doorstep. &nbsp;We are very happy to introduce this golden opportunity. Globalfast Computer Literacy Mission has come with all packages that are needed.
         </p>
      </div>
   </div>
   <!--welcome end-->
   <div class="hme_callnow_outer">
      <div class="inner_wrap">
         <h2>Call Now</h2>
         <div class="hme_callnow"><img src="https://www.nces.co.in/images/call.png" height="35" align="absmiddle" alt="call"> Franchise Enquiry: <a href="tel:7002116136" style="color: #fff">+91-7002116136</a></div>
         <div class="hme_callnow"><img src="https://www.nces.co.in/images/helpline.png" height="35" align="absmiddle" alt="call"> Helpline: <a href="tel:7002116136" style="color: #fff">+91-7002116136</a></div>
      </div>
   </div>
   <!------------Affiliation start------------>      
   <div class="affiliation_hld">
      <div class="inner_wrap">
         <div class="content_holder">
            <h2>Affiliations</h2>
            <div class="default">
               <div id="s1" class="marqueeimg" style="display:none;">
                  <img src="{{  asset('web/assets/img/client/1.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/2.png')}}" />
                  <img src="{{  asset('web/assets/img/client/3.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/4.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/5.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/6.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/7.jpg')}}" />
                  <img src="{{  asset('web/assets/img/client/8.jpg')}}" />
               </div>
            </div>
         </div>
      </div>
   </div>
   <!------------Affiliation end------------>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection