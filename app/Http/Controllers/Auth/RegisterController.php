<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\State;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:9', 'confirmed'],
            'address' => ['required', 'string', 'max:150'],            
            'country' => ['required'],            
            'state' => ['required'],            
            'district' => ['required'],            
            'pincode' => ['required','numeric'],            
            'phone' => ['required','numeric'],            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['user_id'] = 'LHUI'.strtoupper(uniqid());
        $user =  User::create($data);
        return $user;
    }

    public function showRegistrationForm(Request $request)
    {
        $referal_id = $request->id;
        $state = State::orderBy("state_name","ASC")->get()->unique('state_code');
        return view('auth.register',compact('state','referal_id'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        //return $this->registered($request, $user)?: redirect($this->redirectPath());

        //Mail::to($user->email)->send(new ConfirmationEmail($user));

       // $user->sendEmailVerificationNotification();

        return redirect()->back()->with(['status' => 'success', 'message' => "Sign Up successfully!!"]);
    }
}
