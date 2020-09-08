<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;

class AdminController extends Controller
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function changePassword(Request $request)
    {
        return view("change-password.change-password");
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
        $current_password = Auth::User()->password;    

        if(Hash::check($request_data['old_password'], $current_password))
        {           
            $user_id = Auth::User()->id;                       
            $obj_user = Admin::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save(); 
            return redirect()->back()->with(['status' => 'sucess', 'message' => "Your password updated successfully"]); 
        }
        else
        {           
            return redirect()->back()->with(['status' => 'error', 'error_message' => "Please enter correct current password"]); 
        }
    }
}
