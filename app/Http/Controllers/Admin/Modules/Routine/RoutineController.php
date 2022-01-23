<?php

namespace App\Http\Controllers\Admin\Modules\Routine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Routine;
use App\Models\Course;
use Storage;

class RoutineController extends Controller
{
   public function manageRoutine(Request $request)
   {
   	//dd("fdd");
   		$data['routine'] = Routine::orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['routine'] = $data['routine']->where('title', 'like', '%' . $request->keyword . '%');
            }
            
            // if (@$request->status) {
            //     $data['program'] = $data['program']->where('status', $request->status);
            // }
        } 
        $data['routine'] = $data['routine']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.routine.manage_routine')->with($data);
   }


   public function createRoutine(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'title'        => 'required',
                'pdf'   => 'required'
            ]);
            $program['title'] = $request->title;
            $program['course_id'] = $request->course_id;
          
          if(@$request->pdf){
                $image = $request->pdf;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('routine', $image, $filename);
                @unlink(storage_path('app/routine/'.@$request->pdf));
                $program['pdf'] = $filename;
            }

            if(@$request->ID){
                Routine::where('id',$request->ID)->update($routine);
                return redirect()->route('manage.routine')->with('success','Routine updated successfully.');
            }
            Routine::create($program);
            return redirect()->route('manage.routine')->with('success','Routine added successfully.');
        }
        $data['routine'] = Routine::where('id',@$id)->first();
        $data['course_list']   = Course::where('parent_id', '!=', 0)->get();
        // $data['course_list']   = Course::get();
        return view('admin.modules.routine.create_routine')->with(@$data);
    }

    public function deleteRoutine($id=null){
        if($id){
            Routine::where('id',$id)->delete();
            return redirect()->back()->with('success','Routine deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

}
