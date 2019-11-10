@extends('layouts.staffMain')

@section('content')

    <section class="wrapper site-min-height">
    <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <h3>Your Personal Information</h3>
                <hr>

                <ul class="pricing">
                    <li>Staff Name: {{ $clinicstaff->staffName }}</li>
                    <li>Phone Number: {{ $clinicstaff->phone }}</li>
                    <li>Gender: {{ $clinicstaff->gender }}</li>
                    <li>E-mail Address: {{ $clinicstaff->email }}</li>
                </ul>
                <a class= "btn btn-theme" href="{{ route('editClinicStaff', Auth::guard('clinicstaff')->user()->staffId)}}"> 
                <span>Update</span> </a>
              </div>

@endsection