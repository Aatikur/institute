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
                        <h2>Gallery List</h2>
                        <div style="text-align:right;">
                            <a href="{{route('admin.add_image_form')}}" class="btn btn-primary">Add More</a>
                        </div>
                        <table id="gallery_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Caption</th>
                              <th>Image</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody> 
                              @foreach($gallery as $items)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$items->caption}}</td>
                                    <td><img src="{{asset('images/gallery/thumb/'.$items->image)}}" style="width:150px;height:150px;"></td>
                                    <td>
                                        <a class="btn btn-danger" href="{{route('admin.delete_image',['id'=>$items->id])}}">Delete</a>
                                    </td>
                                </tr>
                              @endforeach
                                                    
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
<script>
    $(document).ready(function(){
        $('#gallery_list').DataTable();
    });
</script>
    
 @endsection