@extends('layouts.app')
@section('content')
<style type="text/css">
   .navbar-light .navbar-brand{
   color: #009688 ;
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
   color: #009688 ;
   font-weight: 600;
   }
</style>
<style type="text/css">
   .custom-heading{
   padding-top: 50px;
   font-size: 26px;
   color: #009688 ;
   position: relative;
   }
   .custom-heading:after{
   content: '';
   position: absolute;
   border: 1px solid #009688 ;
   width: 100px;
   bottom: 15px;
   margin-left: 20px;
   }
   .custom-heading:before{
   content: '';
   position: absolute;
   border: 1px solid #009688 ;
   width: 100px;
   bottom: 15px;
   margin-left: -120px;
   }
   body{
   color: #009688 ;
   }
</style>
<section class="about-us-section1">
   <h3 class="custom-heading ">Terms and Conditions</h3>
   <span class="p-5">
      {!!$term->value!!}
   </span>
</section>
@endsection