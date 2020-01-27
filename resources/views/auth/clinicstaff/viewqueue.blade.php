@extends('layouts.staffMain')

@section('content')

  <section class="wrapper">
        <h3><b>List of Queues</b></h3>
        <hr>
          <div class="row mb">
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th class="centered hidden-phone">Queue Number</th>
                    <th class="centered hidden-phone">Queue Type</th>
                    <th class="centered hidden-phone">Outpatient Name</th>
                    <th class="centered hidden-phone">Room</th>
                    <th class="centered hidden-phone"></th>
                  </tr>
                </thead>

                @foreach( $queues as $queue)
                <tbody>
                    <tr>
                        <td class="centered hidden-phone">{{ $queue->queueId }}</td>
                        <td class="centered hidden-phone">{{ $queue->qType }}</td>
                        <td class="centered hidden-phone">{{ $queue->outpatient->name }}</td>
                        <td class="centered hidden-phone">{{ $queue->call ? $queue->call->room : 'No room yet' }}</td>
                        <td class="centered hidden-phone"> <form method="POST" action="{{ route('queue.delete', $queue->queueId) }}">
                            @csrf
                            @method('DELETE')
                            
                            <a class="btn btn-success btn-xs" href="{{ route('call.create', $queue->queueId) }}"><i class="fa fa-check"></i></a>
                            
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                            </form>
                        </td> 
                    </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
          </div>
  </section>
@endsection

@section('script')
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <script type="text/javascript"></script>
@endsection