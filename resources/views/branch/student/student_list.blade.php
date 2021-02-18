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
                        <table id="student_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Course Name</th>
                              <th>Student Name</th>
                              <th>Father's Name</th>
                              <th>Mother's Name</th>
                              <th>Mobile No</th>
                              <th>DOB</th>
                              <th>Gender</th>
                              <th>Medium</th>
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
      ajax: "{{ route('branch.student_list_ajax') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'course_name', name: 'course_name',searchable: true},
          {data: 'name', name: 'name',searchable: true},
          {data: 'father_name', name: 'father_name' ,searchable: true},  
          {data: 'mother_name', name: 'mother_name' ,searchable: true},  
          {data: 'mob_no', name: 'mob_no' ,searchable: true},
          {data: 'dob', name: 'dob' ,searchable: true},
          {data: 'gender', name: 'gender' ,searchable: true},
          {data: 'medium', name: 'medium' ,searchable: true},
          {data: 'status', name: 'status' ,searchable: true},
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