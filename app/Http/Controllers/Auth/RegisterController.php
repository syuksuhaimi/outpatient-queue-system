<?php

namespace App\Http\Controllers\Auth;

use App\ClinicStaff;
use App\Outpatient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:outpatient'); //guest or kena tukar
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegisterClinicStaff()
    {
        return view('auth.clinicstaff.register');

    }
    public function showRegisterOutpatient()
    {
        return view('auth.outpatient.register');
    }


    public function registerClinicStaff(Request $request)
    {
        //for validation
        $input = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'email' => 'required|unique:clinicStaffs,email',
            'password' => 'required|confirmed',
        ]);

        //utk masuk db
        $clinicstaff = ClinicStaff::create([
            'staffName' => $input['name'],
            'phone' => $input['phone'],
            'gender' => $input['gender'],
            'position' => $input['position'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // redirect balik ke page tu
        return redirect()->intended('clinicstaff/login');
    }

    public function registerOutpatient(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'ic' => 'required|min:12',
            'age' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:outpatients,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $outpatient = Outpatient::create([
            'name' => $input['name'],
            'icNumber' => $input['ic'],
            'age' => $input['age'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return redirect()->intended('outpatient/login');
    }


}
