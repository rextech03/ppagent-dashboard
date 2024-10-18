@extends('layouts.app')

@section('content')

<!-- <form class=""> -->
<input class='form-control' type="number" name="amount" id="amount" placeholder="amount">
<input class='form-control' type="email" name="email" id="email" placeholder="email">
<input class='form-control' type="text" name="name" id="name" placeholder="name">
<input class='form-control' type="tel" name="phone" id="phone" placeholder="phone">
<input class='form-control' type="number" name="room_id" id="room_id" placeholder="room_id">
<a class="btn btn-secondary" onclick="paystackPay()">Pay now</a>
<!-- </form> -->




@endsection