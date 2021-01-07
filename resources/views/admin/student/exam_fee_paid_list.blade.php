@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                   
              </div>
    	        <div>
    	            <div class="x_content">
                        <h2>Exam Fee Paid List</h2>
                        <table id="student_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Student Name</th>
                              <th>Branch Name</th>
                              <th>Course</th>
                              <th>Admit Card Status</th>
                            
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
      ajax: "{{ route('admin.exam_fee_paid_list_ajax') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name',searchable: true},
          {data: 'branch', name: 'branch',searchable: true},
          {data: 'course', name: 'course',searchable: true},
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