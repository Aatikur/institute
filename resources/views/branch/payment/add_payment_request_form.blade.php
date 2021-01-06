@extends('branch.template.branch_master')

@section('content')
<style>
    .error{
        color:red;
    }
</style>


<div class="right_col" role="main">
    <div class="row">
    	{{-- <div class="col-md-2"></div> --}}
    	<div class="col-md-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
    	            <h2>Add Payment Reuqest</h2>
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
                    <form method="POST" action="{{ route('branch.submit_payment_request') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="x_content">
                            <div class="well" style="overflow: auto">
                                <div class="form-row mb-10">
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="doc_div">
                                        <label for="amount">Amount<span><b style="color: red"> * </b></span></label>
                                        <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
                                        
                                    @if($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                        <label for="proof">Payment Proof<span><b style="color: red"> * </b></span></label>
                                        <input type="file"  class="form-control" name="proof"  >
                                        @if($errors->has('proof'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('proof') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3" id="amount_div" >
                                        <label for="comment">Comment<span><b style="color: red"> * </b></span></label>
                                        <textarea type="text"  class="form-control" name="comment" ></textarea>
                                        @if($errors->has('comment'))
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">    
                                <button type="submit" class='btn btn-success'>Submit Request</button>
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

<script>
    



</script>
@endsection


        
    