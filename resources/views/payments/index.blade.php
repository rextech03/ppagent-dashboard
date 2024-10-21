@extends('layouts.app')

@section('content')

<div>
@if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('payments.create') }}"><i class="fa fa-plus"></i> New payments</a>
        </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Room no</th>
      <th scope="col">Amount</th>
      <th scope="col">Purpose</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($payments as $payment)
    <tr>
      <th scope="row">{{ ++$i }}</th>
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
@endsection