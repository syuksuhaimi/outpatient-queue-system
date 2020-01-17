<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outpatient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homeClinicStaff() {
        //return view('auth.clinicstaff.home');
        return view('auth.clinicstaff.home')->with('outpatients', Outpatient::all());
    }

    public function homeOutpatient() {
        return view('auth.outpatient.home');
    }

}
