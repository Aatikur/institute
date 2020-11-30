<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primarykey = 'id';
    protected $fillable = [
        'course_id'	,'enrollment_id','status','is_reg_fee_paid','is_exam_fee_paid','is_result_uploaded',
       	'reg_fee_paid_date','exam_fee_paid_date','result_uploaded_date'
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course','course_id','id');
    }
}
