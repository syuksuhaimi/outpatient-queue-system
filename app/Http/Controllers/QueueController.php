<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.outpatient.createqueue');
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
    public function createQueue(Request $request)
    {
        $queue=Queue::create([
            'qType' => $request->qType,
            // 'room' => $request->room,
            'outpatientId' => Auth::guard('outpatient')->user()->outpatientId,
            // 'staffId' => Auth::guard('staff')->user()->staffId,
        ]);


        $request->session()->flash('queue_qType', $queue->qType);
        $request->session()->flash('queueId', $queue->queueId);

        return redirect()->route('createQueue');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQueue()
    {
        //
        return view('auth.clinicstaff.viewqueue')->with('queues', Queue::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $queue = Queue::where('queueId', $id)->first();

        return view('auth.clinicstaff.updatequeue', compact('queue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQueue(Request $request, $id)
    {
        // $queue = Queue::where('queueId', $id)->first();
        
        // if ($queue){
            
        //     $input = $request->validate([
        //         'room'=>'required'
        //     ]);

        //     //return dd($input['room']);

        //     $queue->update([
        //         'room'=>$input['room']
        //     ]);
        // }

        // return redirect('/clinicstaff/viewqueue')->with('success', 'queue details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyQueue($id)
    {
        $queue = Queue::where('queueId',$id)->first();

        if($queue){
            $queue->delete();

            return redirect('/clinicstaff/viewqueue')->with('success', 'queue details deleted');
        }
        else {

            return redirect('/clinicstaff/viewqueue')->with('success','queue details deleted');

        }

    }
}
