@extends('layouts.app')

@section('content')


<form method="POST" action="{{ route('payments.store') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    @csrf
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Enter Amount to pay
                </div>
            </p>
            <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="number" class="form-control" name="amount" value="80000"> {{-- required in kobo --}}
            <br>
            <input type="text" class="form-control" name="purpose" value="rent">
            <p> rent or dues</p>
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

            <p>
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                </button>
            </p>
        </div>
    </div>
</form>

@endsection