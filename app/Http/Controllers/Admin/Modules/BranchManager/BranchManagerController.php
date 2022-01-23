<?php

namespace App\Http\Controllers\Admin\Modules\BranchManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\BranchManagerMailDetails;
use App\Admin;
use Storage;
use Mail;
use Hash;


class BranchManagerController extends Controller
{
    public function manageBranchManager(Request $request)
   {
   		$data['manager'] = Admin::where('type','B')->where('status','!=','D')->orderBy('created_at','desc');
        if ($request->all()) {
            if (@$request->keyword) {
                $data['manager'] = $data['manager']->where('name', 'like', '%' . $request->keyword . '%');
            }
            
            if (@$request->status) {
                $data['manager'] = $data['manager']->where('status', $request->status);
            }
        }
        $data['manager'] = $data['manager']->get();
        $data['key'] = $request->all();
   		return view('admin.modules.branch_manager.manage_branch_manager')->with($data);
   }


   public function createBranchManager(Request $request,$id=null){

        if($request->all()){
            $request->validate([
                'name'        => 'required',
                'email'   => 'required',
                //'mobile'   => 'required',
            ]);
            $manager['name'] = $request->name;
            $manager['email'] = $request->email;
            @$manager['description'] = $request->description;
        	$password = mt_rand(100000,999999);
            $manager['password'] = Hash::make($password);
            $manager['type'] = 'B';
            $manager['status']    = 'A';
        	if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('branch_manager_image', $image, $filename);
                @unlink(storage_path('app/branch_manager_image/'.@$user->profile_picture));
                $manager['image'] = $filename;
            }

            $email_check=Admin::where('email',$request->email)->where('id','!=',$request->id)->first();
            
            if(@$request->id){
                if(@$email_check)
                    {
                        return redirect()->back()->with('error','Email address already exists');
                    }
                $adminUpdate = Admin::where('id',$request->id)->update($manager);
                if($adminUpdate){
                        $details['name']=$request->name;
                        $details['email']=$request->email;
                        $details['password']=$password;
                        $details['type']= "update";
                        $this->BranchManagerMailDetails($details);
                    }
                return redirect()->route('manage.branch.manager')->with('success','Branch Manager updated successfully.');
            }
            $email_check=Admin::where('email',$request->email)->where('id','!=',$request->id)->first();
                if(@$email_check)
                {
                    return redirect()->back()->with('error','Email address already exists');
                }
            $storeManager = Admin::create($manager);
            if($storeManager){
                $details['name']=$request->name;
                $details['email']=$request->email;
                $details['password']=$password;
                $details['type']= "Create";
                $this->BranchManagerMailDetails($details);
            }
            return redirect()->route('manage.branch.manager')->with('success','Branch Manager added successfully.');
        }
        $data['manager'] = Admin::where('id',@$id)->first();
        return view('admin.modules.branch_manager.create_branch_manager')->with(@$data);
    }

    protected function BranchManagerMailDetails($details){
        Mail::send(new BranchManagerMailDetails($details));
    }


    public function deleteBranchManager(Request $request , $id){
        $delManager = Admin::where('id',$id)->first();
        if($delManager){
            Admin::where('id',$id)->update(['status'=>'D']);
            return redirect()->back()->with('success','Branch Manager deleted successfully.');
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }

     public function viewBranchManager(Request $request , $id){
        $data['manager'] = Admin::where('id',$id)->first();
        if($data['manager']){
            return view('admin.modules.branch_manager.branch_manager_details')->with($data);
        } else {
            return redirect()->back()->with('error','Somthing went be wrong.');
        }
    }


    public function branchManagerVerify($id)
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
        return redirect()->back()->with('success','Branch Manager updated Successfully.');
    }
}
