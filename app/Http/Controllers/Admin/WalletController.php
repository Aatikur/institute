<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use App\Models\BranchWallet;
use App\Models\Branch;
use Illuminate\Support\Facades\Hash;

class WalletController extends Controller
{
    public function walletBalance(){
        return view('admin.wallet.wallet_balance');
    }

    public function walletBalanceAjax(){
        return datatables()->of(BranchWallet::latest()->get())
            ->addIndexColumn()
            ->addColumn('branch', function ($row) {
                
                return isset($row->branchDetails->center_name)?$row->branchDetails->center_name:'';
           
            })->addColumn('action', function ($row) {
                return $btn = '<a href="'.route('admin.branch_wallet_history',['id'=>$row->id]).'" class="btn btn-info">View Wallet History</a>';
            })->rawColumns(['branch','action'])
            ->make(true);
    }

    public function walletHistory($id){
        $wallet_history = WalletHistory::where('wallet_id',$id)->latest()->get();
        $wallet = BranchWallet::where('id',$id)->first();
        return view('admin.wallet.wallet_history',compact('wallet_history','wallet'));
    }

    public function creditForm($id){
        $wallet=BranchWallet::where('id',$id)->first();
        return view('admin.wallet.credit_form',compact('wallet'));
    }

    public function credit(Request $request,$id){
        $this->validate($request, [
            'amount'=>'required|numeric'
        ]);

        $wallet = BranchWallet::where('id',$id)->first();
     
        $wallet->amount = $wallet->amount + $request->input('amount');
        if($wallet->save()){
            $wallet_history = new WalletHistory();
            $wallet_history->amount = $request->input('amount');
            $wallet_history->wallet_id = $wallet->id;
            $wallet_history->transaction_type = 1;
            $wallet_history->comment = 'Amount = '.$request->input('amount').' Credited By Admin For Branch Id ='.$wallet->branch_id.'';
        }

        if($wallet_history->save()){
            return redirect()->back()->with('message','Amount Credited Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
       
    }

    public function debitForm($id){
        $wallet=BranchWallet::where('id',$id)->first();
        return view('admin.wallet.debit_form',compact('wallet'));
    }

    public function debit(Request $request,$id){
        $this->validate($request, [
            'amount'=>'required|numeric'
        ]);

        $wallet = BranchWallet::where('id',$id)->first();
        if($wallet->amount >=  $request->input('amount')){    
            $wallet->amount = $wallet->amount - $request->input('amount');
            if($wallet->save()){
                $wallet_history = new WalletHistory();
                $wallet_history->amount = $request->input('amount');
                $wallet_history->wallet_id = $wallet->id;
                $wallet_history->transaction_type = 2;
                $wallet_history->comment = 'Amount = '.$request->input('amount').' Debited By Admin For Branch Id ='.$wallet->branch_id.'';
            }
        }
        else{
            return redirect()->back()->with('error','Not Enough Balance In Branch Wallet To Debit');
        }

        if($wallet_history->save()){
            return redirect()->back()->with('message','Amount Debited Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
       
    }

}