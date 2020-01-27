<?php

namespace App\Http\Controllers;

use App\Call;
use App\Outpatient;
use App\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = DB::table('call')
            ->join('queue','queue.queueId','=','call.queueId')
            ->select('call.id','call.queueId','call.room','queue.qType','queue.outpatientId')
            ->where('call.id','=',$id)
            ->orderBy('call.id','desc')
            ->get();

            return view('auth.call.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCall(Request $request, $id)
    {
        $queue = Queue::where('queueId',$id)->first();
        return view('auth.call.create',compact('queue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCall(Request $request, $id)
    {
        //assign room and store kat database
        $input = $request->validate([
            'room'=>'required|string',
        ]);

        $call = Call::create([
            'room'=> $input['room'],
            'queueId'=> $id,
            'staffId' => Auth::guard('clinicstaff')->user()->staffId,

        ]);

        return redirect('/clinicstaff/display');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function showCall()
    {
        return view('auth.call.view')->with('calls', Call::latest()->paginate(4));
        
    }

    public function displayCall()
    {
        return view('auth.call.display')->with('calls', Call::latest()->paginate(4));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        //
    }
}
