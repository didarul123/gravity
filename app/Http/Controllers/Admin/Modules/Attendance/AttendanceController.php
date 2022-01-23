<?php

namespace App\Http\Controllers\Admin\Modules\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeacherAttendance;
use App\Models\Course;
use App\Admin;

class AttendanceController extends Controller
{
    public function manageAttendance(Request $request)
   {
   	//dd("fdd");
   		$data['teacher_list'] = Admin::where('type','T')->get();
   		$data['course_list'] = Course::get();
   		$data['attendance'] = TeacherAttendance::orderBy('created_at','desc')->get();
        // if ($request->all()) {
        //     if (@$request->keyword) {
        //         $data['routine'] = $data['routine']->where('title', 'like', '%' . $request->keyword . '%');
        //     }
            
        //     // if (@$request->status) {
        //     //     $data['program'] = $data['program']->where('status', $request->status);
        //     // }
        // }
        // $data['routine'] = $data['routine']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.attendance.manage_attendance')->with($data);
   }


    public function storeTeacherAttendance(Request $request)
    {
        $attendance = TeacherAttendance::create([
                    "teacher_id"=>$request->teacher_id,
                    "course_id"=>$request->course_id
        ]);
        if($attendance){
            return redirect()->back()->with('success','Teacher Attendance Submit Successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }
}
