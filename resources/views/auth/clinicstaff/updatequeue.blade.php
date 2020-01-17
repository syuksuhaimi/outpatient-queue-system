@extends('layouts.staffMain')

@section('content')

<section class="wrapper site-min-height">
  <h3><i class="fa fa-hospital-o"></i><b> Klinik Kesihatan Kamunting</b></h3>
  <hr>
    <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4 class="mb">Update Queue</h4>
              <form class="form-horizontal  style-form" method="post" action="{{ route('queue.update', $queue->queueId) }}">
                @csrf
                @method('PUT') 
                <div class="form-group">
                  <label class="control-label col-md-3">Room</label>
                  <div class="col-md-7">
                    <select class="form-control" name="room" data-placeholder="room">
                                    <option></option>
                                    
                                    <option>Room 1</option>
                                    <option>Room 2</option>
                                    <option>Room 3</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-10">
                      <button class="btn btn-theme" onclick="submit()">Update Change</button>
                    </div>
                </div>

              </form>
            </div>
          </div>
        </div>

@endsection