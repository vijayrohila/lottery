<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Product;
use App\Winner;
use App\Donation;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function statistic()
    {
        return view("statistic.statistic");
    }

    public function livePlayer()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');
        $products = Product::with(["batting","batting.user","winner.user"])
                            ->whereDate("start","<=",date("Y-m-d"))
                            ->whereDate("end",">=",date("Y-m-d"))
                            ->get()->toArray();

        //echo "<pre>"; print_r($products); die();
        return view("statistic.live_player",compact('products'));
    }

    public function clickLottery($weekStartDate,$weekEndDate)
    {
        $products = Product::with(["batting","batting.user","winner.user"])
                            ->whereDate("start",">=",$weekStartDate)
                            ->whereDate("end","<=",$weekEndDate)
                            ->get()->toArray();

        //echo "<pre>"; print_r($products); die();
        return view("statistic.click_player",compact('products'));
    }

    public function calculation()
    {
        $product = Product::all()->sum("cost");
        $income = Winner::all()->count();
        $donation = Donation::all()->sum('amount');
        return view("calculation.calculation",compact('product','income','donation'));
    }

    public function searchCalculation(Request $request)
    {
        $validator = Validator::make($request->all(), [                    
                        'start_date'=> 'required|date|date_format:Y-m-d|before:end_date',
                        'end_date'=> 'required|date|date_format:Y-m-d|after:start_date',
                    ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return response()->json(['status' => 'error', 'message' => $value[0], "result" => []]);      
            }
        }
                
        $input = $request->all();

        $product = Product::whereDate("start",">=",$input['start_date'])
                            ->whereDate("end","<=",$input['end_date'])
                            ->sum("cost");
        $income = Winner::whereDate("created_at",">=",$input['start_date'])
                            ->whereDate("created_at","<=",$input['end_date'])
                            ->count();
        $donation = Donation::whereDate("date",">=",$input['start_date'])
                            ->whereDate("date","<=",$input['end_date'])
                            ->sum('amount');
        
        $balance = $income-$donation;
        $html = "<tr><td>".$income."</td><td>".$product."</td><td>".$donation."</td><td>".$balance."</td></tr> ";

        return response()->json(['status' => 'success', 'message' => '', "data" => $html]); 
    }
}
