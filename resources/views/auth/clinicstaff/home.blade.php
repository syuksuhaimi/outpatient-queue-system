@extends('layouts.staffMain')

@section('content')
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-hospital-o"></i><b> Klinik Kesihatan Kamunting</b></h3>
        <hr>
        <div class="row mt">
          <div class="col-lg-12">
            <img src="../../template/img/kkk.png" class="img-fluid" alt="Responsive image" style="width:1650px; height:350px;">
          </div>
        </div>

      <h3><b>List of Outpatients</b></h3>
      <hr>
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
                @foreach( $outpatients as $outpatient)
                <tbody>
                  <tr>
                    <td class="centered hidden-phone">{{ $outpatient->name }}</td>
                    <td class="centered hidden-phone">{{ $outpatient->icNumber }}</td>
                    <td class="centered hidden-phone">{{ $outpatient->age }}</td>
                    <td class="centered hidden-phone">{{ $outpatient->address }}</td>
                    <td class="centered hidden-phone">{{ $outpatient->gender }}</td>
                    <td class="centered hidden-phone">{{ $outpatient->email }}</td>
                    </tr>
                </tbody>
                @endforeach
              </table>
            </div>
        </div>
      </div>
      </section>
@endsection