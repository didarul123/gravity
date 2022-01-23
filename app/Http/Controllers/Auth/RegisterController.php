<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use App\Mail\UserEmailVerifyMail;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Models\LevelOfEducation;
use App\Models\Course;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showRegistrationForm()
    {
        $data['level'] = Course::where(['parent_id'=>0])->orderBy('id','desc')->get();
        return view('auth.register')->with($data);
    }
    public function success(){
        return view('auth.success');
    } 
    public function error(){
        return view('auth.error');
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'mobile'   =>['required','min:8'],
            'level_of_education_id'     =>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function userEmailCheck(Request $request)
    {

     $user = User::where([
                  'email' => trim($request->email)
                ])
                  ->where('status', '!=', 'D')
                  ->first();

      if(@$user) {
          return response('false');
      } else {
          return response('true');
      }    

    }

     public function userMobileCheck(Request $request)
        {

     $user = User::where([
                  'mobile' => trim($request->mobile)
                ])
                  ->where('status', '!=', 'D')
                  ->first();

      if(@$user) {
          return response('false');
      } else {
          return response('true');
      }    

    }

    protected function create(array $data)
    {
        //dd($data);
        $creates =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'level_of_education_id' => $data['level_of_education_id'],
            'status' => 'U',
            'vcode' => mt_rand(10000,99999),

        ]);
        //dd($creates);
        
        Mail::send(new UserEmailVerifyMail($creates));
        return redirect()->route('user.success.msg')->with('success', 'Thanks for signing up! A verification link has been sent to your email, Please verify email to active your account.');
    }


    public function verifyEmail(Request $request, $vcode = null, $id = null){
      $user = User::where('vcode', $vcode)->where(\DB::raw('MD5(id)'), $id)->first();
      if (@$user->vcode != null && @$user->status == 'U'){                 
          $update['vcode'] = null;
          $update['status'] = 'A';
          $update['is_email_verify'] = 'Y';
          User::where('id', $user->id)->update($update);
          return redirect()->route('login')->with('success', 'Your email is verified successfully. Now you can Sign in with your email and password.');
      } 
      else{
          return redirect()->route('login')->with('error', 'Your verification link has been expired.');
      }
    }

    public function register(Request $request) {
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->create($request->all())));
      return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
    }
}



