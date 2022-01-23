<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamMaster extends Model
{
    protected $table = 'exam_master';
    protected $guarded = [];

    public function getCourse(){
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }

    public function getQuestuin(){
        return $this->hasMany('App\Models\ExamDetail', 'exam_master_id', 'id')->inRandomOrder();
    }
    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }


}
