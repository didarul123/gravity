<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function course(){
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function course_class(){
        return $this->belongsTo('App\Models\CourseClass', 'class_id');
    }

}
