@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Documents List</h2>
                    <a class="btn btn-sm btn-info" style="float: right" href="{{ route('admin.add_doc_form') }}">Add More</a>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="course" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Name</th>
                              <th>File</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($docs) && !empty($docs))
                                @foreach ($docs as $item)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{$item->name}}</td>
                                      <td><a class="btn btn-xs btn-success" href="{{asset('uploads/'.$item->file)}}">View</a></td>
                                  
                                      <td>
                                        <a href="{{ route('admin.delete_doc',['id'=>$item->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                      
                                       
                                      </td>
                                    </tr>
                                @endforeach
                            @else
                              <tr>
                                <td colspan="4" style="text-align: center">No Documents Found</td>
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
            var table = $('#course').DataTable();
        });
     </script>
    
 @endsection