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
<section>
<div class="container p-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5 loginform">
            <h5 class="loginstyle signup-style">Login to {{env('APP_NAME')}}</h5>
            <form id="pop-login-form" action="{{ route('login') }}" method="post">
               @csrf
                <input type="hidden" id="pop_signin_came_from" name="came_from" value="">
                <fieldset class="form-group loginstyle">
                    <div class="form-group">
                        <label class="control-label" for="pop-login-username" aria-required="true" name="Email">
                        Email
                        </label>
                        <input type="email" id="pop-login-username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="help-block"></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pop-login-password" required>Password</label>
                        <input type="password" id="pop-login-password" class="form-control @error('password') is-invalid @enderror" name="password" aria-required="true" aria-describedby="userPassword-error" aria-invalid="true" required="">
                        <ion-icon name="eye-off" class="show-password"></ion-icon>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="help-block"></p>
                    </div>
                </fieldset>
                <div class="checkbox loginstyle">
                    <div class="form-group">
                        <div class="checkbox">
                            <label for="pop-login-rememberme">
                                
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <p id="pop-form-msg" class="help-block"></p>
                <button type="submit" class="btn btn-primary log-button theme-green" id="pop-login-button">Login</button>
                <span class="btn btn-primary log-button" id="pop-login-button-loading" style="display:none;">Authenticating..</span>
            </form>
        </div>
        <div class="col-md-5 login-p2">
            <h5 class="loginstyle">Don't have an account?</h5>
            <button class="btn theme-green signup-link" onclick="window.location.href = '{{route('register')}}'">Sign Up</button>
            <br><br>
            <h5 class="loginstyle">Forgot your Password?</h5>
            <a class="btn btn-grey" href="{{ route('password.request') }}">Reset</a>
            <br><br><br>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</section>
@endsection
