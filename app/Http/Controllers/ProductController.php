<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function searchPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'language' => 'required'                                     
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return response()->json(['status'=>'error', 'error_message'=>$value[0]]);
            }
        }

        $search_post = Product::where("language_id",$request->language)->get()->toArray();

        $post = view("search_post",compact('search_post'))->render();

        return response()->json(['status'=>'success', 'message'=>'', "result" => $post]);
    }

    public function searchPostId(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'search' => 'required'                                     
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return response()->json(['status'=>'error', 'error_message'=>$value[0]]);
            }
        }

        $search_post = Product::where("product_id",$request->search)->get()->toArray();

        $post = view("search_post",compact('search_post'))->render();

        return response()->json(['status'=>'success', 'message'=>'', "result" => $post]);
    }
}
