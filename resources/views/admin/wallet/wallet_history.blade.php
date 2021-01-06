@extends('admin.template.admin_master')

@section('content')

<div class="right_col" role="main">
    <div class="row">
    	<div class="col-md-12 col-xs-12 col-sm-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
                    <h2>Branch Wallet History</h2>
                  <div style="text-align:right;">
                    <h4 >Wallet Amount : ₹ <b style="color:green;">{{ $wallet->amount }}</b></h4><a href="{{ route('admin.branch_credit_form',['id'=>$wallet->id]) }}"  target="_blank" class="btn btn-success">Credit</a><a href="{{ route('admin.branch_debit_form',['id'=>$wallet->id]) }}" class="btn btn-danger" target="_blank" >Debit</a>
                  </div>
    	            <div class="clearfix"></div>
    	        </div>
    	        <div>
    	            <div class="x_content">
                        <table id="category" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>Sl</th>
                              <th>Branch Name</th>                              
                              <th>Transaction Type</th>
                              <th>Amount</th>
                              <th>Comment</th>
                              
                            </tr>
                          </thead>
                          <tbody>  
                            @if (isset($wallet_history) && !empty($wallet_history))
                            
                                @foreach ($wallet_history as $item)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{ $item->wallet->branchDetails->center_name??null }}</td>
                                      <td>
                                        @if ($item->transaction_type == '1')
                                            <p>Credit</p>
                                        @else
                                            <p>Debit</p>
                                        @endif
                                      </td>
                                      <td>
                                       {{ $item->amount }}
                                      </td>
                                      <td>{{ $item->comment }}</td>
                                     
                                    </tr>
                                @endforeach
                            @else
                              <tr>
                                <td colspan="6" style="text-align: center">No Data Found</td>
                              </tr>  
                            @endif                   
                          </tbody>
                        </table>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>
	</div>


 @endsection

@section('script')
     
     <script type="text/javascript">
         $(function () {
            var table = $('#category').DataTable();
        });
     </script>
    
 @endsection