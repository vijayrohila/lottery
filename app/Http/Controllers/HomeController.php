<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;
use App\Winner;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','districtList','privacyPolicy','contactUs','aboutUs','addToCart']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function districtList($id)
    {
        $state = State::where("state_code",$id)->get();
        return $state;
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termCondition()
    {
        return view('term-condition');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function profile()
    {
        $user = Auth::user();
        $referal = User::where("referal_code",$user->user_id)->count();
        $state = State::orderBy("state_name","ASC")->get()->unique('state_code');
        $district = State::where("state_name",Auth::user()->state)->orderBy("district_name","ASC")->get();
        return view('profile',compact('state','district','user','referal'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
                            'first_name' => ['required', 'string', 'max:50'],
                            'last_name' => ['required', 'string', 'max:50'],
                            //'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
                            'address' => ['required', 'string', 'max:150'],            
                            'country' => ['required'],            
                            'state' => ['required'],            
                            'district' => ['required'],            
                            'pincode' => ['required','numeric'],            
                            'phone' => ['required','numeric']           
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                                 ->withInput($request->all());        
            }
        }
                
        $input = $request->all();
        $user = User::find(Auth::user()->id);
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->address = $input['address'];
        $user->country = $input['country'];
        $user->state = $input['state'];
        $user->district = $input['district'];
        $user->pincode = $input['pincode'];
        $user->phone = $input['phone'];
        $user->save();

        return redirect()->back()->with(['status' => 'success', 'message' => "Profile updated successfully!"]);
    }

    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'id' => ['required','exists:products']                                     
                ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return response()->json(['status'=>'error', 'error_message'=>$value[0]]);
            }
        }

        $user = Auth::user();
        $user->product()->sync([$request->id]);
        return response()->json(["status"=>"success","message"=>"Add to cart successfully"]);
    }

    public function changePassword(Request $request)
    {
        return view("change-password");
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [                   
                        'password' => ['required', 'string', 'min:8', 'confirmed'],         
                        'old_password' => ['required', 'string', 'min:8']        
                    ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                        ->withInput($request->all());        
            }
        }
                
        $request_data = $request->all();
        $current_password = Auth::user()->password;    

        if(Hash::check($request_data['old_password'], $current_password))
        {           
            $obj_user = Auth::user();                       
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save(); 
            return redirect()->back()->with(['status' => 'sucess', 'message' => "Your password updated successfully"]); 
        }
        else
        {           
            return redirect()->back()->with(['status' => 'error', 'error_message' => "Please enter correct current password"]); 
        }
    }

    public function userBat()
    {
        $users = Winner::where("user_id",Auth::user()->id)->orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                        ->addIndexColumn()
                        ->editColumn('image', function($user) {
                            return '<img src="'.url('/admin/public/product/'.$user->product->image).'" width="100px">';
                        })  
                        ->editColumn('product_id', function($user) {
                            return isset($user->product)?$user->product->product_id:"";
                        }) 
                        ->editColumn('amount', function($user) {
                            return $user->price;
                        }) 
                        ->editColumn('position', function($user) {
                            return $user->position;
                        })                                             
                        ->editColumn('date', function($user) {
                            return date("d-m-Y", strtotime($user->created_at));
                        })
                        ->rawColumns(['image'])->make(true);
    }

    public function userWinner()
    {
        $users = Winner::whereNotIn("position",["pending","lost"])
                        ->where("user_id",Auth::user()->id)
                        ->orderBy('id',"DESC")->get();
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
                            return $user->price;
                        }) 
                        ->editColumn('position', function($user) {
                            return $user->position;
                        })                                             
                        ->editColumn('date', function($user) {
                            return date("d-m-Y", strtotime($user->created_at));
                        })
                        ->editColumn('action', function($user) {
                            $html = '<button class="btn btn-danger btn-sm delete" id="'.$user->id.'" data-table="winner">Delete</button>';                           
                            return $html;                            
                        })->rawColumns(['action', 'image'])->make(true);
    }
    
}
