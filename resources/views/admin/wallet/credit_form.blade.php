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
                    <h2>Credit Form</h2>
                    <div style="text-align:right;">
                        <h4 >Current Balance : ₹ <b style="color:green;">{{ $wallet->amount }}</b></h4>
                    </div>
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
    	        <div class="col-md-6 col-sm-12 col-xs-12 mb-3" style="text-align: center;">
                    <form method="POST" action="{{ route('admin.branch_credit',['id'=>$wallet->id]) }}" >
                        @method('put')
                        @csrf
                        <div class="x_content">
                            <div class="well" style="overflow: auto">
                                <div class="form-row mb-10">
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3" id="doc_div">
                                        <label for="amount">Amount<span><b style="color: red"> * </b></span></label>
                                        <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
                                        
                                    @if($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group" style="text-align: center;">    
                                <button type="submit" class='btn btn-success'>Add</button>
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


        
    