@extends('layouts.app')
@section('content')
<style type="text/css">
		.cart-item{
			border-bottom: 1px solid #e8e8e8;
		}
		.cart-item:last-child{
			border-bottom: 0px solid #e8e8e8;	
		}
		.cart-item > div{
			float: left;
			padding: 20px;
		}
		.cart-item .cart-image-wrapper{
			width: 150px;
			
		}
		.cart-item .cart-image-wrapper > img{
			width: 100%
		}
		.cart-item .cart-content{
			padding-left: 0;
			width: calc( 100% - 150px );
		}
		.cart-content .item-title{
			font-size: 20px;
		    font-weight: 600;
		    color: #454545;
		    line-height: 2;
		}
		.cart-content .item-id{
			font-size: 14px;
			color: #767676;
			line-height: 2;
		}
		.cart-content .remove-link a{
			border: 1px solid #999999;
			padding: 4px 10px;
			color: #676767;
			border-radius: 2px;
			margin-top: 12px;
			display: inline-block;
			font-size: 14px;
		}
		.cart-content .remove-link{
			float: left;
		}
		.cart-content .amount{
			float: right;
		}
		.section-cart .card{
			box-shadow: 0 1px 6px 0 rgba(79,36,85,.15);
		}
		.section-cart .card h5{
			padding:10px 20px 0;
		}
		.amount-list{
			list-style: none;
    		padding: 10px 20px;
		}
		.amount-list > li > div{
			float: left;
		}
		.amount-list > li:after{
			content: '';
			display: block;
			clear:left;
		}
		.amount-list > li > div:first-child{
			width: calc( 100% - 50px );
		}
		.amount-list > li > div:nth-child(2){
			width: 50px;
		}
		.razorpay-payment-button{
			width: 100%
		}
</style>
<section class="section-cart">
	<div class="row m-0 p-4">
		<div class="col-md-8">
			<div class="card p-2">					
				@if(\Cart::getTotalQuantity()>0)
                <h5>{{ \Cart::getContent()->count()}} Product(s) In Your Cart</h5><br>
                @else
                    <h5>No Product(s) In Your Cart</h5><br>
                    <a href="{{url('lottery')}}" class="btn btn-primary">Continue Playing</a>
                @endif
                @foreach($cartCollection as $item)
				<div class="cart-items">
					<div class="cart-item">
						<div class="cart-image-wrapper">
							<img src="{{url('admin/public/product/'.$item->attributes->image)}}">
						</div>
						<div class="cart-content">
							<div class="item-title">
								{{$item->name}}
							</div>
							<div class="item-id">
								{{$item->product_id}}
							</div>
							<div class="remove-link">
								<form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-primary btn-sm" style="margin-right: 10px;">Remove Item	</button>
                            	</form>
							</div>
							<div class="amount">
								Rs. 1/-
							</div>
						</div>
						<div style="clear: both;float: none;padding: 0;"></div>
					</div>						
				</div>
				@endforeach
				@if(count($cartCollection)>0)
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-md">Clear Cart</button>
                </form>
            	@endif
			</div>
		</div>
		@if(count($cartCollection)>0)
		<div class="col-md-4">
			<div class="card p-2">
				<h5>The total amount is</h5>
				<ul class="amount-list">
					<li>
						<div>Amount:</div>
						<div>Rs {{ \Cart::getTotal() }}/-</div>
					</li>
					<li>
						<div>Including All Taxes:</div>
						<div>0.00/-</div>
					</li>
					<li>
						<div>Total:</div>
						<div>Rs {{ \Cart::getTotal() }}/-</div>
					</li>						
				</ul> 
				<hr>		
				@guest			
				<a href="{{route('login')}}"  class="btn btn-primary" style="width: 100%">Go to checkout</a>
				@else
				<form action="{!!route('payment')!!}" method="POST" >
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('ROZOR_KEY') }}"
                            data-amount="{{ \Cart::getTotal()*100 }}"
                            data-buttontext="Go to checkout"
                            data-name="{{env('APP_NAME')}}"
                            data-description="Play"
                            data-image="yout_logo_url"                                
                            data-prefill.name=""
                            data-prefill.email=""
                            data-theme.color="#ff7529">
                    </script>
                    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                </form>
				@endguest
			</div>
		</div>
		@endif
	</div>
</section>
@endsection


              