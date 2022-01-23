<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamDetail extends Model
{
    protected $table = 'exam_details';
    protected $guarded = [];

    public function getExam(){
        return $this->hasOne('App\Models\ExamMaster', 'id', 'exam_master_id');
    }

}
