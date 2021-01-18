@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Board Signature  List</h2>
                   
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="course" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Sign</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($board) && !empty($board))
                           
                                @foreach ($board as $item)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td><img style="height:150px;width:150px;" src="{{asset('images/board/'.$item->sign)}}"></td>
                                      <td>
                                        <a href="{{route('admin.board_edit_form',['id'=>$item->id])}}" class="btn btn-sm btn-warning">Edit</a>
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