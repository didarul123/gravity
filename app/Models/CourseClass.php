<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
   public function course(){
      return $this->belongsTo('App\Models\Course', 'course_id');
   }     

   public function subject(){
      return $this->belongsTo('App\Models\Subject', 'subject_id');
   }
}
