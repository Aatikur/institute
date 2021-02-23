@extends('admin.template.admin_master')

@section('content')
<style>
    .error{
        color:red;
    }
</style>
<link href="{{ asset('admin/select2-4.1.0-beta.1/dist/css/select2.min.css') }}" rel="stylesheet" />

<div class="right_col" role="main">
    <div class="row">
    	{{-- <div class="col-md-2"></div> --}}
    	<div class="col-md-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
    	            <h2>Add New Branch</h2>
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
                    <form method="POST" action="{{ route('admin.add_branch') }}" enctype="multipart/form-data">
                        @csrf
    	            <div class="x_content">
    	                <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div">
                                    <label for="branch_email">Branch Email<span><b style="color: red"> * </b></span></label>
                                    <input type="email" class="form-control" name="email">
                                    
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                    <label for="mobile">Branch Mobile<span><b style="color: red"> * </b></span></label>
                                    <input type="tel"  class="form-control" name="mobile" value="{{ old('mobile') }}" >
                                    @if($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_name">Contact Person Name<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_name"  value="{{ old('cnt_name') }}"  value="{{ old('cnt_name') }}" >
                                @if($errors->has('cnt_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_email">Contact Person Email<span><b style="color: red"> * </b></span></label>
                                <input type="email" class="form-control" name="cnt_email"  value="{{ old('cnt_email') }}" >
                                @if($errors->has('cnt_email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_state">Contact Person State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_state"  value="{{ old('cnt_state') }}" value="{{ old('cnt_state') }}" >
                                @if($errors->has('cnt_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_state') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_city">Contact Person City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_city"  value="{{ old('cnt_city') }}"  value="{{ old('cnt_city') }}" >
                                @if($errors->has('cnt_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_city') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_dob">Contact Person Date Of Birth<span><b style="color: red"> * </b></span></label>
                                <input type="date" class="form-control" name="cnt_dob"  value="{{ old('cnt_dob') }}"  value="{{ old('cnt_dob') }}" >
                                @if($errors->has('cnt_dob'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_dob') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_qctn">Contact Person Qualification<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_qctn"  value="{{ old('cnt_qctn') }}"  value="{{ old('cnt_qctn') }}" >
                                @if($errors->has('cnt_qctn'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_qctn') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="cnt_address" >Contact Person Residence Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="cnt_address">{{ old('cnt_address') }}</textarea>
                                    @if($errors->has('cnt_address'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_address') }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_name">Center Name<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_name" value="{{ old('center_name') }}"  value="{{ old('center_name') }}" >
                                @if($errors->has('center_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                           
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_city">Center City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_city"  value="{{ old('center_city') }}" >
                                @if($errors->has('center_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_city') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_state">Center State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_state"  value="{{ old('center_state') }}" >
                                @if($errors->has('center_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_state') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_state_code">Center State Code (eg: AS For Assam)<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_state_code"  value="{{ old('center_state_code') }}" >
                                @if($errors->has('center_state_code'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_state_code') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_district">Center District<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_district"   value="{{ old('center_district') }}" >
                                @if($errors->has('center_district'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_district') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_address" >Center Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="center_address"="Type Address">{{ old('center_address') }}</textarea>
                                    @if($errors->has('center_address'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('center_address') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                        </div>
                        <div class="well" style="overflow: auto">
                           
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="no_of_comps" >No Of Computers<span><b style="color: red"> * </b></span></label>
                                    <input type="number" class="form-control" name="no_of_comps" value="{{old('no_of_comps') }}">
                                    @if($errors->has('no_of_comps'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_comps') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_photo" >Center Photo</label>
                                    <input type="file" class="form-control" name="center_photo">
                                   
                                    @if($errors->has('center_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('center_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="adhar_photo" >Adhar Card Photo</label>
                                    <input type="file" class="form-control" name="adhar_photo">
                                    
                                    @if($errors->has('adhar_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('adhar_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="pan_photo" >PAN Card Photo</label>
                                    <input type="file" class="form-control" name="pan_photo">
                                   
                                    @if($errors->has('pan_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('pan_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="hs_photo" >H.S Certificate Photo</label>
                                    <input type="file" class="form-control" name="hs_photo">
                                  
                                    @if($errors->has('hs_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('hs_photo') }}</strong>
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
    	{{-- <div class="col-md-2"></div> --}}
    </div>
</div>


 @endsection

@section('script')
<script src="{{ asset('admin/select2-4.1.0-beta.1/dist/js/select2.min.js')}}"></script>


@endsection


        
    