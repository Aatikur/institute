@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Course List</h2>
                    <a class="btn btn-sm btn-info" style="float: right" href="{{ route('admin.add_course_form') }}">Add New Course</a>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="course" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Name</th>
                              <th>Course Code</th>
                              <th>Eligibility</th>
                              <th>Course Fee</th>
                              <th>Duration</th>
                              <th>Detail</th>
                              <th>Exam Fees</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($courses) && !empty($courses))
                            @php
                              $count=1;
                            @endphp
                                @foreach ($courses as $item)
                                    <tr>
                                      <td>{{$count++}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->course_code}}</td>
                                      <td>{{$item->eligibility}}</td>
                                      <td>{{$item->course_fees}}</td>
                                      <td>{{$item->duration}}</td>
                                      <td>{!! $item->detail !!}</td>
                                      <td>{{$item->exam_fees}}</td>
                                      <td>
                                        @if ($item->status == '1')
                                          <a  class="btn btn-sm btn-primary" aria-disabled="true">Enabled</a>
                                        @else
                                          <a  class="btn btn-sm btn-danger" aria-disabled="true">Disabled</a>
                                        @endif
                                      </td>
                                      <td>
                                        <a href="{{ route('admin.edit_course_form',['course_id'=>$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @if ($item->status == '1')
                                          <a href="{{ route('admin.course_status',['course_id'=>$item->id,'status'=>2]) }}" class="btn btn-sm btn-danger">Disable</a>
                                        @else
                                          <a href="{{ route('admin.course_status',['course_id'=>$item->id,'status'=>1]) }}" class="btn btn-sm btn-primary">Enable</a>
                                        @endif
                                       
                                      </td>
                                    </tr>
                                @endforeach
                            @else
                              <tr>
                                <td colspan="4" style="text-align: center">No Courses Found</td>
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