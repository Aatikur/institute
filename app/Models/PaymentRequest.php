<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $table = 'payment_request';
    protected $primarykey = 'id';

    protected $fillable=[
        'branch_id','amount','comment','proof','status'
    ];

    public function branch(){
        return $this->belongsTo('App\Models\Branch','branch_id','id');
    }
    public function branchDetails(){
        return $this->belongsTo('App\Models\BranchDetails','branch_id','id');
    }
}
