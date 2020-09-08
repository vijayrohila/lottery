<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;
use yajra\Datatables\Datatables;
use Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("product.product_list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Product::orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('title', function($user) {
                            return $user->name;
                        })
                        ->editColumn('price', function($user) {
                            return $user->cost;
                        })
                        ->editColumn('product_id', function($user) {
                            return $user->product_id;
                        })
                        ->editColumn('start', function($user) {
                            return date("Y-m-d", strtotime($user->start));
                        })
                        ->editColumn('end', function($user) {
                            return date("Y-m-d", strtotime($user->end));
                        })
                        ->editColumn('image', function($user) {
                            return '<img src="'.url('/public/product/'.$user->image).'" width="100px">';
                        })                                                                      
                        ->editColumn('created_at', function($user) {
                            return date("Y-m-d", strtotime($user->created_at));
                        })
                        ->editColumn('action', function($user) {
                            $html = '<button class="btn btn-danger btn-sm delete" id="'.$user->id.'" data-table="product">Delete</button><a class="btn btn-info btn-sm" href="'.url('/product/'.$user->id.'/edit').'">Edit</button>';                           
                            return $html;                            
                        })->rawColumns(['action', 'image'])->make(true);
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
                        'name' => 'required|max:200',                                                        
                        'image' => 'required|mimes:jpeg,jpg,png,gif',
                        'cost'=> 'required',
                        'product_id'=> 'required|unique:products',
                        'start'=> 'required|date|date_format:Y-m-d|before:end|after:today',
                        'end'=> 'required|date|date_format:Y-m-d|after:start',
                    ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                                 ->withInput($request->all());        
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

        Product::create($input);

        return redirect("product")
               ->with(['status' => 'success', 'message' => "Product added successfully!"]);
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
        //$product = Product::findOrfail($id);   
        return view("product.edit_product",compact('product'));
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
       $validator = Validator::make($request->all(), [                   
                        'name' => 'required|max:200',                                                        
                        'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                        'cost'=> 'required',
                        'product_id'=> 'required',
                        'start'=> 'required|date|date_format:Y-m-d|before:end|after:today',
                        'end'=> 'required|date|date_format:Y-m-d|after:start',
                    ]);
        

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                                 ->withInput($request->all());        
            }
        }
                
        $input = $request->all();

        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'public/product';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
            $product->image = $file_name;
        }  

        $product->name = $input['name'];
        $product->cost = $input['cost'];
        $product->start = $input['start'];        
        $product->end = $input['end'];   
        //echo "<pre>"; print_r($product); die();

        $product->save();

        return redirect("product")
               ->with(['status' => 'success', 'message' => "Product updated successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['status' => 'success', 'message' => "Product deleted successfully!"]);
    }

    public function addView(Request $request)
    {
        return view("product.add_product");
    }


}
