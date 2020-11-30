<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Branch extends Authenticatable
{
    use Notifiable;
    protected $table = 'branch';
    

    
    protected $fillable = [
        'name','email','password'
    ];

    protected $hidden = [
        'password',
    ];
}
