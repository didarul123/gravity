<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $guarded = [];

     public function gerParentName(){
        return $this->hasOne('App\Models\Course', 'id', 'parent_id');
    }

}
