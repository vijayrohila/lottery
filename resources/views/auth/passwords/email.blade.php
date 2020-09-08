@extends('layouts.app')

@section('content')
<section>
    <div class="row m-0 p-5">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginform">
            <h5 class="loginstyle signup-style" style="text-align: left">Reset Your Password</h5>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="row loginstyle">
                        <div class="col-md-6">
                            <div class="form-group">
                    
                                <label for="email" class=" text-md-right">Enter Email Address</label>

                    
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        
                    </div>
                    <div class="loginstyle">
                        
                    <button type="submit" class="btn btn-primary log-button">
                                {{ __('Send Password Reset Link') }}
                            </button>
                    </div>

                    
                           
                    
                </form>
            
        </div>
        <div class="col-md-3"></div>
    </div>
                
</section>
@endsection
