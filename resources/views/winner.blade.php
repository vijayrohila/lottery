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
   background-color: #872266;
   border-color: #972266;                
   }
   .product-wrapper .product-actions ion-icon{
   position: absolute;
   right: 15px;
   top: 24px;
   font-size: 30px;
   }
</style>
<style type="text/css">
   .table td, .table th{vertical-align: middle;}
</style>
<section>
   <div class="row m-0 p-4">
      <div class="col-md-12">

         <table id="winner-list" class="display responsive nowrap table">
            <thead>
               <tr>
                  <th>Date</th>
                  <th>User ID</th>
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
</section>
@endsection