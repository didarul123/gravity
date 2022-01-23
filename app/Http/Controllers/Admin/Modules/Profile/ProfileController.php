<?php

namespace App\Http\Controllers\Admin\Modules\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;
use Storage;
class ProfileController extends Controller
{
    /**
    *   Method      : editProfile
    *   Description : This is use to editProfile page
    *   Author      : Pankaj
    *   Date        : 2020-Aug-29
    **/
    public function editProfile(Request $request){
    	$id = Auth::guard('admin')->user()->id;
    	$data['profile'] = Admin::where('id',$id)->first();
    	if($request->all()){
    		$update['name'] = $request->name;
    		//$update['mobile'] = $request->mobile;
    		$update['email'] = $request->email;
    		if(@$request->image){
	            $image = $request->image;
	            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
	            Storage::putFileAs('admin/profileImage', $image, $filename);
	            @unlink(storage_path('app/admin/profileImage/'.@$user->profile_picture));
	            $update['image'] = $filename;
	        }
	        if($request->password){
	        	if($request->password!=$request->cpassword){
	        		return redirect()->back()->with('error','Password & Confirm Password not matched.');
	        	}
	        	$update['password'] = \Hash::make($request->password);
	        }
	        $updateProfile = Admin::where('id',$id)->update(@$update);
	        if($updateProfile){
	        	return redirect()->back()->with('success','Profile updated Successfully.');
	        }

    	}
    	return view('admin.modules.profile.edit_profile')->with($data);
    }
}
