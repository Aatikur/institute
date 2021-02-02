<!------------footer start------------>
<div class="footer">
   <ul class="footer_nav">
      <li><a href="{{ route('web.index') }}">Home</a></li>
      <li><a href="{{ route('web.about.about') }}">About Us</a></li>
      <li><a href="{{ route('web.franchise.why-gclm') }}">Franchise/ASC</a></li>
      <li><a href="{{ route('web.bank.bank-details') }}">Bank Details</a></li>
      <li><a href="{{route('web.download.download')}}">Downloads</a></li>
      <li><a href="{{route('web.student.registration-process')}}">Student</a></li>
      <li><a href="{{route('web.gallery.gallery')}}" >Gallery</a></li>
      <li><a href="{{ route('web.contact.contact') }}">Contact Us</a></li>
   </ul>
   <div class="footer_bottom_panel">
      <div class="social_media">
         <a href="#!">
         <img src="{{asset('web/assets/img/footer/facebook-ftr.png')}}" height="48" alt="facebook" /></a>
         <a href="#!"><img src="{{asset('web/assets/img/footer/whatsapp.png')}}" height="48" alt="twitter" /></a>
         <a href="#!"><img src="{{asset('web/assets/img/footer/youtube.png')}}" height="48" alt="twitter" /></a>
      </div>
      <p class="visitorClass"></p>
      <p>GLOBALFAST COMPUTER LITERACY MISSION &copy; 2020. Design by
      <a href="https://www.webinfotech.net.in/" target="_blank">Webinfotech</a> </p>
   </div>
</div>
<!------------footer end------------>
</div>
<script type='text/javascript' src='{{  asset('web/assets/js/menu_jquery.js')}}'></script>
<script src="{{  asset('web/assets/js/modernizr.js')}}"></script>
<script src="{{  asset('web/assets/js/owl.carousel.js')}}"></script>
<script defer src="{{  asset('web/assets/js/jquery.flexslider.js')}}"></script>
<script src="{{  asset('web/assets/js/endless_scroll_min.js')}}" type="text/javascript"></script>
<script src="{{  asset('web/assets/js/custom.js')}}" type="text/javascript"></script>
</body>
</html>