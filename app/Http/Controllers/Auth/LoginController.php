<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //changes

    public function showUserLoginForm()
    {     
      return view('auth.login');
    }



    public function userMobileCheck(Request $request)
    {

     $user = User::where([
                  'mobile' => trim($request->mobile)
                ])
                  ->where('status', '!=', 'D')
                  ->first();

      if(@$user){
          return response('false');
        }else{
          return response('true');
        }    
    }


    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    protected function credentials(Request $request)
    {
   
        $credentials = $request->only($this->username(), 'password');
        $credentials['status'] = ['A'];
        return $credentials;
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        // dd($request->all());
        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);
        $errors = [$this->username() => trans('auth.failed')];
        $user = \App\User::where($this->username(), $request->{$this->username()})
                            ->where('status', '!=', 'D')
                            ->first();
        // dd($user);
        if ($user && \Hash::check($request->password, $user->password) && $user->status == 'I') {
            $errors = [$this->username() => "Your Accout is not Active."];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        // dd($errors);
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function username()
    {
        return 'mobile';
    }
    
    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login');
    }


}
