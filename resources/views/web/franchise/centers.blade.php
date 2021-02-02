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
                  @foreach($all_centers as $items)
                     <option value="{{$items->center_state}}">{{$items->center_state}}</option>
                  @endforeach
                
               </select>
            </div>
         </div>
         <div class="content_details_holder">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="centers_table_holder">
               <tr class="centers_heading">
                  <td width="34%" align="center" valign="middle">Center Code </td>
                  <td width="34%" align="center" valign="middle">Center Name </td>
                  <td width="8%" align="center" valign="middle">Address</td>
                  <td width="10%" align="center" valign="middle">District</td>
                  <td width="13%" align="center" valign="middle">State</td>
                  <td width="10%" align="center" valign="middle">Status</td>
               </tr>
               @foreach($centers as $data)
                  <tr class="centers_list">
                     <td align="center" valign="middle">{{$data->center_code}}</td>
                     <td align="center" valign="middle">{{$data->center_name}}</td>
                     <td align="center" valign="middle">{{$data->center_address}}</td>
                     <td align="center" valign="middle">{{$data->center_district}}</td>
                     <td align="center" valign="middle">{{$data->center_state}}</td>
                     @if($data->branch->status == 1)
                        <td align="center" valign="middle">Active</td>
                     @else
                        <td align="center" valign="middle">Inactive</td>
                     @endif
                  </tr>
               @endforeach
               
            </table>
            <table>
               <td>
               <tr></tr>
               </td>
            </table>
            <br />
            {{-- <center>
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
            </center> --}}
            <br /><br /><br />
         </div>
      </div>
   </div>
</div>
<!------------body end------------>
@endsection

@section('script')
<script>
   $('#state').change(function(){
      var state =  $(this).find(":selected").val();
      window.location = '{{ url("get/branch") }}'+"/"+state;
   });
</script>
@endsection