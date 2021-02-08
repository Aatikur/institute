@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Course Category List</h2>
                    <a class="btn btn-sm btn-info" style="float: right" href="{{ route('admin.add_category_form') }}">Add New Category</a>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="category" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($category) && !empty($category))
                                @foreach ($category as $item)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>
                                        @if($item->status == '1')
                                          <a  class="btn btn-xs btn-success">Enabled</a>
                                        @else
                                          <a  class="btn btn-xs btn-danger">Disabled</a>
                                        @endif
                                      <td>
                                        <a href="{{ route('admin.edit_category',['id'=>$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @if ($item->status == '1')
                                          <a href="{{ route('admin.category_status',['category_id'=>$item->id,'status'=>2]) }}" class="btn btn-sm btn-danger">Disable</a>
                                        @else
                                          <a href="{{ route('admin.category_status',['category_id'=>$item->id,'status'=>1]) }}" class="btn btn-sm btn-primary">Enable</a>
                                        @endif
                                       
                                      </td>
                                    </tr>
                                @endforeach
                            @else
                              <tr>
                                <td colspan="4" style="text-align: center">No Category Found</td>
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