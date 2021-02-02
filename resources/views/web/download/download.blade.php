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
          <h4 style="margin-bottom:5px;">
             <img src="{{asset('web/assets/img/icon/download.png')}}" width="40" height="44" alt="download" align="absmiddle">
             Downloads                                            
          </h4>
          <div class="content_details_holder">
             <ul class="download_list">
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Training Centre Affilation Form</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Admission Form</a></li>
                <li><a href="#" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Exam Form</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Prospectus</a></li>
                {{-- <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Sample Certificate</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Mark Sheet Sample</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Full Logo</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">NCES Half Logo</a></li>
                <li><a href="#!" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">Banner Flex Sample</a></li> --}}
             </ul>
          </div>
       </div>
    </div>
 </div>
<!------------body end------------>
@endsection

@section('script')

@endsection