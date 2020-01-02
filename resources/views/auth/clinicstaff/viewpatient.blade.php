@extends('layouts.staffMain')

@section('content')

  <section class="wrapper">
        <h3>List of Outpatients</h3>
          <div class="row mb">
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th class="centered hidden-phone">Name</th>
                    <th class="centered hidden-phone">IC Number</th>
                    <th class="centered hidden-phone">Age</th>
                    <th class="centered hidden-phone">Address</th>
                    <th class="centered hidden-phone">Gender</th>
                    <th class="centered hidden-phone">Email</th>
                  </tr>
                </thead>

<!-- utk data muncul mcm kat database -->
                @foreach( $outpatients as $outpatient)
                <tbody>
                    <tr>
                        <td class="centered hidden-phone">{{ $outpatient->name }}</td>
                        <td class="centered hidden-phone">{{ $outpatient->icNumber }}</td>
                        <td class="centered hidden-phone">{{ $outpatient->age }}</td>
                        <td class="centered hidden-phone">{{ $outpatient->address }}</td>
                        <td class="centered hidden-phone">{{ $outpatient->gender }}</td>
                        <td class="centered hidden-phone">{{ $outpatient->email }}</td>
                        <td class="centered hidden-phone"> <form method="POST" action="{{route('outpatient.delete',$outpatient->outpatientId)}}">
                            @csrf
                            @method('DELETE')
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