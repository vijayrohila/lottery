<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function cart ()
    {
    	$cartCollection = \Cart::getContent();

    	//echo "<pre>"; print_r($cartCollection); die();

    	return view("cart",compact('cartCollection'));
    }

     public function add(Request $request){

     		$product = Product::findOrFail(decrypt($request->id));

     		if (!\Cart::get($product->id))
			{
			    \Cart::add(array(
			            'id' => $product->id,
			            'product_id' => $product->product_id,
			            'name' => $product->name,
			            'price' => 1,
			            'quantity' => 1,
			            'attributes' => array(
			                'image' => $product->image
			            )
	        	));
			}
				        
        return response()->json(['status'=>"success", "message"=>'Item is Added to Cart!']);
    }

    public function remove(Request $request) {
        \Cart::remove($request->id);
        return redirect("cart")->with(['status'=>"success", "message"=>'Item is removed from Cart!']);
    }

    public function clear(){
        \Cart::clear();
        return redirect("cart")->with(['status'=>"success", "message"=>'Cart is cleared']);
    }

    public function addCart(Request $request){

    		\Cart::clear();

     		$product = Product::findOrFail(decrypt($request->id));

     		if (!\Cart::get($product->id))
			{
			    \Cart::add(array(
			            'id' => $product->id,
			            'product_id' => $product->product_id,
			            'name' => $product->name,
			            'price' => 1,
			            'quantity' => 1,
			            'attributes' => array(
			                'image' => $product->image
			            )
	        	));
			}
	        
        return redirect("cart");
    }
}
