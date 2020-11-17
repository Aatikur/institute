<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    protected $table = 'student_result';
    protected $primarykey = 'id';
    protected $fillable = [
        'student_id','theory_total_mark','theory_obtain_mark','practical_total_mark','practical_obtain_mark','date_of_issue','grade'
    ];
}
