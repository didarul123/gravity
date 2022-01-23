<?php

namespace App\Http\Controllers\Modules\Enroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enroll;
use App\User;
use Auth;

class EnrollController extends Controller
{
    public function enrollStudent($id=null)
    {
        if($id){
    	   $data['course'] = course::find($id);

           $data['enroll'] = Enroll::where(['user_id'=>Auth::id(),'course_id'=>$id])->first();
            
           
    	   return view('modules.payment.payment')->with($data);
        }
        return redirect()->back()->with('error','Somthing went be wrong.');
    }


    public function storeEnrollStudent(Request $request)
    {
        dd('storeEnrollStudent method is working');
    	if($request->all()){
    		//dd($request->all());
    		@$enroll['virsion_of_study_id'] = $request->virsion_of_study_id;
    		@$enroll['branch_id'] = $request->branch_id;
    		@$enroll['batch_day_id'] = $request->batch_day_id;
    		@$enroll['batch_time_id'] = $request->batch_time_id;
    		@$enroll['batch_name_id'] = $request->batch_name_id;
            $user = User::find(Auth::User()->id);
            @$enroll['user_id'] = $user->id;
    		@$enroll['course_id'] = $request->course_id;    		
    		$data['enroll'] = Enroll::create($enroll);
    		if($data['enroll']){
                return view('modules.payment.payment')->with($data);
        	} else {
            	return redirect()->back()->with('error','Somthing went be wrong.');
        	}
        }
  
    }
}
