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
    <h5 class="card-title">Rent due in 3 days</h5>
    <p class="card-text">Pay now or set a reminder.</p>
    <div class="flex">
    <a href="/payments/create" class="btn btn-primary">Pay Now</a>
    <a href="#" class="btn btn-danger">Set Notification</a>
    </div>
  </div>
</div>
@include('pay-table')
</div>
    </div>
</div>
@endsection
