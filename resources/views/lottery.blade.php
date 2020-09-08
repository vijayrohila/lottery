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

<section>
   <div class="row text-center p-5 m-0">
      @foreach($products as $product)
         <div class="col-md-4">
            <div class="product-wrapper">
               <div class="product-image-wrapper">
                  <img src="{{url('/admin/public/product/'.$product['image'])}}">
               </div>
               <div class="product-content-wrapper">
                  <div class="product-title">{{$product['name']}}</div>
                  <div class="product-price">Rs. {{$product['cost']}}/-</div>
                  <div class="product-id">{{$product['product_id']}}</div>
                  <div class="product-actions">     

                  @guest
                        <a href="{{route('login')}}" class="btn btn-primary">Play with 1/-</a>
                         <ion-icon name="add" onclick="redirectLogin()"></ion-icon>
                  @else 
                    @if(!empty($winner))
                        @if(array_search($product['id'],array_column($winner,"product_id")) === false)            
                         <a href="{{url('/single-cart/'.encrypt($product['id']))}}" class="btn btn-primary">Play with 1/-</a>
                         <ion-icon name="add" class="add-cart" id="{{encrypt($product['id'])}}"></ion-icon>
                        @endif 
                    @else
                        <a href="{{url('/single-cart/'.encrypt($product['id']))}}" class="btn btn-primary">Play with 1/-</a>
                         <ion-icon name="add" class="add-cart" id="{{encrypt($product['id'])}}"></ion-icon>
                    @endif 
                  @endguest                   
                    
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   </div>
</section>
@endsection