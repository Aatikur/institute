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
    	            <h2>Generate Marksheet</h2>
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
                    <form method="POST" action="{{ route('admin.add_marksheet',['id'=>$student_details->student->id]) }}" enctype="multipart/form-data">
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
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="father_name">Mother Name<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" readonly="readonly"  value="{{ $student_details->mother_name }}" >
                                  
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="duration">Duration<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" name="duration">
                                    @if($errors->has('duration'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Exam Date</label>
                                        <input type="tel" class="form-control" name="tel_no"  readonly="readonly" value="{{ $student_details->student->exam_date }}" >
                                        
                                    </div>
                                </div>
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="tel_no" >Course</label>
                                        <input type="tel" class="form-control" name="tel_no"  readonly="readonly" value="{{ $student_details->student->course->name }}" >
                                      
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="reg_no">Registration No<span><b style="color: red"> * </b></span></label>
                                    <input type="text"  class="form-control" readonly="readonly" value="{{ $student_details->student->reg_no }}">
                                    @if($errors->has('reg_no'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('reg_no') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="date_of_issue" > Date Of Issue</label>
                                    <input type="date" class="form-control" name="date_of_issue"   >
                                    @if($errors->has('date_of_issue'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('date_of_issue') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p><b>Theory</b></p>
                                <label for="student_name">Full Marks<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="theory_full_marks">
                                @if($errors->has('theory_full_marks'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('theory_full_marks') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p>*</p>
                                <label for="student_name">Marks Obtained<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="theory_marks_obtained">
                                @if($errors->has('theory_marks_obtained'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('theory_marks_obtained') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p><b>Practical</b></p>
                                <label for="student_name">Full Marks<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="prac_full_marks">
                                @if($errors->has('prac_full_marks'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('prac_full_marks') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p>*</p>
                                <label for="student_name">Marks Obtained<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="prac_marks_obtained">
                                @if($errors->has('prac_marks_obtained'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('prac_marks_obtained') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p><b>Overall Calculation</b></p>
                                <label for="total_marks">Total Obtained Marks<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="total_marks">
                                @if($errors->has('total_marks'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('total_marks') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div"><p>*</p>
                                <label for="grand_total">Grand Total<span><b style="color: red"> * </b></span></label>
                                <input type="number" class="form-control" name="grand_total">
                                @if($errors->has('grand_total'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('grand_total') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                <label for="grade">Grade</label>
                                <input type="text"  class="form-control" name="grade">
                                @if($errors->has('grade'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('grade') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                <label for="percentage">Percenetage</label>
                                <input type="number"  class="form-control" name="percentage">
                                @if($errors->has('percentage'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('percentage') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-group">    
                            <button type="submit" class='btn btn-success'>Submit</button>
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


        
    