@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Branch Request List</h2>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="course" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($branch) && !empty($branch))
                            @php
                              $count=1;
                            @endphp
                                @foreach ($branch as $item)
                                    <tr>
                                      <td>{{$count++}}</td>
                                      <td>{{$item->email}}</td>
                                      <td>{{$item->mobile}}</td>
                                      <td>
                                       
                                          <a  class="btn btn-sm btn-success" aria-disabled="true">Waiting For Approval</a>
                                       
                                      </td>
                                      <td>
                                        <a href="{{ route('admin.branch_status',['branch_id'=>$item->id,'status'=>1]) }}" class="btn btn-sm btn-warning">Approve</a>
                                      
                                      </td>
                                    </tr>
                                @endforeach
                            @else
                              <tr>
                                <td colspan="4" style="text-align: center">No Branch Found</td>
                              </tr>  
                            @endif                   
                          </tbody>
                        </table>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>
	</div>


 @endsection

@section('script')
     
     <script type="text/javascript">
         $(function () {
            var table = $('#category').DataTable();
        });
     </script>
    
 @endsection