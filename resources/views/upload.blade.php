@extends('layouts.front')
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
    #custom_box{
    background: white;
    color: black !important;
    padding: 15px;
    font-size: 22px;
    font-weight: 700;
    border-radius: 5px;
    margin-left: 30px;
   }

</style>
<style type="text/css">
  .owl-theme .owl-nav{
    display: none;
  }
  .custom-line{
    color: white;
    margin-bottom: 30px;
  }
  .w3l-contact-main .form-group .form-control{
    background-color: white;
  }
  .form-group-radio input{
    -webkit-appearance: radio;
    display: inline-block;
    width: 30px !important;
  }
  .form-group-radio label{
    display: inline-block !important;
    vertical-align: middle;
  }
</style>
<section class="w3l-inner-banner-main">
  <div class="about-inner inner2">
    <div class="wrapper seen-w3">
      <div class="custom-line">@php echo ($total_product < $post)?$post-$total_product:"0"; @endphp post is avaialables out of {{$post}} post in this Hour</div>
      <ul class="breadcrumbs-custom-path">
        <li><a style="font-size: 20px;">Automatic generated ID</a></li>
        <li></li>
        <li class="active custom-box" id="custom_box">PID601543887922015</li>
      </ul>
    </div>
  </div>
</section>

<div class="w3l-contact-main">
    <div class="contact sec-padding">
        <div class="wrapper">
            <div class="contact-form mx-auto pt-sm-4">
                <form method="post" action="https://sendmail.w3layouts.com/submitForm">
                    <div class="d-grid content-grids-cont">
                        <div class="form-group">
                            <label for="w3lName">Name</label>
                            <input type="text" class="form-control" name="w3lName" id="w3lName" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label for="w3lSender">Email</label>
                            <input type="email" class="form-control" name="w3lSender" id="w3lSender" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="w3lSubject">Networks / Website</label>
                        <select class="form-control">
                          @foreach($network as $net)
                          <option value="">Select Network</option>
                            <option value="{{$net->id}}">{{$net->name}}</option>
                          @endforeach  
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                          <label for="last_name" class="control-label">Country</label>
                          <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required="">
                            <option value="">Select Country</option>
                            @foreach($country as $cntry)
                                <option value="{{$cntry->id}}">{{$cntry->name}}</option>
                            @endforeach
                          </select>
                          @error('country')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <p class="help-block"></p>
                        </div>
                    </div>

                  <div class="form-group">
                    <label for="language" class="control-label">Language</label>
                    <select class="form-control @error('language') is-invalid @enderror" id="language" name="language" required="">
                      <option value="">Select Language</option>
                      @foreach($language as $lang)
                          <option value="{{$lang->id}}">{{$lang->name}}</option>
                      @endforeach
                    </select>
                    @error('language')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $language }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="promotional_link" class="control-label">Promotional Link</label>
                    <input id="promotional_link" type="text" class="form-control @error('promotional_link') is-invalid @enderror" name="promotional_link" required="" value="" placeholder="Promotional Link">
                    @error('promotional_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="image" class="control-label">Upload Image</label>
                    <input type="file"  class="form-control @error('image') is-invalid @enderror" id="image" required="" name="image">   
                                        
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>

                  <div class="form-group">
                    <label for="state" class="control-label">Paid Amount</label>
                    <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" required="" value="" placeholder="Paid Amount">
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="pop_signup_password" class="control-label">Post/Content Display</label>
                    <div class="form-group-radio">
                      <input type="radio" id="0" name="post_type" value="0" class="form-control">
                      <label for="0">All</label>
                    </div>
                    <div class="form-group-radio">
                      <input type="radio" id="1" name="post_type" value="1" class="">
                      <label for="1">Above 18</label>
                    </div>
                      
                    
                    @error('district')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group">
                    <label for="pincode" class="control-label">Add one hours as bonus by typing company name below</label>
                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" required="" value="" placeholder="Company Name">
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                  <div class="form-group-radio">
                    <label for="pincode" class="control-label"></label>
                    <input id="checkbox" type="checkbox" class="form-control @error('checkbox') is-invalid @enderror" name="checkbox" required="">
                    <label for="checkbox">I am agree to the term and conditions</label>
                    <p class="help-block"></p>
                  </div>


                    <button type="submit" class="btn button-eff button-eff-2">Next</button>
                </form>
            </div>
            
        </div>
    </div>
</div>


<section>
<div class="container" style="display: none;">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8"> @php echo ($total_product < $post)?$post-$total_product:"0"; @endphp post is avaialables out of {{$post}} post in this Hour</div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel pt-4">
          @php
              $product_id = strtoupper(uniqid()).rand(1,100);
          @endphp
          <div class="signup-style">Automatic generated ID : PID{{$product_id}}</div>
          <div class="panel-body">
            <form class="form-horizontal" action="{{ url('profile') }}" id="register"  method="POST">
              @csrf
              <input type="hidden" name="product_id" value="PID{{$product_id}}">
              <div class="row loginstyle">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name" class="control-label">Name</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required="" value="" placeholder="Name">
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
                    <label for="last_name" class="control-label">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required="" value="" placeholder="Email">
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
                    <label for="last_name" class="control-label">Networks / Website</label>
                    <select class="form-control @error('network') is-invalid @enderror" id="network" name="network" required="">
                      <option value="">Select Networks / Website</option>
                      @foreach($network as $net)
                          <option value="{{$net->id}}">{{$net->name}}</option>
                      @endforeach
                    </select>
                    @error('network')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="last_name" class="control-label">Country</label>
                    <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required="">
                      <option value="">Select Country</option>
                      @foreach($country as $cntry)
                          <option value="{{$cntry->id}}">{{$cntry->name}}</option>
                      @endforeach
                    </select>
                    @error('country')
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
                    <label for="language" class="control-label">Language</label>
                    <select class="form-control @error('language') is-invalid @enderror" id="language" name="language" required="">
                      <option value="">Select Language</option>
                      @foreach($language as $lang)
                          <option value="{{$lang->id}}">{{$lang->name}}</option>
                      @endforeach
                    </select>
                    @error('language')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $language }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="promotional_link" class="control-label">Promotional Link</label>
                    <input id="promotional_link" type="text" class="form-control @error('promotional_link') is-invalid @enderror" name="promotional_link" required="" value="" placeholder="Promotional Link">
                    @error('promotional_link')
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
                    <label for="image" class="control-label">Upload Image</label>
                    <input type="file"  class="form-control @error('image') is-invalid @enderror" id="image" required="" name="image">   
                                        
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="state" class="control-label">Paid Amount</label>
                    <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" required="" value="" placeholder="Paid Amount">
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="pop_signup_password" class="control-label">Post/Content Display</label>
                    <input type="radio" id="0" name="post_type" value="0" class="form-control">
                    <label for="0">All</label>
                    <input type="radio" id="1" name="post_type" value="1" class="form-control">
                    <label for="1">Above 18</label>
                    @error('district')
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
                    <label for="pincode" class="control-label">Add one hours as bonus by typing company name below</label>
                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" required="" value="" placeholder="Company Name">
                    @error('company_name')
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
                    <label for="pincode" class="control-label"></label>
                    <input id="checkbox" type="checkbox" class="form-control @error('checkbox') is-invalid @enderror" name="checkbox" required="">
                    <label for="checkbox">I am agree to the term and conditions</label>
                    <p class="help-block"></p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <p id="pop-signup-form-msg" class="help-block"></p>
                <button id="pop-signup-button" type="submit" class="btn btn-primary log-button">
                  Next
                </button>
                <!-- <span id="pop-signup-button-loading" class="btn btn-primary log-button" style="display:none;">
                  Registering..
                </span> -->
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
