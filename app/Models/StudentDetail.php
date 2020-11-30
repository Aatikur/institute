<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $table = 'student_details';
    protected $primarykey = 'id';
    protected $fillable = [
        'student_id','name','father_name','mother_name','husband_name','address','city','state_code','country','pin','tel_no','mob_no','email','dob','category','gender','medium','image'
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id','id');
    }
}
