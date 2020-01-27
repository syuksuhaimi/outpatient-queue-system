<?php

namespace App\Http\Controllers;

use App\ClinicStaff;
use App\Http\Requests\UpdateStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        return $request->get;
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function showClinicStaff($id)
   {
        $clinicstaff= ClinicStaff::where('staffId', $id)->first();

        return view('auth.clinicstaff.view', compact('clinicstaff'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $clinicstaff = ClinicStaff::where('staffId', $id)->first();

        if ($clinicstaff->staffId == Auth::user()->staffId) {
            return view('auth.clinicstaff.update', compact('clinicstaff'));
        } else {
            return redirect('/clinicstaff/home');
        }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function updateClinicStaff(UpdateStaff $request, $id)
   {
    $clinicstaff = ClinicStaff::where('staffId', $id)->first();

    if ($clinicstaff){

        if (trim($request->password) == null){

            $input = $request->except('password');

            $clinicstaff->update(['staffName'=>$input['staffName'],
                            'phone'=>$input['phone'], 'gender'=>$input['gender'],
                            'position'=>$input['position'], 'email'=>$input['email']]);

            Session::flash('update_profile','Update profile successfully');

            return redirect('/clinicstaff/home');

        } else {

            $input = $request->all();

            $input['password'] = Hash::make($input['password']);

            $clinicstaff->update(['staffName'=>$input['staffName'],
                        'phone'=>$input['phone'], 'gender'=>$input['gender'],
                        'position'=>$input['position'], 'email'=>$input['email'],'password'=>$input['password']]);

            Session::flash('update_profile','Update profile successfully');

            return redirect('/clinicstaff/home');

        }


    } else {
        return redirect('/clinicstaff/home');
    }

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       //
   }
}
