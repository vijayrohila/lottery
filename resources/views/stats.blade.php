@extends('layouts.app')
@section('content')
<style type="text/css">
   
   div#collapsibleNavbar{
   margin-top: 0;
   }
   header .header-wrapper{
   box-shadow: 0 5px 10px 0 rgba(79,36,85,.15)
   }
   .navbar-light .navbar-nav .nav-link{
   color: #009688;
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
   background-color: #009688;
   border-color: #009688;                
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
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">Live Traffic : 123641</div>
    </div>
   <div class="row m-0 p-4">
      <div class="col-md-12">
         <table id="traffic-list" class="display responsive nowrap table">
            <thead>
               <tr>
                  <th>Previous day</th>
                  <th>Visitor</th>                  
               </tr>
            </thead>
            <tbody>         
            </tbody>
         </table>
      </div>
   </div>
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">Search You POST ID</div>
   </div>
   <form id="search-post-id" method="post">
      <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4">
            <input type="text" name="search" placeholder="Type your POST ID" class="form-control" required="">
         </div>
         <div class="col-md-4">
            <button type="submit" class="form-control">Search</button>
         </div>
      </div>
   </form>   
</section>
<section>
   <div class="row text-center p-5 m-0" id="search-add-post">
      
         <div class="col-md-4">
            <div class="product-wrapper">
               <div class="product-image-wrapper">
                  <img src="{{url('/admin/public/product/1598189039download.jpg')}}">
               </div>
               <div class="product-content-wrapper">
                  <div class="product-title">Name</div>
                  <div class="product-price">$122</div>
                  <div class="product-id">1254</div>
                  <div class="product-actions">     
                      <a href="#" class="btn btn-primary">Link</a>
                      <ion-icon name="add"></ion-icon>
                  </div>
               </div>
            </div>
         </div>
      
   </div>
</section>
@endsection