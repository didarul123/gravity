<?php

namespace App\Http\Controllers\Admin\Modules\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseToTeacher;
use Storage;
use App\Admin;

class CourseController extends Controller
{
    public function manageCourse(Request $request)
   { 
    $data['course'] = Course::orderBy('created_at','desc');
        $data['parent'] = Course::get();
        if ($request->all()) {
            if (@$request->keyword) {
                $data['course'] = $data['course']->where('name', 'like', '%' . $request->keyword . '%')
                                                    ->orwhereHas('gerParentName',function($e) use ($request){
                                                        $e->where('name', 'like', '%' . $request->keyword . '%');
                                                    });
            }
            
            // if (@$request->parent_id) {
            //     $data['course'] = $data['course']->where('parent_id', $request->parent_id);
            // }
            // if (@$request->status) {
            //     $data['category'] = $data['category']->where('status', $request->status);
            // }
        }
        $data['course'] = $data['course']->get();
        $data['key'] = $request->all();
   		// $data['course'] = Course::orderBy('created_at','desc');
     //    if ($request->all()) {
     //        if (@$request->keyword) {
     //            $data['course'] = $data['course']->where('name', 'like', '%' . $request->keyword . '%');
     //        }
            
     //    }
     //    $data['course'] = $data['course']->get();
     //    $data['key'] = $request->all();
   		return view('admin.modules.course.manage_course')->with($data);
   }

   public function createCourse(Request $request,$id=null){

        $data['parent'] = Course::where('id','!=',@$id)->get();

        if($request->all()){
            $request->validate([
                'name'        => 'required',
                'from_date'   => 'required',
                'to_date'   => 'required',
                'price'      => 'required',
                'description'=>'required',
                //'mobile'   => 'required',
            ]);
            $course['name'] = $request->name;
            $course['from_date'] = $request->from_date;
            $course['to_date'] = $request->to_date;
            $course['price'] = $request->price;
            $course['description'] = $request->description;
            // $course['parent_id'] = @$request->parent_id ? $request->parent_id : 0;
            
            if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('course', $image, $filename);
                @unlink(storage_path('app/course/'.@$request->image));
                $course['image'] = $filename;
            }

            if(@$request->ID){
                Course::where('id',$request->ID)->update($course);
                return redirect()->route('manage.course')->with('success','Course updated successfully.');
            }
            
            $storeCategory = Course::create($course);
            // if(@$request->name){
            //     $slug = str_slug($request->name).'-'.$storeCategory->id;
            // }else{
            //     $slug = time().''.$request->ID;
            // }
            // Category::where('id',$storeCategory->id)->update(['slug'=>$slug]);
            return redirect()->route('manage.course')->with('success','Course added successfully.');
        }
        $data['course'] = Course::where('id',@$id)->first();

        // if($request->all()){
        //     $request->validate([
        //         'name'        => 'required',
        //         'from_date'   => 'required',
        //         'to_date'   => 'required',
        //         'price'		=> 'required',
        //         'description'=>'required',
        //         //'mobile'   => 'required',
        //     ]);
        //     $course['name'] = $request->name;
        //     $course['from_date'] = $request->from_date;
        //     $course['to_date'] = $request->to_date;
        //     $course['price'] = $request->price;
        //     $course['description'] = $request->description;
        	
        // 	if(@$request->image){
        //         $image = $request->image;
        //         $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
        //         Storage::putFileAs('course', $image, $filename);
        //         @unlink(storage_path('app/course/'.@$request->image));
        //         $course['image'] = $filename;
        //     }

        //     if(@$request->ID){
        //        	Course::where('id',$request->ID)->update($course);
        //         return redirect()->route('manage.course')->with('success','Course updated successfully.');
        //     }
        //     $storeCourse = Course::create($course);
        //     return redirect()->route('manage.course')->with('success','Course added successfully.');
        // }
        // $data['course'] = Course::where('id',@$id)->first();
        return view('admin.modules.course.create_course')->with(@$data);
    }


    public function deleteCourse(Request $request , $id){
        $del = Course::where('id',$id)->first();
        if($del){
            Course::where('id',$id)->delete();
            return redirect()->back()->with('success','Course deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function viewCourse(Request $request , $id){
        $data['course'] = Course::where('id',$id)->first();
        if($data['course']){
            return view('admin.modules.course.course_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function assignTeacherCourse($id)
    {
        $data['course'] = Course::where('id',$id)->first();
        //$teacher = Admin::where('type','T')->get();

        $data['teacher_list'] = Admin::where('type','T')->get();

        $data['assign'] = CourseToTeacher::with('getTeacherToCourse')->get();
        //dd($teacher);
        return view('admin.modules.course.assign_teacher_to_course')->with($data);
    }

    public function storeCourseTeacher(Request $request)
    {
        $course = CourseToTeacher::create([
                    "teacher_id"=>$request->teacher_id,
                    "course_id"=>$request->course_id
        ]);
        if($course){
            return redirect()->back()->with('success','Course assign successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

}

