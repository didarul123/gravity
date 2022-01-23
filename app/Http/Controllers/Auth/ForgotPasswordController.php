<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Mail\UserResetPassword;
use App\User;
use Mail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //changes

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
         
        
        // dd($request->all());
        $data['email'] = $request->email;
        $user = User::where('email',$request->email)->first();
        if(!@$user){
            return redirect()->back()->with('error','No record found.');
        }
        $vcode = rand();
        User::where('email',$request->email)->update(['user_password_resets'=>$vcode]);
        $data['link'] = route('password.reset',[$vcode]);
        $data['name'] = $user->name;
        $data['mailBody'] = 'forgotpassword';
        Mail::send(new UserResetPassword($data));
        return redirect()->back()->with('success','Password reset link send your email.');
    }
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }


}
