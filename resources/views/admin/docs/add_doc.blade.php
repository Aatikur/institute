
@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="margin-top:50px;">
            <div class="x_panel">

                <div class="x_title">
                        <h2>Upload Documents</h2>
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
                        <form method="post" action="{{route('admin.add_image')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Enter Title" class="form-control">
                                
                                @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="file" name="doc" id="imgprev" class="form-control">
                                <embed id="preview">
                                @if($errors->has('doc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('doc') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
                                <a href="{{route('admin.gallery_list')}}" class="btn btn-warning">Back</a>
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
 <script>
   
   
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
