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
                                <input type="email" class="form-control" value="{{ isset($branch->email)?$branch->email:'' }}" name="branch_email" disabled  >
                                @if($errors->has('branch_email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('branch_email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="branch_mobile">Branch Mobile<span><b style="color: red"> * </b></span></label>
                                <input type="tel" class="form-control" value="{{ isset($branch->mobile)?$branch->mobile:'' }}" name="branch_mobile"   >
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
                                <input type="text" class="form-control" value="{{ isset($branch_data->contact_person)?$branch_data->contact_person:'' }}" name="cnt_name"   >
                                @if($errors->has('cnt_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_email">Contact Person Email<span><b style="color: red"> * </b></span></label>
                                <input type="email" class="form-control" value="{{ isset($branch_data->email_address)?$branch_data->email_address:'' }}" name="cnt_email"   >
                                @if($errors->has('cnt_email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_state">Contact Person State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" value="{{ isset($branch_data->residence_address)?$branch_data->residence_address:'' }}" name="cnt_state"   >
                                @if($errors->has('cnt_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_state') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_city">Contact Person City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" value="{{ isset($branch_data->city)?$branch_data->city:'' }}" name="cnt_city"   >
                                @if($errors->has('cnt_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_city') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_dob">Contact Person Date Of Birth<span><b style="color: red"> * </b></span></label>
                                <input type="date" class="form-control" name="cnt_dob"  value="{{ isset($branch_data->dob)?$branch_data->dob:'' }}" >
                                @if($errors->has('cnt_dob'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_dob') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="cnt_qctn">Contact Person Qualification<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="cnt_qctn"   value="{{ isset($branch_data->qualification)?$branch_data->qualification:'' }}" >
                                @if($errors->has('cnt_qctn'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('cnt_qctn') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="cnt_address" >Contact Person Residence Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="cnt_address">{{ isset($branch_data->residence_address)?$branch_data->residence_address:'' }}</textarea>
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
                                <input type="text" class="form-control" name="center_name" value="{{ isset($branch_data->center_name)?$branch_data->center_name:'' }}" >
                                @if($errors->has('center_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_city">Center City<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_city"  value="{{ isset($branch_data->center_city)?$branch_data->center_city:'' }}" >
                                @if($errors->has('center_city'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_city') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_state">Center State<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_state"  value="{{ isset($branch_data->center_state) ?$branch_data->center_state:''}}" >
                                @if($errors->has('center_state'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_state') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                <label for="center_district">Center District<span><b style="color: red"> * </b></span></label>
                                <input type="text" class="form-control" name="center_district"   value="{{isset($branch_data->center_district)?$branch_data->center_district:''}}">
                                @if($errors->has('center_district'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('center_district') }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_address" >Center Address <span><b style="color: red"> * </b></span></label>
                                    <textarea class="form-control" rows="4" name="center_address">{{ isset($branch_data->center_district)?$branch_data->center_district:'' }} </textarea>
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
                                    <input type="number" class="form-control" name="no_of_comps" value="{{ isset($branch_data->no_of_computers)?$branch_data->no_of_computers:old('no_of_comps') }}">
                                    @if($errors->has('no_of_comps'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('no_of_comps') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="center_photo" >Center Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="center_photo">
                                    @if(!empty($branch_data->center_photo))
                                        <img src="{{asset('images/docs/center/'.$branch_data->center_photo)}}" style="width:150px;height:150px;">
                                    @endif
                                    @if($errors->has('center_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('center_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="adhar_photo" >Adhar Card Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="adhar_photo">
                                    @if(!empty($branch_data->adhar_card))
                                        <img src="{{asset('images/docs/voter/'.$branch_data->adhar_card)}}" style="width:150px;height:150px;">
                                    @endif
                                    @if($errors->has('adhar_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('adhar_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="pan_photo" >PAN Card Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="pan_photo">
                                    @if(!empty($branch_data->pan_card))
                                        <img src="{{asset('images/docs/pan/'.isset($branch_data->pan_card)?$branch_data->pan_card:'')}}" style="width:150px;height:150px;">
                                    @endif
                                    @if($errors->has('pan_photo'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('pan_photo') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="hs_photo" >H.S Certificate Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="hs_photo">
                                    @if(!empty($branch_data->hs_certificate))
                                        <img src="{{asset('images/docs/trade/'.isset($branch_data->hs_certificate)?$branch_data->hs_certificate:'')}}" style="width:150px;height:150px;">
                                    @endif
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


        
    