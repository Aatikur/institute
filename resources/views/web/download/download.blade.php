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
                @foreach($docs as $data)
                  <li><a href="{{asset('uploads/'.$data->file)}}" target="_blank"><img src="{{asset('web/assets/img/icon/pdf-icon.png')}}" width="32" height="42" alt="pdf" align="absmiddle">{{$data->name}}</a></li>
                @endforeach
             </ul>
          </div>
       </div>
    </div>
 </div>
<!------------body end------------>
@endsection

@section('script')

@endsection