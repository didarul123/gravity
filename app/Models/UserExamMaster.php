<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExamMaster extends Model
{
    protected $table = 'user_exam_master';
    protected $guarded = [];

    public function getExamMaster(){
        return $this->hasOne('App\Models\ExamMaster', 'id', 'exam_master_id');
    }
    public function getUser(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getExamQues(){
        return $this->hasMany('App\Models\UserExamDetail', 'user_exam_master_id', 'id');
    }
}
