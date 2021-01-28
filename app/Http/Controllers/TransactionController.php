<?php

namespace App\Http\Controllers;

use App\Transaction;
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
    public function payment(Request $resuest)
    {
        //Input items of form
        $input = $resuest->all();
        //echo "<pre>"; print_r($input); die();
        //get API Configuration 
        $api = new Api(env('ROZOR_KEY'), env('ROZOR_SECRET') );
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $cartCollection = \Cart::getContent();

                $insert = [];

                foreach ($cartCollection as $key => $item) {

                    $insert[] = array(
                                "user_id"     => Auth::user()->id,
                                "product_id"  => $item->id,
                                "transaction" => $input['razorpay_payment_id'],
                                "price"       => 1,
                                "created_at" => date("Y-m-d h:i:s"),
                                "updated_at" => date("Y-m-d h:i:s"),
                            );
                }

                Winner::insert($insert);

                \Cart::clear();

                return redirect()->back()->with(["status"=>"success","message"=>"Payment successfully"]);

            } catch (\Exception $e) {
                return redirect()->back()->with(["status"=>"error","error_message"=>$e->getMessage()]);
            }

            // Do something here for store payment details in database...
        }
        
        return redirect()->back()->with(["status"=>"success","message"=>"Payment successfully"]);
    }
}
