<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Exception;
use Illuminate\Support\Facades\Session;

class RazorpayPaymentController extends Controller
{
    public function index()
    {
        return view('razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api('rzp_test_y0qsqFcUnrGv21', '65ge5B9LdhGPn3FDQf1D3POY');

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::flash('error', $e->getMessage());
                return redirect()->back();
            }
        }
        return view('pages/payment-success', compact('response'));
        // return redirect()->back();
    }
}
