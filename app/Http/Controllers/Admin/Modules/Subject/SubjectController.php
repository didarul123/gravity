<?php

namespace App\Http\Controllers\Admin\Modules\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseToTeacher;
use App\Models\CourseClass;
use App\Models\Subject;
use Storage;
use DB;
use Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['subject'] = Subject::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['subject'] = $data['subject']->where('name', 'like', '%' . $request->keyword . '%');
            }
        }
        $data['subject'] = $data['subject']->get();
        $data['key'] = $request->all();
        return view('admin.modules.subject.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.modules.subject.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id'        => 'required',
            // 'class_id'        => 'required',
            'name'        => 'required|unique:subjects',
            'description'        => 'required',
        ]);

        $subject = new Subject();
        $subject->course_id = $request->course_id;
        // $subject->class_id = $request->class_id;
        $subject->name = $request->name;
        $subject->slug = str::slug($request->name);
        $subject->description = $request->description;
        $subject->status = $request->status;
        if(@$request->image){
            $image = $request->image;
            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('subject', $image, $filename);
            // @unlink(storage_path('app/subject/'.@$request->image));
            $subject->image = $filename;  
        }
        $subject->save();
        return redirect()->back()->with('success','Subject added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        $courses = Course::get();
        $classes = CourseClass::where('status', 1)->where('course_id', $subject->course_id)->get();
        return view('admin.modules.subject.edit', compact('courses', 'subject', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->course_id = $request->course_id;
        // $subject->class_id = $request->class_id;
        $subject->name = $request->name;
        $subject->slug = str::slug($request->name);
        $subject->description = $request->description;
        $subject->status = $request->status;
        if(@$request->image){
            $image = $request->image;
            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('subject', $image, $filename);
            @unlink(storage_path('app/subject/'.@$request->image));
            $subject->image = $filename;  
        }
        $subject->save();
        return redirect()->back()->with('success','Subject Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Subject::where('id',$id)->first();
        if($del){
            @unlink(storage_path('app/subject/'.@$del->image));
            Subject::where('id',$id)->delete();
            return redirect()->back()->with('success','Class deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function getClass(Request $request, $course_id)
    {
        $classes = CourseClass::where('course_id', $request->course_id)->where('status', 1)->get();
        return view('admin.modules.subject.get_class', compact('classes'));
    }
}
