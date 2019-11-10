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

                @foreach($queues as $queue)
                <tbody>
                    <tr>
                        <td class="centered hidden-phone">{{ $queue->queueId }}</td>
                        <td class="centered hidden-phone">{{ $queue->qType }}</td>
                        <td><form method="post" action="{{ route('queue.store') }}">
                            @csrf
                            <select class="form-control" name="room">
                                    <option></option>
                                    <option>Room 1</option>
                                    <option>Room 2</option>
                                    <option>Room 3</option>
                            </select>
                            </form>
                        </td>
                        <td class="centered hidden-phone">{{ $queue->qTime }}</td>
                        <td class="centered hidden-phone">
                            <button type="button" class="btn btn-theme02" href=""><i class="fa fa-check"></i>Call</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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
  <!-- <script type="text/javascript">
      $(document).ready(function() {
        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');

        // $('#hidden-table-info thead tr').each(function() {
        // this.insertBefore(nCloneTh, this.childNodes[0]);
        // });

        // $('#hidden-table-info tbody tr').each(function() {
        // this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        // });
      });
  </script> -->
@endsection