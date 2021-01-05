<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\BranchWallet;

use App\Models\WalletHistory;
use Auth;
use Image;
use Carbon\Carbon;
class WalletController extends Controller
{
    public function walletHistory(){
        return view('branch.wallet.wallet_history');
    }

    public function walletHistoryAjax(){
        $wallet = BranchWallet::where('branch_id',Auth::user()->id)->first();
        return datatables()->of(WalletHistory::where('wallet_id',$wallet->id)->latest()->get())
            ->addIndexColumn()
            ->addColumn('transaction_type', function ($row) {
                
              if($row->transaction_type == 1){
                  return "Credit";
              }else{
                  return "Debit";
              }
           
            })->rawColumns(['transaction_type'])
            ->make(true);
    }

}