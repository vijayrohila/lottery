<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        //Input items of form
        $input = $request->all();
        //echo "<pre>"; print_r($input); die();
        //get API Configuration 
        $api = new Api(env('ROZOR_KEY'), env('ROZOR_SECRET') );
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));                

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
                $input['currency'] = $payment['currency'];
                $input['cost'] = $payment['amount']/100;
                $input['payment_id'] = $input['razorpay_payment_id'];

                Product::create($input);                             

                return redirect()->back()->with(["status"=>"success","message"=>"Payment successfully"]);

            } catch (\Exception $e) {
                return redirect()->back()->with(["status"=>"error","error_message"=>$e->getMessage()]);
            }

            // Do something here for store payment details in database...
        }
        
        return redirect()->back()->with(["status"=>"success","message"=>"Payment successfully"]);
    }
}
