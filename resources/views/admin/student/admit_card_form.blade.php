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
    	            <h2>Genrate Admit Card</h2>
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
                        <form method="POST" action="{{ route('admin.update_admit_card',['id'=>$student_details->student->id]) }}" enctype="multipart/form-data">
                    @else
                        <form method="POST" action="{{ route('admin.add_admit_card',['id'=>$student_details->student->id]) }}" enctype="multipart/form-data">
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
                                        <label for="father_name">C/O</label>
                                        <input type="text"  class="form-control" readonly="readonly"  value="{{ $student_details->father_name }}" >
                                    
                                    </div>
                               
                               
                                {{-- <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="reg_no">Registration Number<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" name="reg_no" >
                                    @if($errors->has('reg_no'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('reg_no') }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="year">Year<span><b style="color: red"> * </b></span></label>
                                    <input type="number"  class="form-control" name="year" value="{{isset($student->year)?$student->year:old('year')}}">
                                    @if($errors->has('year'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Course<span><b style="color: red"> * </b></span></label>
                                        <input type="tel" class="form-control" name="tel_no"  readonly="readonly" value="{{ $student_details->student->course->name }}" >
                                      
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="center" >Centre<span><b style="color: red"> * </b></span></label>
                                        <input type="tel" class="form-control" name="center"  value="{{isset($student->center)?$student->center:old('center')}}">
                                        @if($errors->has('center'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('center') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="exam_Date" >Exam Date<span><b style="color: red"> * </b></span></label>
                                        <input type="date" class="form-control" name="exam_Date"  value="{{isset($student->exam_date)?$student->exam_date:old('exam_Date')}}" >
                                        @if($errors->has('exam_Date'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('exam_Date') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                         
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="profile" >Student Photo <span><b style="color: red"> * </b></span></label>
                                    <img style="width:150px;height:150px;" src="{{ asset('images/student/thumb/'.$student_details->image) }}" id="preview"/>
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="profile" >Authorised Signatory <span><b style="color: red"> * </b></span></label>
                                    <img style="width:150px;height:150px;" src="{{ asset('images/board/thumb/'.$board->sign) }}" id="preview"/>
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="profile" >Student Signature <span><b style="color: red"> * </b></span></label>
                                    @if(isset($student_details->sign) && !empty($student_details->sign))
                                        <img style="width:150px;height:150px;" src="{{ asset('images/student/thumb/'.$student_details->sign) }}" id="preview"/>
                                    @else
                                        <p>Not Provided</p>
                                    @endif
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


        
    