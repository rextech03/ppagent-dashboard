@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Show Suggestions</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('suggestions.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong> <br/>
                    {{ $suggestion->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Email:</strong> <br/>
                    {{ $suggestion->room_no }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Room no:</strong> <br/>
                    {{ $suggestion->room_no }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>contents:</strong> <br/>
                    {{ $suggestion->suggestion }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Images</strong> <br/>
                    <div class="row">
                    @foreach(json_decode($suggestion->photos) as $image)
                    <div class="col-auto zoom">
                    <img src="{{ asset($image) }}" width="424"/>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
@endsection