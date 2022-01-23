<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    protected $table = 'teacher_attendance';
    protected $guarded = [];



    public function getTeacherAttendance(){
        return $this->hasOne('App\Admin','id','teacher_id');
    }


    public function getAttendCourse(){
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
