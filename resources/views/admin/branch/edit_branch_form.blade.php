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
    	            <h2>Update Branch</h2>
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
                    <form method="POST" action="{{ route('admin.update_branch',['id'=>$branch->id]) }}" enctype="multipart/form-data">
                        @csrf
    	            <div class="x_content">
    	               
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="branch_email">Branch Email<span><b style="color: red"> * </b></span></label>
                                <input type="email" class="form-control" value="{{ $branch->email }}" name="branch_email"   >
                                @if($errors->has('branch_email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('branch_email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="branch_mobile">Branch Mobile<span><b style="color: red"> * </b></span></label>
                                <input type="tel" class="form-control" value="{{ $branch->mobile }}" name="branch_mobile"   >
                                @if($errors->has('branch_mobile'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('branch_mobile') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="well" style="overflow: auto">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_name">Contact Person Name<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" value="{{ $branch_data->contact_person }}" name="cnt_name"   >
                                @if($errors->has('cnt_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_email">Contact Person Email<span><b style="color: red"> * </b></span></label>
                                <input type="email" class="form-control" value="{{ $branch_data->email_address }}" name="cnt_email"   >
                                @if($errors->has('cnt_email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_state">Contact Person State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" value="{{ $branch_data->residence_address }}" name="cnt_state"   >
                                @if($errors->has('cnt_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_state') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_city">Contact Person City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" value="{{ $branch_data->city }}" name="cnt_city"   >
                                @if($errors->has('cnt_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_city') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_dob">Contact Person Date Of Birth<span><b style="color: red"> * </b></span></label>
                                <input type="date" class="form-control" name="cnt_dob"  value="{{ old('cnt_dob') }}" value="{{ $branch_data->dob }}" >
                                @if($errors->has('cnt_dob'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_dob') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_qctn">Contact Person Qualification<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_qctn"   value="{{ $branch_data->qualification }}" >
                                @if($errors->has('cnt_qctn'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_qctn') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="cnt_address" >Contact Person Residence Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="cnt_address">{{ $branch_data->residence_address }}</textarea>
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
                                <input type="text" class="form-control" name="center_name" value="{{ $branch_data->center_name }}" >
                                @if($errors->has('center_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_city">Center City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_city"  value="{{ $branch_data->center_city }}" >
                                @if($errors->has('center_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_city') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_state">Center State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_state"  value="{{ $branch_data->center_state }}" >
                                @if($errors->has('center_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_state') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_district">Center District<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_district"   value="{{ $branch_data->center_district }}">
                                @if($errors->has('center_district'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_district') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_address" >Center Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="center_address">{{ $branch_data->center_district }} </textarea>
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
                                    <label for="affil_by" >Center Affiliated By <span><b style="color: red"> * </b></span></label>
                                    <input type="text" class="form-control" name="affil_by" value="{{ old('affil_by') }}">
                                    @if($errors->has('affil_by'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('affil_by') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="tel_no" >Ph No<span><b style="color: red"> * </b></span></label>
                                    <input type="tel" class="form-control" name="tel_no" value="{{ old('tel_no') }}">
                                    @if($errors->has('tel_no'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('tel_no') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="theory_room" >Theory Room<span><b style="color: red"> * </b></span></label>
                                    <input type="text" class="form-control" name="theory_room">
                                    @if($errors->has('theory_room'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('theory_room') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="prac_room" >Pratical Room<span><b style="color: red"> * </b></span></label>
                                    <input type="text" class="form-control" name="prac_room">
                                    @if($errors->has('prac_room'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('prac_room') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="no_of_comps" >No Of Computers<span><b style="color: red"> * </b></span></label>
                                    <input type="number" class="form-control" name="no_of_comps">
                                    @if($errors->has('no_of_comps'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_comps') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="no_of_faculties" >No Of Faculties<span><b style="color: red"> * </b></span></label>
                                    <input type="number" class="form-control" name="no_of_faculties">
                                    @if($errors->has('no_of_faculties'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_faculties') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="no_of_colleges" >No Of Colleges<span><b style="color: red"> * </b></span></label>
                                    <input type="number" class="form-control" name="no_of_colleges">
                                    @if($errors->has('no_of_colleges'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_colleges') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="no_of_schools" >No Of Schools<span><b style="color: red"> * </b></span></label>
                                    <input type="number" class="form-control" name="no_of_schools">
                                    @if($errors->has('no_of_schools'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_schools') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="com_specs" >Computer Specs<span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" name="com_specs"></textarea>
                                    @if($errors->has('com_specs'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('com_specs') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="course" >Course Interested<span><b style="color: red"> * </b></span></label>
                                    <select  class="form-control" name="course">
                                        
                                        <option value="1">Software</option>
                                        <option value="2">Hardware</option>
                                        <option value="3">University</option>
                                    </select>
                                    @if($errors->has('course'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('course') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_photo" >Center Photo<span><b style="color: red"> * </b></span></label>
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
                                    <label for="voter_card" >Voter Card Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="voter_card">
                                    @if($errors->has('voter_card'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('voter_card') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="pan_photo" >PAN Card Photo<span><b style="color: red"> * </b></span></label>
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
                                    <label for="trade_licence" >Trade Licence Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="trade_licence">
                                    @if($errors->has('trade_licence'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('trade_licence') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="theo_photo" >Theory Room Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="theo_photo">
                                    @if($errors->has('theo_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('theo_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="prac_photo" >Practical Room Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="prac_photo">
                                    @if($errors->has('prac_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('prac_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="off_photo" >Office Room Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="off_photo">
                                    @if($errors->has('off_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('off_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="front_photo" >Front Side Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="front_photo">
                                    @if($errors->has('front_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('front_photo') }}</strong>
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


        
    