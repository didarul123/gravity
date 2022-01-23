<?php

namespace App\Http\Controllers\Admin\Modules\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseToTeacher;
use App\Models\CourseClass;
use App\Models\Subject;
use Storage;
use DB;
use Str;
use App\Admin;

class ClassController extends Controller
{
    public function manageClass(Request $request)
   {
   		$data['class'] = CourseClass::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['class'] = $data['class']->where('name', 'like', '%' . $request->keyword . '%');
            }
            
            // if (@$request->status) {
            //     $data['teacher'] = $data['teacher']->where('status', $request->status);
            // }
        }
        $data['class'] = $data['class']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.class.manage_class')->with($data);
   }

    public function createClass(Request $request,$id=null){
        $courses = Course::get();
        return view('admin.modules.class.create_class', compact('courses'));
    }

   public function storeClass(Request $request){

        $request->validate([
            'course_id'        => 'required',
            'subject_id'        => 'required',
            'title'        => 'required|unique:classes',
            'class_date'        => 'required',
            'class_time'        => 'required',
            'zoom_link'        => 'required',
            'description'        => 'required',
        ]);

        $course = new CourseClass();
        $course->course_id = $request->course_id;
        $course->subject_id = $request->subject_id;
        $course->title = $request->title;
        $course->slug = str::slug($request->title);
        $course->class_date = $request->class_date;
        $course->class_time = $request->class_time;
        $course->zoom_link = $request->zoom_link;
        $course->description = $request->description;
        $course->status = $request->status;
        if(@$request->image){
            $image = $request->image;
            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('class', $image, $filename);
            // @unlink(storage_path('app/class/'.@$request->image));
            $course->image = $filename;  
        }
        $course->save();
        return redirect()->back()->with('success','Class added successfully.');


    }

    public function editClass($id){
        $courses = Course::get();
        $class = CourseClass::find($id);
        $subjects = Subject::where('status', 1)->where('course_id', $class->course_id)->get();
        return view('admin.modules.class.edit_class', compact('courses', 'class', 'subjects'));
    }

   public function updateClass(Request $request, $id){

        $course = CourseClass::find($id);
        $course->course_id = $request->course_id;
        $course->subject_id = $request->subject_id;
        $course->title = $request->title;
        $course->slug = str::slug($request->title);
        $course->class_date = $request->class_date;
        $course->class_time = $request->class_time;
        $course->zoom_link = $request->zoom_link;
        $course->description = $request->description;
        $course->status = $request->status;
        if(@$request->image){
            $image = $request->image;
            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('class', $image, $filename);
            @unlink(storage_path('app/class/'.@$request->image));
            $course->image = $filename;  
        }
        $course->save();
        return redirect()->back()->with('success','Class updated successfully.');


    }

    public function deleteClass(Request $request , $id){
        $del = CourseClass::where('id',$id)->first();
        if($del){
            @unlink(storage_path('app/class/'.@$del->image));
            CourseClass::where('id',$id)->delete();
            return redirect()->back()->with('success','Class deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function getsubject(Request $request, $course_id)
    {
        $subjects = Subject::where('course_id', $request->course_id)->where('status', 1)->get();
        return view('admin.modules.class.get_subject', compact('subjects'));
    }

}
