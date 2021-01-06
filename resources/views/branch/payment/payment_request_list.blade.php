@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                 <div style="text-align:right;">
                     <a href="{{ route('branch.payment_request_form') }}" class="btn btn-primary">Add Payment Request</a>
                 </div>  
              </div>
    	        <div>
    	            <div class="x_content">
                        <h2>Payment Request List</h2>
                        <table id="student_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Amount</th>
                              <th>Comment</th>
                              <th>Proof</th>
                              <th>Date</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>                       
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

    var table = $('#student_list').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('branch.payment_request_list_ajax') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'amount', name: 'amount',searchable: true},
          {data: 'comment', name: 'comment',searchable: true},
          {data: 'proof', name: 'proof',searchable: true},
          {data: 'date', name: 'date',searchable: true},
          {data: 'status', name: 'status',searchable: true},
        ]
});

});
  </script>

{{-- <script>
  function export_excel(){
  window.location.href = "{{route('admin.product_list_excel')}}";
}
</script> --}}
    
 @endsection