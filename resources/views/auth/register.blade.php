@extends('layouts.app')
@section('content')
<style type="text/css">
    .navbar-light .navbar-brand{
        color: #872166;
        font-weight: 800;
        font-size: 30px;
        padding: 0;
    }
    div#collapsibleNavbar{
        margin-top: 0;
    }
    header .header-wrapper{
        box-shadow: 0 5px 10px 0 rgba(79,36,85,.15)
    }
    .navbar-light .navbar-nav .nav-link{
        color: #872166;
        font-weight: 600;
    }
.form-group{
      position: relative;
    }
    .form-group ion-icon{
      position: absolute;
      bottom: 0;
      padding: 8px;
      right: 0;
      cursor: pointer;
    }
</style>
<style type="text/css">
  .owl-theme .owl-nav{
    display: none;
  }
</style>
<section>
<div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="signup-style">Create a new account</div>
          <div class="panel-body">
            <form class="form-horizontal" action="{{ route('register') }}" id="register"  method="POST">
              @csrf
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name" class="control-label">First Name</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required="">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="last_name" class="control-label">Last Name</label>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required="">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="row loginstyle">
               <div class="col-md-12">
                  <div class="form-group">
                    <label for="pop_signup_email" class="control-label">Email</label>
                    <input id="pop_signup_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="">
                        <ion-icon name="eye-off" class="show-password"></ion-icon>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password_confirmation" class="control-label">Repeat Password</label>
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required="">
                        <ion-icon name="eye-off" class="show-password"></ion-icon>
                    
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pop_signup_password" class="control-label">Phone</label>
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" required="">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address" class="control-label">Address</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required="">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="country" class="control-label">Country</label>
                    <select class="form-control @error('phone') is-invalid @enderror" id="country" required="" name="country">   
                    <option value="">Select Country</option>                     
                    <option value="india">India</option>                     
                    </select>                    
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="state" class="control-label">State</label>
                    <select class="form-control @error('state') is-invalid @enderror" id="state" required="" name="state">   
                    <option value="">Select State</option>
                    @foreach($state as $st)
                        <option code="{{$st->state_code}}" value="{{$st->state_name}}">{{$st->state_name}}</option> 
                    @endforeach                     
                    </select>
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pop_signup_password" class="control-label">District</label>
                    <select class="form-control @error('district') is-invalid @enderror" id="district" required="" name="district">   
                    <option value="">Select District</option>                     
                    </select>
                    @error('district')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pincode" class="control-label">Pin Code</label>
                    <input id="pincode" type="number" class="form-control @error('pincode') is-invalid @enderror" name="pincode" required="">
                    @error('pincode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <input type="hidden" name="referal_code" value="{{$referal_id}}">
              <div class="checkbox loginstyle">
                <div class="form-group">
                  <div class="checkbox">
                    <label for="pop_signup_terms">
                      <input id="pop_signup_terms" name="terms" type="checkbox" class="form-control" style="width:auto;" required="">
                      Terms and Conditions
                      <p class="help-block"></p>
                    </label>
                    <p>
                      By clicking I accept the
                      <a href="#">Terms of Service.</a>
                      Your <a href="#">Privacy</a> is protected.
                    </p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <p id="pop-signup-form-msg" class="help-block"></p>
                <button id="pop-signup-button" type="submit" class="btn btn-primary log-button">
                  Register
                </button>
                <span id="pop-signup-button-loading" class="btn btn-primary log-button" style="display:none;">
                  Registering..
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</section>
@endsection
