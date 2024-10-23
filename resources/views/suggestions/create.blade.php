@extends('layouts.app')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Suggestion</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('suggestions.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('suggestions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
                <input 
                    type="text" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="inputEmail" 
                    placeholder="Email">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRoom_no" class="form-label"><strong>Room no:</strong></label>
                <input 
                    type="number" 
                    name="room_no" 
                    class="form-control @error('room_no') is-invalid @enderror" 
                    id="inputRoom_no" 
                    placeholder="100">
                @error('room_no')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputsuggestion" class="form-label"><strong>Suggestion:</strong></label>
                <textarea 
                    class="form-control @error('suggestion') is-invalid @enderror" 
                    style="height:150px" 
                    name="suggestion" 
                    id="suggestion" 
                    placeholder="Write a suggestion or complaints"></textarea>
                @error('suggestion')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photos" class="form-label"><strong>Upload Photos:</strong></label>
                <input 
                type="file" 
                class="form-control" 
                name="photos" 
                id="photos" 
                placeholder="Upload photos"
                multiple
                 />
               
                @error('photos')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>


@endsection