<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Language;
use App\Network;
use App\Country;
use App\Setting;
use Auth;
use Hash;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;
use Tracker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','Stats','home','upload','privacyPolicy','contactUs','aboutUs','addToCart','termCondition']);
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

    public function home()
    {
        //$visitor = Tracker::currentSession();
        //echo "<pre>"; print_r($visitor); die();
        $products = Product::all();
        $languages = Language::all();

        return view('welcome',compact('products','languages'));
    }

    public function privacyPolicy()
    {
        $privacy = Setting::where("key","privacy_policy")->get()->first();
        return view('privacy-policy',compact('privacy'));
    }

    public function termCondition()
    {
        $term = Setting::where("key","term_condition")->get()->first();
        return view('term-condition',compact('term'));
    }

    public function contactUs()
    {
        $contact = Setting::where("key","contact_us")->get()->first();
        return view('contact-us',compact('contact'));
    }

    public function aboutUs()
    {
        $about = Setting::where("key","about_us")->get()->first();
        return view('about-us',compact('about'));
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

    public function Stats()
    {
        return view("stats");
    }

    public function upload()
    {
        $country = Country::all();
        $network = Network::all();
        $language = Language::all();
        $total_post = Setting::get()->toArray();

        $key = array_search('post_hours', array_column($total_post, 'key'));

        $post = 0;

        if($key !== false) {
            $post = $total_post[$key]['value'];
        }

        $total_product = Product::whereBetween('created_at', [
                now()->format('Y-m-d H:00:00'),
                now()->addHours(1)->format('Y-m-d H:00:00')
            ])->count();
        
        return view("upload",compact('country','network','language','total_product','post'));
    }
    
}
