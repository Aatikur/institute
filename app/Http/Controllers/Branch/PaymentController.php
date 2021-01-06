<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\PaymentRequest;
class PaymentController extends Controller
{
    public function paymentRequestList(){
        return view('branch.payment.payment_request_list');

    }

    public function paymentRequestListAjax(Request $request){
        return datatables()->of(PaymentRequest::where('branch_id',Auth::user()->id)->get())
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                if($row->status == 1){
                    return '<a class="btn btn-danger btn-sm">Pending</a>';
                }else{
                    return '<a class="btn btn-success btn-sm">Paid</a>';
                }
                
            })->addColumn('proof', function ($row) {
               return '<a class="btn btn-info btn-sm" href="'.asset('branch/proof/'.$row->proof).'">View</a>';
            })->addColumn('date', function ($row) {
                return $row->created_at->format('h:i:s');
             })->rawColumns(['proof','status','date'])
            ->make(true);
    }

    public function paymentRequestForm(){
        return view('branch.payment.add_payment_request_form');
    }


    public function addPaymentRequest(Request $request){
        $this->validate($request, [
            'amount'=>'required|numeric',
            'proof'=>'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'comment'=>'required'
        ]);

        $payment = new PaymentRequest();
        $payment->branch_id = Auth::user()->id;
        $payment->amount = $request->input('amount');
        $payment->status =1;
        $payment->comment = $request->input('comment');
        if($payment->save()){
            if($request->hasFile('proof')){
                $file = $request->file('proof');
                $filename = time() . '.' . $request->file('proof')->extension();
                $filePath = public_path() . '/branch/proof/';
                $file->move($filePath, $filename);
            }
            $payment->proof = $filename;
        }
        if($payment->save()){
            return redirect()->back()->with('message','Payment Reuqest Submitted Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

}