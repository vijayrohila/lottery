@extends('layouts.app')
@section('content')
<style type="text/css">      
      .owl-theme .owl-nav [class*=owl-]{
        display: none;
      }
      .owl-theme .owl-dots, .owl-theme .owl-nav{
        position: absolute;
      bottom: 0;
      width: 100%;
      }
      .product-wrapper{
   box-shadow: 0 0 12px rgba(0,0,0,.2);
   margin-bottom: 30px;
   }
   .product-wrapper .product-image-wrapper > img{
   width: 100%;
   }
   .product-wrapper .product-title{
   font-size: 26px;
   font-weight: 600;
   color: #333333;
   line-height: 2.5;
   }
   .product-wrapper .product-price{
   font-size: 20px;
   margin-bottom: 10px;
   }
   .product-wrapper .product-actions{
   padding: 15px;
   position: relative;
   }
   .product-wrapper .product-actions > a{
   min-width: 160px;
   font-size: 18px;
   font-weight: 600;
   padding: 12px;
   background-color: #319688;
   border-color: #319688;                
   }
   .product-wrapper .product-actions ion-icon{
   position: absolute;
   right: 15px;
   top: 24px;
   font-size: 30px;
   }
</style>
<!-- <div id="login-link">
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
</div> -->
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
      #language{
        border: 2px solid #319688;
        padding: 10px;
        height: auto;
        color: #319688;
        font-weight: 700;
      }
      .custom-button{
            line-height: 35px;
    background: #319588;
    color: white;
    font-weight: 700;
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
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
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
                  
               </div>
            </div>
         </div>
      </div>
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
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
                  
               </div>
            </div>
         </div>
      </div>
      <div style="background: url(https://cdn.pixabay.com/photo/2015/07/27/20/27/mockup-863469_960_720.jpg);">
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
                  
               </div>
            </div>
         </div>
      </div>     
   </div>
</section>
<!-- <section  class="about-us-section">
   <div class="team_wrap">
      <div class="container">
         <div class="our-story">
            <h5 class="green-color">About Us</h5>
            <p class="mt-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <span class="mt-4 d-block">That's when OneRupee was created</span>
         </div>
      </div>
   </div>
</section> -->
<section>
   <form id="search-post" method="post">
    <div class="row text-center p-5 m-0" style="background-color: #e8e8e8">
      <div class="col-md-2"></div>       
        <div class="col-md-4">
          <select class="form-control " id="language" name="language" required="" >
            <option value="">Select Language</option>
            @foreach($languages as $lang)
                <option value="{{$lang->id}}">{{$lang->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-4">
          <button type="submit" class="form-control custom-button">Submit</button>
        </div>      
    </div>
   </form>
   <div class="row text-center p-5 m-0" id="search-add-post">
      @foreach($products as $product)
         <div class="col-md-4">
            <div class="product-wrapper">
               <div class="product-image-wrapper">
                  <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
               </div>
               <div class="product-content-wrapper">
                  <div class="product-title">{{$product->name}}</div>
                  <div class="product-price">${{$product->cost}}/-</div>
                  <div class="product-id">{{$product->product_id}}</div>
                  <div class="product-actions">     
                      <a href="#" class="btn btn-primary">Link</a>
                      <ion-icon name="add"></ion-icon>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
</section>
<!-- <section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="laptop-wrapper">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/TGbUpEJ1z-k" frameborder="0" allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </div>
</section> -->
@endsection