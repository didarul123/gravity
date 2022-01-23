<?php

namespace App\Http\Controllers\Admin\Modules\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseToTeacher;
use Storage;
use App\Admin;

class TeacherViewCourse extends Controller
{
     public function teacherViewCoursefor(Request $request ){
        $data['assign'] = CourseToTeacher::with('getCourse')->get();
        
           return view('admin.modules.teacher.teacher_view_course')->with($data);
    }
}
