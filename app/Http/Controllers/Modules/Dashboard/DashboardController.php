<?php

namespace App\Http\Controllers\Modules\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Subject;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_id = Auth::id();
    	$data['course'] = Enroll::where(['user_id'=>Auth::id()])->count();

        // $data['courses'] = Enroll::where('user_id', $user_id)->get();

        $data['subjects'] = CourseClass::get();

        $data['courses'] = DB::table('enroll')
            ->join('course', 'enroll.course_id', '=', 'course.id')
            ->where('enroll.user_id', $user_id)
            ->select('enroll.course_id', 'enroll.user_id', 'course.*')
            ->get();

        // $subjects = [];
        // foreach ($data['courses'] as $key => $value) {
        //     $course_subjects = Subject::where('course_id', $value->course_id)->get();
        //     array_push($subjects, $course_subjects);
        // }

    	return view('modules.dashboard.dashboard')->with($data);
    }
}
