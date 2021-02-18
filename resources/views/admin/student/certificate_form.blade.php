@extends('admin.template.admin_master')

@section('content')
<style>
    .error{
        color:red;
    }
</style>


<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-2"></div> 
    	<div class="col-md-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
    	            <h2>Generate Certificate</h2>
    	            <div class="clearfix"></div>
    	        </div>
                <div>
                     @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                     @endif
                     @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                     @endif

                </div>
    	        <div>
                    @if(isset($student) && !empty($student))
                        <form method="POST" action="{{ route('admin.add_certificate',['id'=>$student_details->student->id]) }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('admin.add_certificate',['id'=>$student_details->student->id]) }}" enctype="multipart/form-data">
                    @endif
                        @method('put')
                        @csrf
    	            <div class="x_content">
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div">
                                    <label for="student_name">Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text" class="form-control" value="{{ $student_details->name }}" readonly="readonly" name="student_name">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="father_name">Father Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" readonly="readonly"  value="{{ $student_details->father_name }}" >
                                  
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Course</label>
                                        <input type="tel" class="form-control" name="tel_no"  readonly="readonly" value="{{ $student_details->student->course->name }}" >
                                      
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Center</label>
                                        <input type="tel" class="form-control" name="tel_no"  readonly="readonly" value="{{ $student_details->student->branchDetails->center_name }}" >
                                      
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="duration">Duration<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" readonly="readonly" value="{{ $student_details->student->duration }}" >
                                    @if($errors->has('duration'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="grade">Grade</label>
                                    <input type="text"  class="form-control"  readonly="readonly" value="{{ $student_details->student->grade }}">
                                    @if($errors->has('grade'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('grade') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="form-row mb-10">
                                    <div class="form-row mb-10">
                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3"><b>Training Period</b>
                                            <label for="training_from" >From<span><b style="color: red"> * </b></span></label>
                                            <input type="date" class="form-control" name="training_from" value="{{ isset($student_details->student->training_from)?$student_details->student->training_from:old('training_from') }}" >
                                            @if($errors->has('training_from'))
                                                <span class="invalid-feedback" role="alert" style="color:red">
                                                    <strong>{{ $errors->first('training_from') }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="training_to" >To<span><b style="color: red"> * </b></span></label>
                                        <input type="date" class="form-control" name="training_to" value="{{ isset($student_details->student->training_to)?$student_details->student->training_to:old('training_to') }}" >
                                        @if($errors->has('training_to'))
                                            <span class="invalid-feedback" role="alert" style="color:red" >
                                                <strong>{{ $errors->first('training_to') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="form-row mb-10">
                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                            <label for="enrollment" >Enrollment No</label>
                                            <input type="tel" class="form-control" name="enrollment"  readonly="readonly" value="{{ $student_details->student->enrollment_id }}" >
                                        </div>
                                    </div>
                                    <div class="form-row mb-10">
                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                            <label for="center" >Centre<span><b style="color: red"> * </b></span></label>
                                            <input type="tel" class="form-control" name="center" readonly="readonly" value="{{ $student_details->student->branchDetails->center_name }}"  >
                                            @if($errors->has('center'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('center') }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="date_of_issue" > Date Of Issue</label>
                                        <input type="date" class="form-control" name="date_of_issue"  value="{{ isset($student_details->student->date_of_issue)?$student_details->student->date_of_issue:old('date_of_issue') }}" >
                                        @if($errors->has('date_of_issue'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('date_of_issue') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">    
                            @if(isset($student) && !empty($student))
                                <button type="submit" class='btn btn-success'>Update</button>
                            @else
                                <button type="submit" class='btn btn-success'>Submit</button>
                            @endif
    	            	</div>
    	            </div>
                    </form>
    	        </div>
    	    </div>
    	</div>
    	
    </div>
</div>


@endsection

@section('script')


@endsection


        
    