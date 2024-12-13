@extends('layouts.app')


@section('content')

    <div>
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong> <br/>
                    {{ $location->hostel_location }}
                </div>

                <div class="form-group">
                    <strong>Room Supervisor Name:</strong> <br/>
                    {{ $supervisor->name }}
                </div>

                <div class="form-group">
                    <strong>Room Supervisor Email:</strong> <br/>
                    {{ $supervisor->email }}
                </div>

                <div class="form-group">
                    <strong>Room Supervisor Phone:</strong> <br/>
                    {{ $supervisor->phone_no }}
                </div>
    </div>
@endsection