@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Show Room Details</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('rooms.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong> <br/>
                    {{ $room->location }}
                </div>

                <div class="form-group">
                    <strong>Room number:</strong> <br/>
                    {{ $room->room_no }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong> <br/>
                    {{ $room->description }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection