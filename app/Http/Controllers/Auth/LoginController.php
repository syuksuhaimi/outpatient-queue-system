<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:clinicstaff')->except('logout'); // bila dah login tak boleh pergi page ni
        $this->middleware('guest:outpatient')->except('logout');
    }

    public function outpatientShowLogin()
    {
        return view('auth.outpatient.login');
    }

    public function clinicstaffShowLogin()
    {
        return view('auth.clinicstaff.login');
    }

    public function clinicstaffLogin(Request $request)
    {
        // return dd($request->all()); // nak tgk semua data

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('clinicstaff')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/clinicstaff/home');
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

    public function outpatientLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('outpatient')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/outpatient/home');
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }

}