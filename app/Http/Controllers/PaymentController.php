<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

use Illuminate\Support\Facades\Redirect;
use Paystack;

use Illuminate\Support\Facades\Auth;




class PaymentController extends Controller
{

    public function paymentVerification(StorePaymentRequest $request)
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

      
        Payment::create([
            'reference' => $ref,
            'tenant_id' => Auth::id(),
            'amount' => $amount,
            'purpose' =>  $result->data->metadata->purpose,
            'room_id' => $result->data->metadata->room_id,
            'payment_status' => "Paid",
            'status' => "confirmed",
        ]);
        
    //    dd($result->data->metadata->purpose);
        return redirect('payments');

    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payments = Payment::latest()->paginate(5);

        return view('payments.index', compact('payments')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);;
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
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
          'email' => Auth::user()->email,
          'amount' => $request['amount'] * 100,
          'callback_url' => "http://127.0.0.1:8000/payment-verification",
          'metadata' => [
            "room_id" => Auth::user()->room_no,
            "purpose" => $request['purpose'],
            "cancel_action" => "http://127.0.0.1:8000/pay"]
        ];
      
        $fields_string = http_build_query($fields);
      
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer sk_test_c5adadff66894219fad4623b3372522e23b350dd",
          "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        // echo $result;
        $tranx = json_decode($result);
        return redirect($tranx->data->authorization_url);

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
