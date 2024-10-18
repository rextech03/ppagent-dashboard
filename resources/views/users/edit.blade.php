@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit user</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ $user->name }}"
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRoom_no" class="form-label"><strong>Room no:</strong></label>
                <input 
                    type="number" 
                    name="room_no" 
                    value="{{ $user->room_no }}"
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
                    value="{{ $user->email }}"
                    class="form-control @error('email') is-invalid @enderror" 
                    id="inputEmail" 
                    placeholder="email">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user" class="form-label"><strong>user:</strong></label>
                <textarea 
                    class="form-control @error('user') is-invalid @enderror" 
                    style="height:150px" 
                    name="user" 
                    id="user" 
                    placeholder="content">{{ $user->about }}</textarea>
                @error('user')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>

    </div>
</div>
@endsection