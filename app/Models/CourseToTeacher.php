<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseToTeacher extends Model
{
    
   protected $table = 'course_to_teacher';
   protected $guarded = [];




   public function getTeacherToCourse(){
        return $this->hasOne('App\Admin','id','teacher_id');
    }


    public function getCourse(){
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
