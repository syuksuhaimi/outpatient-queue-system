@extends('layouts.outMain')

@section('content')

    <section class="wrapper site-min-height">
    <h3><i class="fa fa-hospital-o"></i><b> Klinik Kesihatan Kamunting</b></h3>
    <hr>

    <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <h3><b>Your Personal Information</b></h3>
                <hr>

                <ul class="pricing">
                    <li>Outpatient Name: {{ $outpatient->name }}</li>
                    <li>IC Number: {{ $outpatient->icNumber }}</li>
                    <li>Age: {{ $outpatient->age }}</li>
                    <li>Address: {{ $outpatient->address }}</li>
                    <li>Gender: {{ $outpatient->gender }}</li>
                    <li>E-mail Address: {{ $outpatient->email }}</li>
                </ul>
                <a class= "btn btn-theme" href="{{ route('editOutpatient', Auth::guard('outpatient')->user()->outpatientId)}}"> 
                <span>Update</span> </a>
              </div>
            </div>
          </div>
    </div>
    </section>  
@endsection
