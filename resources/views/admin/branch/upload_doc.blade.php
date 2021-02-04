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
    	            <h2>Upoload Center Documents</h2>
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
    	                <div class="well" style="overflow: auto">
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
                                    <label for="voter_card" >Voter Card Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="voter_card">
                                    @if(!empty($branch_data->voter_card))
                                        <img src="{{asset('images/docs/voter/'.$branch_data->voter_card)}}" style="width:150px;height:150px;">
                                    @endif
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
                                    @if(!empty($branch_data->pan_card))
                                        <img src="{{asset('images/docs/pan/'.$branch_data->pan_card)}}" style="width:150px;height:150px;">
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
                                    <label for="trade_licence" >Trade Licence Photo<span><b style="color: red"> * </b></span></label>
                                    <input type="file" class="form-control" name="trade_licence">
                                    @if(!empty($branch_data->trade_licence))
                                        <img src="{{asset('images/docs/trade/'.$branch_data->trade_licence)}}" style="width:150px;height:150px;">
                                    @endif
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
                                    @if(!empty($branch_data->theory_room_photo))
                                        <img src="{{asset('images/docs/theoryroom/'.$branch_data->theory_room_photo)}}" style="width:150px;height:150px;">
                                    @endif
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
                                    @if(!empty($branch_data->practical_room_photo))
                                        <img src="{{asset('images/docs/practicalroom/'.$branch_data->practical_room_photo)}}" style="width:150px;height:150px;">
                                    @endif
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
                                    @if(!empty($branch_data->office_room_photo))
                                        <img src="{{asset('images/docs/officeroom/'.$branch_data->office_room_photo)}}" style="width:150px;height:150px;">
                                    @endif
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
                                    @if(!empty($branch_data->front_side_photo))
                                        <img src="{{asset('images/docs/frontside/'.$branch_data->front_side_photo)}}" style="width:150px;height:150px;">
                                    @endif
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


        
    