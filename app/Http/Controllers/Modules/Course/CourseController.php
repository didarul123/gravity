<?php

namespace App\Http\Controllers\Modules\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Routine;
use App\Models\NoticeBoard;
use App\User;
use App\Admin;

class CourseController extends Controller
{

    public function getAllCourse()
    {
        $data['all_course'] = Course::orderBy('id','desc')->get();
        
        return view('modules.course.course')->with($data);
    }


    public function courseDetails($id)
    {
    	$data['course'] = Course::where('id',$id)->first();
        $data['course_routines'] = Routine::where('course_id', $id)->get();
    	//dd($data);
    	return view('modules.course.course_details')->with($data);
    }


    //course page
    public function courseList($id=null)
    {
        $data['course'] = Course::orderBy('id','desc')->get()->take(8);
        $data['course_list'] = Course::orderBy('id','desc')->get();
        if(@$id){
            $data['course_list'] = Course::where('parent_id',$id)->orderBy('id','desc')->get();
        }
        //dd($data);
        return view('modules.course.course')->with($data);
    }


    public function showCourseClassWise($id)
    {
        $data['class_wise'] = Course::where('parent_id',$id)->get();
        //dd($data);
        return view('modules.course.course_show_class_wise')->with($data);
    }
}
