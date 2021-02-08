<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   
    protected $table = 'course';
    protected $primarykey = 'id';
    protected $fillable = [
        'name','duration','course_code','eligibility','detail','course_fees','exam_fees','status','category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Models\CourseCategory','category_id','id');
    }
}
