<?php

namespace App\Http\Controllers\Modules\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Storage;

class ProfileController extends Controller
{
    

    public function editProfile()
    {

    	$data['user'] = User::find(Auth::User()->id);
      //dd($data);
    	return view('modules.profile.edit_user_profile')->with($data);
    }


    public function updateProfile(Request $request)
    {
    	$user = User::find(Auth::User()->id);

    	//dd($request->all());


        $this->validate($request, [ 
          'name'  =>'required',
          'email'   =>'required', 
          'class'     =>'required',
          'dob'       =>'required',
          'father_name'=>'required',
          'address'=>'required',
          'college_school'=>'required',
          'past_academic_result'=>'required',
          'branch'=>'required',
          'how_to_read'=>'required',
          'guardian_info'  =>'required',
           
        ]);
      //dd($request->all());
        $input['name']    = $request->name;
        $input['email']    = $request->email; 
        $input['class']    = $request->class;
        $input['course']    = $request->course;
        $input['mobile']    = $request->mobile;
        $input['dob']    = $request->dob;
        $input['father_name']    = $request->father_name;
        $input['address']    = $request->address;
        $input['college_school']    = $request->college_school;
        $input['past_academic_result']    = $request->past_academic_result;
        $input['branch']    = $request->branch;
        $input['how_to_read']    = $request->how_to_read;
        $input['guardian_info']    = $request->guardian_info;

        //dd($input);
        if(@$request->image){
                $image = $request->image;
                $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('profileImage', $image, $filename);
                @unlink(storage_path('app/profileImage/'.@$user->profile_picture));
                $input['image'] = $filename;
            }

        User::where('id',$user->id)->update($input);

         if (!empty($request->old_password) && !empty($user)) {

          if (\Hash::check($request->old_password, $user->password)) {
            $password = \Hash::make($request->password);
            User::where('id', $user->id)->update(['password' => $password]);
          }else {
              
            return redirect()->back()->with('error', 'Current  password does not match please try again!');
          }
        }

    	return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function emailChecking(Request $request)
    {
    // dd($request);
  $user=User::where('email',$request->email)->where('status', '!=', 'D')->where('id','!=',Auth::User()->id)->first();
    // if($user){
    //   $u = User::where([
    //     'id' => $BInfo->user_id
    //   ])
        
    //     ->where('status', '!=', 'D')
    //     ->first();
    // }
      if(@$user) {
          return response('false');
      } else {
          return response('true');
      }    

    }
}
