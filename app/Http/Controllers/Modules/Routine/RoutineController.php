<?php

namespace App\Http\Controllers\Modules\Routine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Routine;

class RoutineController extends Controller
{
    public function showRoutine()
    {
    	$data['routine'] = Routine::get();
    	return view('modules.routine.routine_show')->with($data);
    }
}
