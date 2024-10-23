@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        
            <div class="py-4"></div>
<!-- Payent/REinder  card -->
        <div class="card text-center">
  <div class="card-header">
   
        <h3 class="nav-link active" href="#">Reminder</h3>
      
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Rent due in 3 days</h5> -->
    <p class="card-text">Pay now or set a reminder.</p>
    <div class="flex">
    <a href="/payments/create" class="btn btn-primary">Pay Now</a>
    <a href="/send_notification" class="btn btn-danger">Send Notification</a>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
     
      <th scope="col">Room no</th>
      <th scope="col">Amount</th>
      <th scope="col">Purpose</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($payments as $payment)
    <tr>
   
      <td>{{ $payment->room_id }}</td>
      <td>{{ $payment->amount }}</td>
      <td>{{ $payment->purpose }}</td>
      <td>{{ $payment->created_at }}</td>
    </tr>
    <tr>
    @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
   
  </tbody>
</table>
{!! $payments->links() !!}

</div>
    </div>
</div>
@endsection
