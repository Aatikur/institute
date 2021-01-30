
@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="margin-top:50px;">
            <div class="x_panel">

                <div class="x_title">
                    @if(isset($course) && !empty($course))
                        <h2>Update Course</h2>
                    @else
                        <h2>Add New Course</h2>
                    @endif
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
                        @if(isset($course) && !empty($course))
                            {{Form::model($course, ['method' => 'put','route'=>['admin.update_course',$course->id],'enctype'=>'multipart/form-data'])}}
                        @else
                            {{ Form::open(['method' => 'post','route'=>'admin.add_course','enctype'=>'multipart/form-data']) }}
                        @endif

                        <div class="form-group">
                            {{ Form::label('course_name', 'Course Name')}}
                            {{ Form::text('name',null,array('class' => 'form-control','placeholder'=>'Enter Course Name')) }}
                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Select Course Category</label>
                            <select class="form-control" name="category" id="category">
                                @if(isset($course) && !empty($course))
                                    @foreach($category as $items)
                                        <option value="{{$items->id}}" {{$items->id ==$course->category_id?'selected':''}}>{{$items->name}}</option>
                                    @endforeach
                                @else
                                    @foreach($category as $items)
                                        <option value="{{$items->id}}">{{$items->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                       
                        <div class="form-group">
                            {{ Form::label('course_code', 'Course Code')}}
                            {{ Form::text('course_code',null,array('class' => 'form-control','placeholder'=>'Enter Course Code')) }}
                            @if($errors->has('course_code'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('course_code') }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('eligibility', 'Eligibility')}}
                            {{ Form::text('eligibility',null,array('class' => 'form-control','placeholder'=>'Enter Eligibility')) }}
                            @if($errors->has('eligibility'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('eligibility') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('duration', 'Course Duration')}}
                            {{ Form::text('duration',null,array('class' => 'form-control','placeholder'=>'Enter Course Duration')) }}
                            @if($errors->has('duration'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('duration') }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('course_fees', 'Course Fees')}}
                            {{ Form::number('course_fees',null,array('class' => 'form-control','placeholder'=>'Enter Course Fees')) }}
                            @if($errors->has('course_fees'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('course_fees') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('exam_fees', 'Exam Fees')}}
                            {{ Form::number('exam_fees',null,array('class' => 'form-control','placeholder'=>'Enter Exam Fees')) }}
                            @if($errors->has('exam_fees'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('exam_fees') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">                                
                            <label for="details">Details<span><b style="color: red"> * </b></span></label>
                            <textarea class="form-control" name="details" id="details">{{ isset($course->detail) ? $course->detail:'' }}</textarea>
                            @if($errors->has('details'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if(isset($course) && !empty($course))
                                {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
                            @else
                                {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
                            @endif
                            <a href="{{route('admin.course_list')}}" class="btn btn-warning">Back</a>

                        </div> 
                        {{ Form::close() }}

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
   </script>
 @endsection
