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
   body{
   color: #872166;
   }
   .custom-heading{
   padding-top: 50px;
   font-size: 26px;
   color: #872166;
   position: relative;
   }
   .custom-heading:after{
   content: '';
   position: absolute;
   border: 1px solid #872166;
   width: 100px;
   bottom: 15px;
   margin-left: 20px;
   }
   .custom-heading:before{
   content: '';
   position: absolute;
   border: 1px solid #872166;
   width: 100px;
   bottom: 15px;
   margin-left: -120px;
   }
   .about-us-section1 p{
   padding: 50px 100px;
   text-align: center;
   color: #872166;
   line-height:1.8;
   }
   .overview-wrapper > div{
   padding: 30px;
   }
</style>
<section>
   <h3 class="custom-heading">Contact Us</h3>
   <div class="row p-5 contact-us-wrap">
      <div class="col-md-8">
         <h5>Get in Touch</h5>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultrices, libero in aliquet tempor, nunc turpis dapibus leo, in consequat eros magna eu quam.</p>
         <fieldset class="form-group loginstyle">
            <div class="form-group">
               <label class="control-label" for="pop-login-username" aria-required="true" name="Email">Name</label>
               <input type="text" id="pop-login-username" class="form-control" name="username" required="">
               <p class="help-block"></p>
            </div>
         </fieldset>
         <fieldset class="form-group loginstyle">
            <div class="form-group">
               <label class="control-label" for="pop-login-username" aria-required="true" name="Email">Your Email Address</label>
               <input type="text" id="pop-login-username" class="form-control" name="username" required="">
               <p class="help-block"></p>
            </div>
         </fieldset>
         <fieldset class="form-group loginstyle">
            <div class="form-group">
               <label class="control-label" for="pop-login-username" aria-required="true" name="Email">Message</label>
               <textarea class="form-control"></textarea>
               <p class="help-block"></p>
            </div>
         </fieldset>
         <button class="btn btn-primary">Submit</button>
      </div>
      <div class="col-md-4">
         <h5>Contact with us</h5>
         <p>For support and any questions <br> Email us at support@gmail.com  </p>
         <br>
         <h5>Office Address </h5>
         <p>
            B-222, main road, 121202.            
         </p>
      </div>
   </div>
</section>
@endsection