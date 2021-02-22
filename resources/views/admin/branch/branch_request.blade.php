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
                              <th>Center State</th>
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
                                      <p style="display:none">{{ $center = \App\Models\BranchDetails::where('branch_id',$item->id)->first() }}</p>
                                      <td>{{$center->center_state}}</td>
                                      <td>
                                        <a  class="btn btn-sm btn-success" aria-disabled="true">Waiting For Approval</a>
                                      </td>
                                      <td>
                                        <a id="out"  data-id="{{$item->id}}"  class="btn btn-sm btn-warning">Approve</a>
                                      
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter Center State Code(Eg: AS For Assam)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <textarea class="form-control" placeholder="e.g AS For Assam" id="awb_no"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="submit">Approve</button>
            </div>
          </div>
        </div>
      </div>


 @endsection

@section('script')
     
<script type="text/javascript">
  $(function () {
      var table = $('#course').DataTable();
  });

  $(document).ready(function(){
  $(document).on('click', '#out', function(){
        $('#exampleModal').modal('toggle');
        var id = $(this).data('id');
      $(document).on('click', '#submit', function(){
        const center_code = $('#awb_no').val();
        const branch_id = id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
            url:"{{ route('admin.approve_branch') }}",
            data:  {branch_id: branch_id,center_code:center_code},
            success:function(data){
              if(data == 1){
                alert('Successfully Approved');
                $('#exampleModal').modal('toggle');
                window.location.reload();
              }else{
                alert('Something went wrong!');
              }
            }
        });
      });
    });
  });
  
</script>
    
 @endsection