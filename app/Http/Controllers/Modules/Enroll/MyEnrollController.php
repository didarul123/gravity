<?php

namespace App\Http\Controllers\Modules\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\User;
use Auth;

class MyEnrollController extends Controller
{
    public function myEnroll()
    {
    	$user = User::find(Auth::User()->id);
    	$data['enroll'] = Enroll::where('user_id',$user->id)->orderBy('id','desc')->groupBy('course_id')->get();
    	return view('modules.enroll.my_enroll')->with($data);
    }
}
 