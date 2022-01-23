<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExamDetail extends Model
{
	protected $table = 'user_exam_detail';
    protected $guarded = [];

    public function getQuestion(){
        return $this->hasOne('App\Models\ExamDetail', 'id', 'exam_details_id');
    }
}
