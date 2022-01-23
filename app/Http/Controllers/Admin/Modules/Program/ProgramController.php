<?php

namespace App\Http\Controllers\Admin\Modules\Program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Storage;

class ProgramController extends Controller
{
    public function manageProgram(Request $request)
   {
   		$data['program'] = Program::where('status','!=','D')->orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['program'] = $data['program']->where('name', 'like', '%' . $request->keyword . '%');
            }
            
            if (@$request->status) {
                $data['program'] = $data['program']->where('status', $request->status);
            }
        }
        $data['program'] = $data['program']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.program.manage_program')->with($data);
   }


   public function createProgram(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'name'        => 'required',
                'description'   => 'required',
                'image'   => 'required'
            ]);
            $program['name'] = $request->name;
            $program['description'] = $request->description;
            $program['status']='A';
        	
        	if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('program', $image, $filename);
                @unlink(storage_path('app/program/'.@$request->image));
                $program['image'] = $filename;
            }

            if(@$request->ID){
                Program::where('id',$request->ID)->update($program);
                return redirect()->route('manage.program')->with('success','Program updated successfully.');
            }
            $storeManager = Program::create($program);
            return redirect()->route('manage.program')->with('success','Program added successfully.');
        }
        $data['program'] = Program::where('id',@$id)->first();
        return view('admin.modules.program.create_program')->with(@$data);
    }


    public function deleteProgram(Request $request , $id){
        $del = Program::where('id',$id)->first();
        if($del){
            program::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Program deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

     public function viewProgram(Request $request , $id){
        $data['program'] = Program::where('id',$id)->first();
        if($data['program']){
            return view('admin.modules.program.program_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }
}
