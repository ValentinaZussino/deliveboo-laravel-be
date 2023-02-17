<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\PaymentRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        // dd($gateway->clientToken()->generate());
        $clientToken = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'client_token' => $clientToken
        ];
        return response()->json($data,200);
    }

    public function sendPayment(PaymentRequest $paymentRequest, Gateway $gateway){
        $order = Order::latest('id')->first();
        $restaurantId = $order->restaurant_id;
        $restaurantEmail = DB::table('restaurants')->where('id', $restaurantId)->value('email');
        $result = $gateway->transaction()->sale([
            'amount' => $paymentRequest->amount,
            'paymentMethodNonce' => $paymentRequest->payment_method_nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        if($result->success){
            $mail = new NewOrder($order);
            Mail::to($order->email)
                ->cc($restaurantEmail)
                ->send($mail);
            $data = [
                'success' => true,
                'message' => 'Payment Succeeded',
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => 'Transaction Failed',
            ];
            return response()->json($data,401);
        }
        // return 'sendPayment';
    }
}
