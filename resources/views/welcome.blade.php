@extends('layouts.app')
@section('content')
 <style type="text/css">
            

        </style>
        <style type="text/css">
            .owl-theme .owl-nav{
            display: none;
          }
            @media screen and (min-width: 780px){
          
            .my-custom-slider .owl-dots{
                box-shadow: 0 5px 10px 0 rgba(79,36,85,.15);
                transform: skew(-20deg,0deg);
                color: #c7b9c9;
                font-size: 20px;
                font-weight: 600;
                min-width: 680px;
                bottom: -40px;
                background: white;
                position: absolute;
                left: calc( 50% - 340px );
          }
          .my-custom-slider .owl-dots > .owl-dot{
            position: relative;
            width: 25%;
                text-align: center;
                    margin-bottom: -8px;
          }
          .my-custom-slider .owl-dots > .owl-dot:after{
            content:'Add 1';
            display: inline-block;
            transform: skew(20deg,0deg);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            line-height: 80px;
          }
          .my-custom-slider .owl-dots > .owl-dot:nth-child(2):after{
            content:'Add 2';
          }
          .my-custom-slider .owl-dots > .owl-dot:nth-child(3):after{
            content:'Add 3';
          }
          .my-custom-slider .owl-dots > .owl-dot:nth-child(4):after{
            content:'Add 4';
          }
          .my-custom-slider .owl-dots > .owl-dot.active:after{
            color: white;
          }
          .my-custom-slider .owl-dots > .owl-dot > span{
            height: 80px;
            width: 100%;
            border-radius: 0;
            margin:0;
            background-color: white !important;
            
          }
          .my-custom-slider .owl-dots > .owl-dot.active > span{
            background-color: #71215f !important;

          }
      }
        </style>
<div id="login-link">
   <div id="login-content" class="overlay-login-signup">
      <span class="navbar-light" style="padding: 20px 40px;display: inline-block;"><span class="navbar-brand">{{env('APP_NAME')}}</span></span>
      <a class="closebtn" id="close-login-form">×</a>
      <div class="overlay-content-login">
         <div class="container">
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4 loginform">
                  <h5 class="loginstyle signup-style">Login to {{env('APP_NAME')}} Portal</h5>
                  <form id="pop-login-form" action="" method="post">
                     <input type="hidden" name="_token">
                     <input type="hidden" id="pop_signin_came_from" name="came_from" value="">
                     <fieldset class="form-group loginstyle">
                        <div class="form-group">
                           <label class="control-label" for="pop-login-username" aria-required="true" name="Email">Email</label>
                           <input type="text" id="pop-login-username" class="form-control" name="username" required>
                           <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="pop-login-password" required>Password</label>
                           <input type="password" id="pop-login-password" class="form-control" name="password"  type="password" aria-required="true" aria-describedby="userPassword-error" aria-invalid="true">
                           <p class="help-block"></p>
                        </div>
                     </fieldset>
                     <div class="checkbox loginstyle">
                        <div class="form-group">
                           <div class="checkbox">
                              <label for="pop-login-rememberme">
                              <input type="checkbox" id="pop-login-rememberme" name="rememberMe">
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
               <div class="col-md-4 login-p2">
                  <h5 class="loginstyle">Don't have an account?</h5>
                  <button class="btn theme-green signup-link">Sign Up</button>
                  <br><br>
                  <h5 class="loginstyle">Forgot your Password?</h5>
                  <a class="btn btn-grey" href="#">Reset</a>
                  <br><br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section style="display: none;">
   <style type="text/css">
      .custom-steps{
      box-shadow: 0 5px 10px 0 rgba(79,36,85,.15);
      margin: 30px auto;
      transform: skew(-20deg,0deg);
      color: #c7b9c9;
      font-size: 20px;
      font-weight: 600;
      max-width: 800px;
      }
      .custom-steps > div{
      display: inline-block;
      padding: 15px 50px;
      }
      .custom-steps .step-item > div{
      transform: skew(20deg,0deg);
      position: relative;
      }
      .custom-steps .step-item > div:after{
      content: '/';
      position: absolute;
      right: -57px;
      top: 16px;
      }
      .custom-steps .step-item:last-child > div:after{
      content: '';
      }
      .custom-steps .step-item.active{
      background:#872266;
      color: white;
      }
   </style>
   <div class="custom-steps">
      <div class="step-item active">
         <div>Pay<br> Online</div>
      </div>
      <div class="step-item">
         <div>Send<br> Money</div>
      </div>
      <div class="step-item">
         <div>Recieve<br> Money</div>
      </div>
      <div class="step-item">
         <div>Loyalty<br> Program</div>
      </div>
   </div>
</section>
<section>
   <!-- Set up your HTML -->
   <style type="text/css">
   </style>
   <div class="owl-carousel owl-theme image-slider my-custom-slider">
      <div>
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  <div class="right d-none d-sm-block">
                     <img src="images/img1111.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  <div class="right d-none d-sm-block">
                     <img src="images/img1111.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  <div class="right d-none d-sm-block">
                     <img src="images/img1111.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div>
         <div class="banner_wrap">
            <div class="container-fluid">
               <div class="banner_inner">
                  <div class="left">
                     <p>Make it. Move it. Send it. Spend it.</p>
                     <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                     <button>
                     <a href="#">Get Started</a>
                     </button>
                  </div>
                  <div class="right d-none d-sm-block">
                     <img src="images/img1111.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>



</section>
<section  class="about-us-section">
   <div class="team_wrap">
      <div class="container">
         <div class="our-story">
            <h5 class="green-color">About Us</h5>
            <p class="mt-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <span class="mt-4 d-block">That's when OneRupee was created</span>
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="laptop-wrapper">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/TGbUpEJ1z-k" frameborder="0" allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection