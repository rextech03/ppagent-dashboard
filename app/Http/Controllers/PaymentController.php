<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

use Illuminate\Support\Facades\Redirect;
use Paystack;





class PaymentController extends Controller
{

    public function paymentVerification(Request $request)
    {
        $ref = $request->input('reference');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_c5adadff66894219fad4623b3372522e23b350dd",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        //execute post
        $result = json_decode(curl_exec($curl));
        if ($result->data->status != 'success') {
            return (new GeneralController)->apiResponse(false, $result->message, null);
        }
        $amount = ($result->data->amount / 100);
        //check for amount 
        // $room = Room::where('id', $request->room_id)->first();

        // if ($room->amount != $amount) {
        //     return (new GeneralController)->apiResponse(false, "Partial payment", null);
        // }

        //user check  
        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     $user = new User();
        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     $user->phone = $request->phone;
        //     // $user->password = Hash::make('12345678');
        //     $user->save();
        // }

       
        $payment = new Payment();
        // $bookings->user_id = $user->id;
        $payment->room_id = $request->room_id;
        // $bookings->check_in = Carbon::parse($request->checkin_date);
        // $bookings->check_out = Carbon::parse($request->checkout_date);
        $payment->payment_status = "Paid";
        $payment->status = "confirmed";
        
        $payment->save();
        
        // $newBookings = Booking::where('id', $bookings->id)->with('room', 'user')->first();
        // $sendMail = (new EmailController)->confirmBooking($newBookings);
        // if (!$sendMail->status) {
        //     return $sendMail;
        // }
        return response()->json(['message' => 'Booking was successful! please check your email for the qr code ', "status" => true]);


        // $data = ['result' => $result->data, 'user' => $user];
        // return (new GeneralController)->apiResponse(true, '', $data);
    }
    public function redirectToGateway()
    {
        //
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }
    public function handleGatewayCallback()
    {
        //
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          

        return view('pay');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
        //This generates a payment reference


        

    // $payload = [
    //     "tx_ref" => Flutterwave::generateTransactionReference(),
    //     "amount" => 100,
    //     "currency" => Currency::NGN,
    //     "customer" => [
    //         "email" => "developers@flutterwavego.com"
    //     ],
    // ];

    // $payment_details = Flutterwave::render('inline', $payload);

    // return view('flutterwave::modal', compact('payment_details'));




    // new section



    //  $payload = [
    //     'card_number' => '646547658',
    //     'cvv' => '324',
    //     'expiry_month' => '02',
    //     'expiry_year' => '24',
    //     'currency' => 'NGN',
    //     'amount' => '2344',
    //     'email' => 'ark@gail.co',
    //     'fullname' => 'ark ogujiuba',
    //     'tx_ref' => 'jkjjhjhj',
    //     'redirect_url' => url('/pay/redirect'),
    // ];

    // $response = $cardChargeService->chargeCard($payload);
    // switch ($response['meta']['authorization']['mode'] ?? null) {
    //     case 'pin':
    //     case 'avs_noauth':
    //         // Store the current payload
    //         Session::put('charge_payload', $payload);
    //         // Now we'll show the user a form to enter
    //         // the requested fields (PIN or billing details)
    //         Session::put('auth_fields', $response['meta']['authorization']['fields']);
    //         Session::put('auth_mode', $response['meta']['authorization']['mode']);
    //         return redirect('/pay/authorize');
    //     case 'redirect':
    //         // Store the transaction ID
    //         // so we can look it up later with the flw_ref
    //         Redis::set("txref-{$response['data']['tx_ref']}", $response['data']['id']);
    //         // Auth type is redirect,
    //         // so just redirect to the customer's bank
    //         $authUrl = $response['meta']['authorization']['redirect'];
    //         return redirect($authUrl);
    //     default:
    //         // No authorization needed; just verify the payment
    //         $transactionId = $response['data']['id'];
    //         $transaction = $cardChargeService->verifyTransaction($transactionId);
    //         if ($transaction['data']['status'] == "successful") {
    //             return redirect('/payment-successful');
    //         } else if ($transaction['data']['status'] == "pending") {
    //             // Schedule a job that polls for the status of the payment every 10 minutes
    //             dispatch(new CheckTransactionStatus($transactionId));
    //             return redirect('/payment-processing');
    //         } else {
    //             return redirect('/payment-failed');
    //         }
    //     }

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
