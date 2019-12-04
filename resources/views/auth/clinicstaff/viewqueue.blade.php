@extends('layouts.staffMain')

@section('content')

  <section class="wrapper">
        <h3>List of Queues</h3>
          <div class="row mb">
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th class="centered hidden-phone">Queue Number</th>
                    <th class="centered hidden-phone">Queue Type</th>
                    <th class="centered hidden-phone">Room</th>
                    <th class="centered hidden-phone">Time</th>
                    <th class="centered hidden-phone"></th>
                  </tr>
                </thead>

                @foreach( $queues ->reverse() as $queue)
                <tbody>
                    <tr>
                        <td class="centered hidden-phone">{{ $queue->queueId }}</td>
                        <td class="centered hidden-phone">{{ $queue->qType }}</td>
                        <td class="centered hidden-phone">{{ $queue->room }}</td>
                        <td class="centered hidden-phone">{{ $queue->qTime }}</td>
                        <td class="centered hidden-phone"> <form method="POST" action="{{ route('queue.delete', $queue->queueId) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-xs" href="{{ route('queue.edit', $queue->queueId) }}"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                        </td>
                        </form>
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
  <script type="text/javascript">
  //     $(document).ready(function() {
  //       var table = $('#datatable').DataTable();
  //       table.on('click', '.edit', function(){
  //         $tr = $(this).closest('tr');
  //         if ($($tr).hasClass('child')){
  //             $tr = $tr.prev('.parent');
  //         }

  //         var data = table.row($tr).data();
  //         console.log(data);
  //         $('#room').val(data[1]);

  //         $('#editForm').attr('action', '/clinicstaff/queue/'+data[0]);
  //         $('#editModal').modal('show');
  //       });
  // </script>
@endsection