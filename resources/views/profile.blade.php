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
        <div class="panel pt-4">
          <div class="signup-style">My Profile</div>
          <div class="panel-body">
            <form class="form-horizontal" action="{{ url('profile') }}" id="register"  method="POST">
              @csrf
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name" class="control-label">First Name</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required="" value="{{$user->first_name}}">
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
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required="" value="{{$user->last_name}}">
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
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pop_signup_email" class="control-label">Email</label>
                    <input id="pop_signup_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required="" value="{{$user->email}}" readonly="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pop_signup_email" class="control-label">User ID</label>
                    <input id="user_id" type="text" class="form-control" name="user_id" required="" value="{{$user->user_id}}" readonly="">
                    @error('user_id')
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
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" required="" value="{{$user->phone}}">
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
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required="" value="{{$user->address}}">
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
                    <option value="india" selected="">India</option>                     
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
                        <option code="{{$st->state_code}}" @if($st->state_name == $user->state) {{"selected"}} @endif value="{{$st->state_name}}">{{$st->state_name}}</option> 
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
                    @foreach($district as $dt)
                        <option @if($dt->district_name == $user->district) {{"selected"}} @endif value="{{$dt->district_name}}">{{$dt->district_name}}</option> 
                    @endforeach                    
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
                    <input id="pincode" type="number" class="form-control @error('pincode') is-invalid @enderror" name="pincode" required="" value="{{$user->pincode}}">
                    @error('pincode')
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
          <div class="panel-body">
            <div class="row loginstyle">
                <div class="col-md-10">
                  <div class="signup-style">
                    My Referrals
                  </div>
                  <div class="form-group">
                    <input type="text" value="{{url('/register?id='.$user->user_id)}}" readonly="" id="copy" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button class="btn btn-primary copyToClip">Copy</button>
                  </div>
                </div>
              </div>
          </div>
          <div class="panel-body">
            <div class="row loginstyle">
                <div class="col-md-3">
                  <div class="form-group">
                   Referrals Count
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button class="btn btn-primary"> {{$referal}}</button>
                  </div>
                </div>
              </div>
          </div>
          <div class="panel-body">
            <div class="row loginstyle">              
                <div class="col-md-12">
                  <div class="signup-style">
                    Products Won
                  </div>
                  <div class="form-group">
                    <table id="user-winner-list" class=" display responsive nowrap table">
                        <thead>
                           <tr>
                              <th>Date</th>
                              <th>Product ID/Name</th>
                              <th>INR</th>
                              <th>Position</th>
                              <th>Image</th>
                           </tr>
                        </thead>
                        <tbody>         
                        </tbody>
                     </table>
                  </div>
                </div>                
              </div>
          </div>
          <div class="panel-body">
            <div class="row loginstyle">            
               <div class="col-md-12">
                  <div class="signup-style">Lottery Played</div>
                  <div class="form-group">
                    <table id="user-bat-list" class="display responsive nowrap table">
                        <thead>
                           <tr>
                              <th>Date</th>
                              <th>Product ID/Name</th>
                              <th>INR</th>
                              <th>Position</th>
                              <th>Image</th>
                           </tr>
                        </thead>
                        <tbody>         
                        </tbody>
                     </table>
                  </div>
                </div>                
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</section>
@endsection
