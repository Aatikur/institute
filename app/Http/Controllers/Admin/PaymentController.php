<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\PaymentRequest;
use App\Models\BranchWallet;
use App\Models\WalletHistory;
use Carbon;
class PaymentController extends Controller
{
    public function paymentRequestList(){
        return view('admin.payment.payment_request_list');

    }

    public function paymentRequestListAjax(Request $request){
        return datatables()->of(PaymentRequest::get())
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                if($row->status == 1){
                    return '<a class="btn btn-warning btn-sm">Not Approved</a>';
                }elseif($row->status == 2){
                    return '<a class="btn btn-success btn-sm">Approved</a>';
                }else{
                    return '<a class="btn btn-danger btn-sm">Rejected</a>';
                }
                
            })->addColumn('proof', function ($row) {
               return '<a class="btn btn-info btn-sm" href="'.asset('branch/proof/'.$row->proof).'">View</a>';
            })->addColumn('branch', function ($row) {
                return $row->branchDetails->center_name;
             })->addColumn('date', function ($row) {
                return $row->updated_at->format('d-m-y');
            })->addColumn('action', function ($row) {
                $btn ='';
                if($row->status ==1){
                     $btn .= '<a href= "'.route('admin.approve_payment_request',['id'=>$row->id]).'" class="btn btn-success btn-sm">Approve</a>';
                     $btn .= '<a href= "'.route('admin.reject_payment_request',['id'=>$row->id]).'" class="btn btn-danger btn-sm">Reject</a>';
                     return $btn;
                }else{
                    return null;
                }
             })->rawColumns(['proof','status','date','action','branch'])
            ->make(true);
    }

    public function approvePayment($id){
        $payment = PaymentRequest::where('id',$id)->first();
        $payment->status = 2;
        $payment->updated_at = Carbon\Carbon::now();
        if($payment->save()){
            $wallet = BranchWallet::where('branch_id',$payment->branch_id)->first();
            $wallet->amount = $wallet->amount  + $payment->amount;
            if($wallet->save()){
                $wallet_history =  new WalletHistory();
                $wallet_history->wallet_id = $wallet->id;
                $wallet_history->transaction_type = 1;
                $wallet_history->amount = $payment->amount;
                $wallet_history->comment = 'Amount of'.$payment->amount.'Approved by Admin';
                $wallet_history->save();
            }
        }
        if($wallet_history->save()){
            return redirect()->back();
        }
    }
    public function rejectPayment($id){
        $payment = PaymentRequest::where('id',$id)->first();
        $payment->status = 3;
        $payment->updated_at = Carbon\Carbon::now();
        if($payment->save()){
            
            return redirect()->back();
        }
    }

    

   


    
    

}