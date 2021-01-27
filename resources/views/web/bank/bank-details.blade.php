@extends('web.template.master')



@section('content')
<!------------header end------------>
<div class="marquee_hld">
   <marquee scrollamount="4">An ISO 9001 : 2015 Certified Autonomous Body | The Best Institute of Information Technology Education & Development.</marquee>
</div>
<!------------body start------------>
<div id="innerpage_body_holder">
   <div class="inner_wrap">
      <div class="content_holder">
         <h4>
            <img src="{{  asset('web/assets/img/icon/about.png')}}" width="51" height="49" alt="about" align="absmiddle">OUR BANK DETAILS                                            
         </h4>
         <div class="content_details_holder bank_details">
            <p>
               Name of The Bank <span>- STATE BANK OF INDIA.</span>
            </p>
            <p>
               A/C Name <span>- GLOBALFAST COMPUTER LITERACY MISSION </span>
            </p>
            <p>
               A/C No <span>- 32401604331</span>
            </p>
            <p>
               Branch Name <span>- KISMATHASDAH.</span>
            </p>
            <p>
               Branch Code <span>- 08286</span>
            </p>
            <p>
               IFSC Code <span>- SBIN0008286</span>
            </p>
            <div class="wi-payOnline-btn">
               <a href="#" target="_blank">PAY ONLINE</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')

@endsection