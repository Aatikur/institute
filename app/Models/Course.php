<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   
    protected $table = 'course';
    protected $primarykey = 'id';
    protected $fillable = [
        'name','course_code','eligibility','detail','course_fees','exam_fees','status'
    ];
}
