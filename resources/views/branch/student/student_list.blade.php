@extends('branch.template.branch_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                   
              </div>
    	        <div>
    	            <div class="x_content">
                        <div style="text-align: right;">
                            <a href="{{ route('branch.register_student_form') }}"  class="btn btn-primary"   target="_blank">Add Students</a>
                        </div>
                        <table id="contact_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>CN No</th>
                              <th>Origin City</th>
                              <th>Destination City</th>
                              <th>No Of Packets</th>
                              <th>Actual Weight</th>
                              <th>Pickup Date</th>
                              <th>Pickup Time</th>
                              <th>Action</th>
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

  {{-- <script type="text/javascript">
   function fetchDetails(){
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var type = $('#type').val();
        var table = $('#contact_list').DataTable({
            processing: true,
            serverSide: true,
            "destroy" : true,
          
            "ajax": {
                "url": "{{ route('branch.fetch_all_entries') }}",
                "data": function ( d ) {
                    d.start_from = start_date,
                    d.end_from = end_date,
                    d.type = type
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'docate_id', name: 'docate_id',searchable: true},
                {data: 'origin_city', name: 'origin_city' ,searchable: true},  
                {data: 'destination_city', name: 'destination_city' ,searchable: true},  
                {data: 'no_of_box', name: 'no_of_box' ,searchable: true},  
                {data: 'actual_weight', name: 'actual_weight' ,searchable: true},  
                {data: 'pickup_date', name: 'pickup_date' ,searchable: true},  
                {data: 'pickup_time', name: 'pickup_time' ,searchable: true},  
                {data: 'action', name: 'action' ,searchable: false}                 
                
            ]
        });
        
    }
  </script> --}}

{{-- <script>
  function export_excel(){
  window.location.href = "{{route('admin.product_list_excel')}}";
}
</script> --}}
    
 @endsection