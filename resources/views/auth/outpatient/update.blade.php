@extends('layouts.outMain')

@section('content')
<section class="wrapper">
        <h3>Outpatient Form</h3>
        <hr>

        <div class="row mt">
          <div class="col-lg-12">

            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ route('updateOutpatient', $outpatient->outpatientId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                  <div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Full Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ $outpatient->name }}" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="icNumber" class="control-label col-lg-2">IC Number</label>
                    <div class="col-lg-10">
                      <input class=" form-control @error('icNumber') is-invalid @enderror" id="icNumber" name="icNumber" type="text" value="{{ $outpatient->icNumber }}"/>
                        @error('icNumber')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="age" class="control-label col-lg-2">Age</label>
                    <div class="col-lg-10">
                      <input class="form-control @error('age') is-invalid @enderror" id="age" name="age" type="text" value="{{ $outpatient->age }}" />
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="address" class="control-label col-lg-2">Address</label>
                    <div class="col-lg-10">
                      <input class="form-control @error('address') is-invalid @enderror" id="address" name="address" type="text" value="{{ $outpatient->address }}"/>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="gender" class="control-label col-lg-2">Gender</label>
                    <div class="col-lg-10">
                      <select class="form-control" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                              <option></option>
                              <option>Male</option>
                              <option>Female</option>
                      </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                                  
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ $outpatient->email }}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="password" class="control-label col-lg-2">Password</label>
                    <div class="col-lg-10">
                      <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" value="{{ $outpatient->password }}"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password-confirm" class="control-label col-lg-2">Confirm Password</label>
                      <div class="col-lg-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Update</button>
                      <button class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

</section>
@endsection

