<?php

namespace App\Http\Controllers;

use App\Outpatient;
use App\Http\Requests\UpdateOutpatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OutpatientController extends Controller
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
   public function showOutpatient($id)
   {
       //return dd($outpatient= outpatients::where('outpatientId', $id)->first());
       $outpatient= Outpatient::where('outpatientId', $id)->first();

       return view('auth.outpatient.view', compact('outpatient'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
        $outpatient = Outpatient::where('outpatientId', $id)->first();

        if ($outpatient->outpatientId == Auth::user()->outpatientId) {
            return view('auth.outpatient.update', compact('outpatient'));
        } else {
            return redirect('/outpatient/home');
        }

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function updateOutpatient(UpdateOutpatient $request, $id)
   {
        $outpatient = Outpatient::where('outpatientId', $id)->first();

        if ($outpatient){

            if (trim($request->password) == null){

                $input = $request->except('password');

                $outpatient->update(['name'=>$input['name'],
                                'icNumber'=>$input['icNumber'], 'age'=>$input['age'],
                                'gender'=>$input['gender'], 'address'=>$input['address'],
                                'email'=>$input['email']]);

                Session::flash('update_profile','Update profile successfully');

                return redirect('/outpatient/home');

            } else {

                $input = $request->all();

                $input['password'] = Hash::make($input['password']);

                $outpatient->update(['name'=>$input['name'],
                                'icNumber'=>$input['icNumber'], 'age'=>$input['age'],
                                'gender'=>$input['gender'], 'address'=>$input['address'],
                                'email'=>$input['email'],'password'=>$input['password']]);

                Session::flash('update_profile','Update profile successfully');

                return redirect('/outpatient/home');

            }


        } else {
            return redirect('/outpatient/home');
        }

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroyOutpatient($id)
   {
        $outpatient = Outpatient::where('outpatientId',$id)->first();
        
        if($outpatient){
        $outpatient->delete();

            return redirect('/clinicstaff/viewpatient')->with('success', 'outpatient details deleted');
        }
        else{

            return redirect('/clinicstaff/viewqueue')->with('success','queue details deleted');
            
        }
   }

//utk viewpatient.blade.php
   public function view()
   {
       //
       return view('auth.clinicstaff.viewpatient')->with('outpatients', Outpatient::all());
   }

}
