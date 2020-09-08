<?php

namespace App\Http\Controllers;

use App\User;
use App\Winner;
use Illuminate\Http\Request;
use Auth;
use yajra\Datatables\Datatables;
use Validator;

class UserController extends Controller
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
        return view("user.user_list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('name', function($user) {
                            return $user->first_name.' '.$user->last_name;
                        })
                        ->editColumn('email', function($user) {
                            return $user->email;
                        })
                        ->editColumn('image', function($user) {
                            return $user->user_id;
                        })  
                        ->editColumn('contact', function($user) {
                            return $user->phone;
                        })
                        ->editColumn('hr', function($user) {
                            return $user->referal->count();
                        })
                        ->editColumn('rp', function($user) {
                            return $user->product->count();
                        })                                             
                        ->editColumn('created_at', function($user) {
                            return date("Y-m-d", strtotime($user->created_at));
                        })
                        ->editColumn('action', function($user) {
                            $html = '<button class="btn btn-danger btn-sm delete" id="'.$user->id.'" data-table="user">Delete</button><a href="'.url("/user/".$user->id.'/edit/').'" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>';                           
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("user.edit_user",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => 'success', 'message' => "User deleted successfully!"]);
    }

    public function userBat($id)
    {
        $users = Winner::where("user_id",$id)->orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('image', function($user) {
                            return '<img src="'.url('public/product/'.$user->product->image).'" width="100px">';
                        })  
                        ->editColumn('product_id', function($user) {
                            return isset($user->product)?$user->product->product_id:"";
                        }) 
                        ->editColumn('amount', function($user) {
                            return $user->price;
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
                        ->rawColumns(['image'])->make(true);
    }

    public function userWinner($id)
    {
        $users = Winner::whereNotIn("position",["pending","lost"])
                        ->where("user_id",$id)
                        ->orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('image', function($user) {
                            return '<img src="'.url('public/product/'.$user->product->image).'" width="100px">';
                        })  
                        ->editColumn('product_id', function($user) {
                            return isset($user->product)?$user->product->product_id:"";
                        }) 
                        ->editColumn('amount', function($user) {
                            return $user->price;
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
                        ->rawColumns(['image'])->make(true);
    }
}
