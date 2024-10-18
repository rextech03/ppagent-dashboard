@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Suggestion</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('suggestions.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('suggestions.update',$suggestion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ $suggestion->name }}"
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRoom_no" class="form-label"><strong>Email:</strong></label>
                <input 
                    type="number" 
                    name="room_no" 
                    value="{{ $suggestion->room_no }}"
                    class="form-control @error('room_no') is-invalid @enderror" 
                    id="inputRoom_no" 
                    placeholder="100">
                @error('room_no')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ $suggestion->email }}"
                    class="form-control @error('email') is-invalid @enderror" 
                    id="inputEmail" 
                    placeholder="email">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="suggestion" class="form-label"><strong>Suggestion:</strong></label>
                <textarea 
                    class="form-control @error('suggestion') is-invalid @enderror" 
                    style="height:150px" 
                    name="suggestion" 
                    id="suggestion" 
                    placeholder="content">{{ $suggestion->suggestion }}</textarea>
                @error('suggestion')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>
@endsection