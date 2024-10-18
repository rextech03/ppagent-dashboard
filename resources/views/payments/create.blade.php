@extends('layouts.app')

@section('content')

<div>
    <h4 class="text-3xl">Pay with Card</h4>
</div>
<!-- <form action="{{ route('payments.store') }}" method="post"> -->

<form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
    @csrf
  <div>
    Pay in full or pay in part. Enter amount to pay.
  </div>
  <input type="hidden" name="public_key" value="FLWPUBK_TEST-02b9b5fc6406bd4a41c3ff141cc45e93-X" />
  <input type="hidden" name="customer[email]" value="test@mailnator.com" />
  <input type="hidden" name="customer[name]" value="Ayomide Jimi-Oni" />
  <input type="hidden" name="tx_ref" value="txref-81123" />
  <input type="number" class="form-control" name="amount" placeholder="2000" required/>
  <input type="hidden" name="currency" value="NGN" />
  <input type="hidden" name="meta[token]" value="54" />
<input type="hidden" name="configurations[session_duration]" value="10" /> 
<input type="hidden" name="configurations[max_retry_attempt]" value="5" /> 

  <input type="hidden" name="meta[source]" value="docs-html-test" />

  <br>

<!-- 
    <input type="hidden" name="redirect_url" value="http://127.0.0.1:8000/payment" />
 -->

  <button type="submit" class="btn btn-primary" id="start-payment-button">Pay Now</button>
</form>



@endsection