<?php

namespace App\Http\Controllers;

use App\Winner;
use App\Product;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Validator;

class WinnerController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("winner");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Winner::whereNotIn("position",["pending","lost"])->orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('user_id', function($user) {
                            return isset($user->user)?$user->user->user_id:"";
                        })
                        ->editColumn('product_name', function($user) {
                            return isset($user->product)?$user->product->name:"";
                        })
                        ->editColumn('image', function($user) {
                            return '<img src="'.url('/admin/public/product/'.$user->product->image).'" width="100px">';
                        })  
                        ->editColumn('product_id', function($user) {
                            return isset($user->product)?$user->product->product_id:"";
                        }) 
                        ->editColumn('amount', function($user) {
                            return $user->product->cost;
                        }) 
                        ->editColumn('position', function($user) {
                            if($user->position == "HR"){
                                return "Highest Referrals";
                            } else if($user->position == "RP"){
                                return "Regular Player";
                            } else {
                                return "Winner ".$user->position;
                            }
                        })                                             
                        ->editColumn('date', function($user) {
                            return date("d-m-Y", strtotime($user->created_at));
                        })
                        ->editColumn('action', function($user) {
                            $html = '<button class="btn btn-danger btn-sm delete" id="'.$user->id.'" data-table="winner">Delete</button>';                           
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function show(Winner $winner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function edit(Winner $winner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Winner $winner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Winner $winner)
    {
        $winner->delete();
        return response()->json(['status' => 'success', 'message' => "Winner deleted successfully!"]);
    }

    public function lottery(Request $request)
    {
        $validator = Validator::make($request->all(), [                    
                        'position' => 'required',                                                        
                        'user'=> 'required',
                    ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                                 ->withInput($request->all());        
            }
        }
                
        $input = $request->all();

        $winner = Winner::find($input['user']);
        $winner->position = $input['position'];
        $winner->save();

        //print_r($winner); die();
        return redirect()->back()
                ->with(['status' => 'sucess', 'message' => "Winner selected successfully!!"]); 

    }

    public function statisticCreate()
    {
        $users = Product::distinct('start')->orderBy('start',"DESC")->get();
        return Datatables::of($users)                        
                ->addIndexColumn()                                                             
                ->editColumn('from_date', function($user) {
                    return date("Y-m-d", strtotime($user->start));
                })
                ->editColumn('to_date', function($user) {
                    return date("Y-m-d", strtotime($user->end));
                })
                ->editColumn('action', function($user) {
                    $html = '<a href="'.url('/click-lottery/'.$user->start.'/'.$user->end).'"  class="btn btn-info btn-sm">Click Here</a>';                           
                    return $html;                            
                })->rawColumns(['action'])->make(true);
    }
}
