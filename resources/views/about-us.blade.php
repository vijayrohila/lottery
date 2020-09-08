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
<style type="text/css">
   ol {
  list-style: none;
  counter-reset: steps;
}
ol li {
  counter-increment: steps;
  margin-bottom: 10px;
}
ol li::before {
  content: counter(steps);
  margin-right: 0.5rem;
  background: #24b2b7;
  color: white;
  width: 2.2em;
  height: 2.2em;
  /*border-radius: 50%;*/
  display: inline-grid;
  place-items: center;
  line-height: 1.2em;
}
ol ol li::before {
  background: darkorchid;
}
</style>
<section class="about-us-section1">
   <h3 class="custom-heading">About Us</h3>
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
      <br>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
      <br><br>
      <strong>That's when OneRupee was created</strong>
   </p>
</section>
<section class="about-us-section2" style="padding: 0 40px;background-color: #f5f5f5">
   <h3 class="custom-heading" style="margin-bottom: 10px;">Overview</h3>
   <div class="row overview-wrapper">
      <div class="col-md-6 col-sm-12">
         <img src="images/architect-5342907_640.jpg" style="width: 100%">
      </div>
      <div class="col-md-6 col-sm-12">
         <h5 class="mb-10" style="padding-top: 60px;">Lorem Ipsum is simply dummy</h5>
         <p>Nunc lobortis porttitor iaculis. In hac habitasse platea dictumst. Sed mauris leo, suscipit ut tristique at, euismod in massa. Sed sem leo, pretium ac justo at, feugiat bibendum ligula. Phasellus bibendum dolor neque, ut mattis neque pretium ut. Ut libero erat, faucibus a felis ac, sodales bibendum turpis. Aenean et leo imperdiet, pellentesque diam ut, gravida dolor. Sed semper accumsan leo in congue. Ut fermentum gravida odio eu tincidunt.</p>
      </div>
      <div class="col-md-6 col-sm-12" style="text-align: right;">
         <h5 class="mb-10" style="padding-top: 60px;">Lorem Ipsum is simply dummy</h5>
         <p>Nunc lobortis porttitor iaculis. In hac habitasse platea dictumst. Sed mauris leo, suscipit ut tristique at, euismod in massa. Sed sem leo, pretium ac justo at, feugiat bibendum ligula. Phasellus bibendum dolor neque, ut mattis neque pretium ut. Ut libero erat, faucibus a felis ac, sodales bibendum turpis. Aenean et leo imperdiet, pellentesque diam ut, gravida dolor. Sed semper accumsan leo in congue. Ut fermentum gravida odio eu tincidunt.</p>
      </div>
      <div class="col-md-6 col-sm-12">
         <img src="images/architect-5342907_640.jpg" style="width: 100%">
      </div>
   </div>
</section>

<section class="about-us-section2" style="padding: 0 40px;">
   <h3 class="custom-heading" style="margin-bottom: 10px;">Lorem Ipsum</h3>
   
   <ol>
      <li>Nunc lobortis porttitor iaculis.</li>
      <li>In hac habitasse platea dictumst.</li>
      <li>Aenean et leo imperdiet, Nunc lobortis porttitor iaculis.</li>
   </ol>
</section>
@endsection