<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $table = 'user_exam';
    protected $guarded = [];

    public function getExamSection(){
        return $this->hasMany('App\Models\UserExamMaster', 'user_exam_id', 'id');
    }

    public function getUser(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
