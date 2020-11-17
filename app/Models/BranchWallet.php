<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchWallet extends Model
{
    protected $table = 'branch_wallet';
    protected $primarykey = 'id';
    protected $fillable = [
        'amount','branch_id'
    ];
}
