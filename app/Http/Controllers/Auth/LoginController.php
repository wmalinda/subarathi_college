<?php

namespace App\Http\Controllers\Auth;

use App\Modules\User\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if(Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])){
            return redirect()->intended('admin/dashboard');
        }

        $this->sendFailedLoginResponse($request);
        return redirect()->intended('log-in');
    }

    public function logout(Request $request){
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
