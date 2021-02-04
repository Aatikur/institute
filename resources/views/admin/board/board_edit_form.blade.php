
@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="margin-top:50px;">
            <div class="x_panel">

                <div class="x_title">
                        <h2>Update Authorised Signature</h2>
                   <div class="clearfix"></div>
                </div>

                 <div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                </div>

                <div>
                    <div class="x_content">
                        <form method="post" action="{{route('admin.update_board',['id'=>$board_details->id])}}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <input type="file" name="sign" id="imgprev" class="form-control">
                                <img id="preview" style="width:150px;height:150px;" src="{{  asset('images/board/'.$board_details->sign)}}">
                                @if($errors->has('sign'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('sign') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
                                <a href="{{route('admin.board_list')}}" class="btn btn-warning">Back</a>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="clearfix"></div>
</div>
@endsection
@section('script')
 <script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>  
 <script>
    CKEDITOR.replace( 'details', {
       height: 200,
   });

   
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgprev").change(function(){
        readURL(this);
    });
</script>
 @endsection
