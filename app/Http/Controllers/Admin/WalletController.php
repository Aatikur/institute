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
                
                return isset($row->branch->email)?$row->branch->email:'';
           
            })->addColumn('action', function ($row) {
                return $btn = '<a href="'.route('admin.branch_wallet_history',['id'=>$row->id]).'" class="btn btn-info">View Wallet History</a>';
            })->rawColumns(['branch','action'])
            ->make(true);
    }

    public function walletHistory($id){
        $wallet_history = WalletHistory::where('wallet_id',$id)->latest()->get();
        return view('admin.wallet.wallet_history',compact('wallet_history'));
    }

}