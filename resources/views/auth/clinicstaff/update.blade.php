@extends('layouts.staffMain')

@section('content')
<section class="wrapper">
        <h3><b>Staff Form</b></h3>
        <hr>

        <div class="row mt">
          <div class="col-lg-12">

            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ route('updateClinicStaff', $clinicstaff->staffId) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                  <div class="form-group ">
                    <label for="staffName" class="control-label col-lg-2">Staff Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control @error('staffName') is-invalid @enderror" id="staffName" name="staffName" type="text" value="{{ $clinicstaff->staffName }}" />
                        @error('staffName')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <div class="form-group ">
                    <label for="phone" class="control-label col-lg-2">Phone</label>
                    <div class="col-lg-10">
                      <input class=" form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" value="{{ $clinicstaff->phone }}"/>
                        @error('phone')
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
                    <label for="position" class="control-label col-lg-2">Position</label>
                    <div class="col-lg-10">
                    <select class="form-control" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus>
                              <option></option>
                              <option>Doctor</option>
                              <option>Nurse</option>
                      </select>
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ $clinicstaff->email }}" />
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
                      <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" value="{{ $clinicstaff->password }}"/>
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

