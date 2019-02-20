<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'user_name';
    }
 
    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return('/admin');
        }
        elseif (Auth::check() && Auth::user()->role == 'admission') {
            return('/admission');
        }
        elseif (Auth::check() && Auth::user()->role == 'exam') {
            return('/exam');
        }
        elseif (Auth::check() && Auth::user()->role == 'placement') {
            return('/placement');
        }
        elseif (Auth::check() && Auth::user()->role == 'student') {
            return('/student');
        }
        else {
            return redirect('/home');
        }
    }

}
