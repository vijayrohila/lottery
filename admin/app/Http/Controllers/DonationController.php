<?php

namespace App\Http\Controllers;

use App\Donation;
use App\State;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Validator;

class DonationController extends Controller
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
        return view("donation.donation_list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Donation::orderBy('id',"DESC")->get();
        return Datatables::of($users)                        
                    ->addIndexColumn()
                    ->editColumn('trust_name', function($user) {
                        return $user->trust_name;
                    })
                    ->editColumn('state', function($user) {
                        return $user->state;
                    })
                    ->editColumn('country', function($user) {
                        return $user->country;
                    })
                    ->editColumn('date', function($user) {
                        return date("Y-m-d", strtotime($user->date));
                    })
                    ->editColumn('image', function($user) {
                        return '<img src="'.url('/public/donate/'.$user->image).'" width="100px">';
                    })                                                                      
                    ->editColumn('created_at', function($user) {
                        return date("Y-m-d", strtotime($user->created_at));
                    })
                    ->editColumn('action', function($user) {
                        $html = '<button class="btn btn-danger btn-sm delete" id="'.$user->id.'" data-table="donate">Delete</button><a class="btn btn-info btn-sm" href="'.url('/donate/'.$user->id.'/edit').'">Edit</button>';                           
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
                        'trust_name' => 'required|max:100',                                                        
                        'image' => 'required|mimes:jpeg,jpg,png,gif',
                        'amount'=> 'required|numeric',
                        'state'=> 'required',
                        'country'=> 'required',
                        'date'=> 'required|date|date_format:Y-m-d'                      
                    ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            foreach ($errors as $key => $value) {
                return redirect()->back()->with(['status' => 'error', 'error_message' => $value[0]])
                                 ->withInput($request->all());        
            }
        }
                
        $input = $request->all();

        //echo "<pre>"; print_r($input); die();

        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'public/donate';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
            $input['image'] = $file_name;
        } 

        Donation::create($input);

        return redirect("donate")
               ->with(['status' => 'success', 'message' => "Donation added successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation,$id)
    {
        $donation = Donation::find($id);
        $state = State::orderBy("state_name","ASC")->get()->unique('state_code');
        return view("donation.edit_donation",compact('donation','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $validator = Validator::make($request->all(), [                    
                        'trust_name' => 'required|max:100',                                                        
                        'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                        'amount'=> 'required|numeric',
                        'state'=> 'required',
                        'country'=> 'required',
                        'date'=> 'required|date|date_format:Y-m-d'                      
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
            $destinationPath = 'public/donate';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($destinationPath, $file_name);
            $donation->image = $file_name;
        }  

        $donation->trust_name = $input['trust_name'];
        $donation->amount = $input['amount'];
        $donation->state = $input['state'];        
        $donation->country = $input['country'];        
        $donation->date = $input['date'];        
        $donation->save();

        return redirect("donate")
               ->with(['status' => 'success', 'message' => "Donation updated successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation,$id)
    {
        Donation::find($id)->delete();
        return response()->json(['status' => 'success', 'message' => "Donation deleted successfully!"]);
    }

    public function addDonation(Request $request)
    {
       $state = State::orderBy("state_name","ASC")->get()->unique('state_code');
       return view("donation.add_donation",compact('state'));
    }

    public function districtList($id)
    {
        $state = State::where("state_code",$id)->get();
        return $state;
    }
}
