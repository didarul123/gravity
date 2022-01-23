<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectTo = '/admin';
    public function __construct()
    {
        $this->middleware('admin.guest:admin');
    }

    public function showResetForm(Request $request, $token = null)
    {
        $chkTocken = Admin::where('admin_password_resets',@$token)->first();
        if(!@$chkTocken){
            return redirect()->route('admin.error.msg')->with('error', 'This link has been expired.');
        }
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $chkTocken->email]
        );
    }

    public function reset(Request $request)
    {
        if($request->password == $request->confirm_password && $request->password){
            $admin_password_resets = $request->id;
            $update['password'] = Hash::make($request->password);
            $update['admin_password_resets'] = null;
            $admin = Admin::Where('admin_password_resets',$admin_password_resets)->update($update);
            if($admin) {
                return redirect()->route('admin.success.msg')->with('success','Password changed successfully !!');
            } else {
                return redirect()->back()->with('error','Somthing went be wrong');
            }
        } else {
            return redirect()->back()->with('error','Password and Confirm Password not matched');
        }
    }

    
    public function broker()
    {
        return Password::broker('admins');
    }

    
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
