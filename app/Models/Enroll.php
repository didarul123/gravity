<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enroll';
    protected $guarded = [];


    public function getMyCourse(){
        return $this->hasOne('App\Models\Course','id','course_id');
    }


    public function getExam(){
        return $this->hasOne('App\Models\ExamMaster','course_id','course_id');
    }

    

   
}
