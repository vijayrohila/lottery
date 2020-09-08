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
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="panel pt-4">
          <div class="signup-style">Change Password</div>
          <div class="panel-body">
            <form class="form-horizontal" action="{{url('change-password')}}" id="change-password"  method="POST">
              @csrf
              <div class=" loginstyle">
                <div class="">
                  <div class="form-group">
                    <label for="old_password" class="control-label">Old Password</label>
                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required="">
                    <ion-icon name="eye-off" class="show-password"></ion-icon>
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>                
              </div>
              <div class=" loginstyle">
                <div class="">
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
              </div>
               <div class=" loginstyle">
                <div class="">
                  <div class="form-group">
                    <label for="password_confirmation" class="control-label">Confirm Password</label>
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
              <div class="form-group">
                <p id="pop-signup-form-msg" class="help-block"></p>
                <button id="pop-signup-button" type="submit" class="btn btn-primary log-button">
                  Update
                </button>
                <span id="pop-signup-button-loading" class="btn btn-primary log-button" style="display:none;">
                  Registering..
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
@endsection
