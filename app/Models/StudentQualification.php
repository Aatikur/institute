<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQualification extends Model
{
    protected $table = 'student_qualification';
    protected $primarykey = 'id';
    protected $fillable = [
        'student_id','exam_name','board','college','year_of_passing','marks_obtained'
    ];
}
