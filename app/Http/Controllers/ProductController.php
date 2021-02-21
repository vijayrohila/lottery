<?php

namespace App\Http\Controllers;

use App\Product;
use App\Setting;
use App\EngageProduct;
use Illuminate\Http\Request;
use Validator;
use DB;

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
        $validator = Validator::make($request->all(), [
                        'name' => 'required|max:150',                                     
                        'email' => 'required|max:150',                                     
                        'mobile' => 'required|max:10|min:10',                                     
                        'network' => 'required',                                     
                        'country' => 'required',                                     
                        'language' => 'required',                                     
                        'promotional_link' => 'required|max:200',                                     
                        'cost' => 'required',                                     
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status'=>'error', 'error_message'=>$value[0]]);
            }
        }

        $input = $request->all();

        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'public/product';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
            $input['image'] = $file_name;
        } 

        $input['network_id'] = $input['network'];
        $input['country_id'] = $input['country'];
        $input['language_id'] = $input['language'];

        Product::create($input);

        return redirect()->back()->with(['status'=>'success', 'message' => "Post added successfully!"]);
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
    public function destroy($id)
    {
        $total_delete = Setting::where("key","delete_post")->get()->first();

        $product = Product::find(decrypt($id));
        $product->delete_count = $product->delete_count + 1;

        $product->is_deleted = ($total_delete->value <= $product->delete_count)?1:0;
        
        $product->save();
        return response()->json(['status'=>'success', 'message'=>'Product delete successfully!']);
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

        $total_delete = Setting::where("key","delete_post")->get()->first();

        $search_post = Product::with("network")->where(["language_id" => $request->language, "is_deleted" => "0"])->get()->toArray();

        Product::whereIn("id",array_column($search_post, "id"))->increment("view", 1);

        $post = view("search_post",compact('search_post','total_delete'))->render();

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

        $total_delete = Setting::where("key","delete_post")->get()->first();

        $search_post = Product::where("product_id",$request->search)->get()->toArray();

        $post = view("search_post_id",compact('search_post','total_delete'))->render();

        return response()->json(['status'=>'success', 'message'=>'', "result" => $post]);
    }

    public function productIdPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'product_id' => 'required|unique:products'                                     
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return response()->json(['status'=>'error', 'error_message'=>$value[0]]);
            }
        }

        $input = $request->all();        

        $total_post_hour = Setting::where("key","post_hours")->get()->first();

        $product = EngageProduct::whereBetween('created_at', [
                now()->format('Y-m-d H:00:00'),
                now()->addHours(1)->format('Y-m-d H:00:00')
            ])->count();

        EngageProduct::create($input);


          $url = url('api/check-product');  
          $method = "POST";        
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($input));    
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
          curl_setopt($ch, CURLOPT_USERAGENT, 'tacepook');        
          curl_setopt($ch, CURLOPT_TIMEOUT, 1);        
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-CSRF-TOKEN:".csrf_token()
          ));       
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
          curl_setopt($ch, CURLOPT_FORBID_REUSE, TRUE);        
          curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
          curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);        
          curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);          
          $response = curl_exec($ch);

          $error = curl_error($ch);        
          curl_close($ch);

          return response()->json(['status'=>'success', 'message'=>'', "count" => $total_post_hour['value']-$product]);
    }

    public function checkProduct(Request $request)
    {
        ini_set('max_execution_time', '300');
        
        $input = $request->all();

        sleep(200);

        $check = Product::where("product_id",$input['product_id'])->get()->toArray();

        if(empty($check)) {
            EngageProduct::where("product_id",$input['product_id'])->delete();
        }

        echo "DOne";
    }
}





