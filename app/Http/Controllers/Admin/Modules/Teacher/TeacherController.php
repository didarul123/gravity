<?php

namespace App\Http\Controllers\Admin\Modules\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TeacherMailDetails;
use App\Admin;
use Storage;
use Mail;
use Hash;

class TeacherController extends Controller
{
   public function manageTeacher(Request $request)
   {
   		$data['teacher'] = Admin::where('type','T')->where('status','!=','D')->orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['teacher'] = $data['teacher']->where('name', 'like', '%' . $request->keyword . '%');
            }
            
            if (@$request->status) {
                $data['teacher'] = $data['teacher']->where('status', $request->status);
            }
        }
        $data['teacher'] = $data['teacher']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.teacher.manage_teacher')->with($data);
   }


   public function createTeacher(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'name'        => 'required',
                'email'   => 'required',
                //'mobile'   => 'required',
            ]);
            $teacher['name'] = $request->name;
            $teacher['email'] = $request->email;
            //$teacher['mobile'] = $request->mobile;
            $password = mt_rand(100000,999999);
            $teacher['password'] = Hash::make($password);
            $teacher['type'] = 'T';
            $teacher['status']    = 'A';
        	
        	if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('teacher_image', $image, $filename);
                @unlink(storage_path('app/teacher_image/'.@$user->profile_picture));
                $teacher['image'] = $filename;
            }
            $email_check=Admin::where('email',$request->email)->where('id','!=',$request->id)->first();
            
                if(@$request->id){
                    if(@$email_check)
                    {
                        return redirect()->back()->with('error','Email address already exists');
                    }
                    $adminUpdate = Admin::where('id',$request->id)->update($teacher);
                    if($adminUpdate){
                        $details['name']=$request->name;
                        $details['email']=$request->email;
                        $details['password']=$password;
                        $details['type']= "update";
                        $this->TeacherMailDetails($details);
                    }
                    return redirect()->route('manage.teacher')->with('success','Teacher updated successfully.');
                }
                
            
            $teacher['status'] = 'A';
            $teacher['type'] = 'T';
            $email_check=Admin::where('email',$request->email)->where('id','!=',$request->id)->first();
                if(@$email_check)
                {
                    return redirect()->back()->with('error','Email address already exists');
                }
            $storeTeacher = Admin::create($teacher);
            if($storeTeacher){
            $details['name']=$request->name;
            $details['email']=$request->email;
            $details['password']=$password;
            $details['type']= "Create";
            $this->TeacherMailDetails($details);
            }
            return redirect()->route('manage.teacher')->with('success','Teacher added successfully.');
        }
        $data['teacher'] = Admin::where('id',@$id)->first();
        return view('admin.modules.teacher.create_teacher')->with(@$data);
    }


    protected function TeacherMailDetails($details){
        Mail::send(new TeacherMailDetails($details));
    }




    public function deleteTeacher(Request $request , $id){
        $delTeacher = Admin::where('id',$id)->first();
        if($delTeacher){
            Admin::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Teacher deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

     public function viewTeacher(Request $request , $id){
        $data['teacher'] = Admin::where('id',$id)->first();
        if($data['teacher']){
            return view('admin.modules.teacher.teacher_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

    public function chkEmailExist(Request $request)
    {   
        if(@$request->email){
            if(@$request->id){
                $user = Admin::where(['email' => trim($request->email)])->where('status', '!=', 'D')->where('id','!=',$request->id)->first();
            } else {
                $user = Admin::where(['email' => trim($request->email)])->where('status', '!=', 'D')->first();
            }
            if(@$user) {
                return response('false');
            } else {
                return response('true');
            }  
        }        
    }

     public function changeStatus(Request $request , $id){
        $admin = Admin::where('id',$id)->first();
        if(!$admin){
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
        if($admin->status=='A') {
            $update_status['status'] = 'I';
        }           
        if($admin->status=='I') {
            $update_status['status'] = 'A';
        }
        $admin->update($update_status);
        return redirect()->back()->with('success','admin status changed successfully.');
    }


    public function teacherVerify($id)
    {
        $users = Admin::whereIn('is_verified', ['Y','N'])->find($id);
        if($users->is_verified == 'N')
        {
            $update['is_verified'] = 'Y';
        }
        if($users->is_verified == 'Y')
        {
            $update['is_verified'] = 'N';
        }
 
        $users->update($update);
        return redirect()->back()->with('success','Teacher updated Successfully.');
    }

}
