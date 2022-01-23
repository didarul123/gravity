<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $table = 'routine';
    protected $guarded = [];


    public function getRoutine(){
        return $this->hasOne('App\Models\Course','id','course_id');
    }
}
