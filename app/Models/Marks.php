<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    protected $table='marks';
    protected $fillable = ['student_id','total_marks_obtained','theroy_marks_obtained','prac_full_marks','grade','percentage','prac_marks_obtained'
    ];
}
