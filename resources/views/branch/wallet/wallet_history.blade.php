@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                   <div style="text-align: right;">
                      <p style="font-weight:bold;color:black">Wallet Amount</p>: <strong style="color:red;font-size:20px">₹ {{$wallet->amount}}</strong>
                   </div>
              </div>
    	        <div>
    	            <div class="x_content">
                        <h2>Wallet History</h2>
                        <table id="student_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Transaction Type</th>
                              <th>Amount</th>
                              <th>Comment</th>
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
      ajax: "{{ route('branch.wallet_history_ajax') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'transaction_type', name: 'transaction_type',searchable: true},
          {data: 'amount', name: 'amount',searchable: true},
          {data: 'comment', name: 'comment' ,searchable: true},  
          
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