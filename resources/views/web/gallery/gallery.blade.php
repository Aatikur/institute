@extends('web.template.master')
@section('content')
<!------------header end------------>
<div class="marquee_hld">
   <marquee scrollamount="4">An ISO 9001 : 2015 Certified Autonomous Body | The Best Institute of Information Technology Education & Development.</marquee>
</div>
<!------------body start------------>
<div id="innerpage_body_holder">
   <div class="inner_wrap">
      <div class="innerheading_div">
         <h4>
            <img src="{{asset('web/assets/img/icon/gallery.png')}}" height="41" alt="franchise" align="absmiddle"> Gallery
         </h4>
      </div>
      <ul class="gallery_holder">
         <!--328px x 237px-->
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
         <li>
            <div class="gallery_image"><img src="web/assets/img/gallery.png" width="100%" alt="gallery"></div>
         </li>
      </ul>
   </div>
</div>
<!------------body end------------>
@endsection
@section('script')
@endsection