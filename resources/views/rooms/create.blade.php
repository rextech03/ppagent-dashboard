@extends('layouts.app')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Room  </h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-between">
            <a class="btn btn-primary btn-sm" href="{{ route('locations.create') }}"><i class="fa fa-home"></i> Create Location</a>
            <a class="btn btn-primary btn-sm" href="{{ route('rooms.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf

           
            <div class="mb-3">
                <label for="inputLocation" class="form-label"><strong>Location:</strong></label>
               
                <select   id="inputLocation" name="location" class="form-select @error('location') is-invalid @enderror" aria-label="select location">
            <option selected>Select a location</option>
            @forelse ($locations as $inputLocation)
            <option value="{{ $inputLocation->hostel_location }}">{{ $inputLocation->hostel_location }}</option>
            @empty
            <option value="0">There are no data.</option>
            @endforelse
        </select>
        @error('location')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPrice" class="form-label"><strong>Price:</strong></label>
                <input 
                    type="number" 
                    name="price" 
                    class="form-control @error('price') is-invalid @enderror" 
                    id="inputPrice" 
                    placeholder="price">
                @error('price')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDue" class="form-label"><strong>Dues:</strong></label>
                <input 
                    type="number" 
                    name="dues" 
                    class="form-control @error('dues') is-invalid @enderror" 
                    id="inputDue" 
                    placeholder="dues">
                @error('dues')
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
                <label for="inputDescription" class="form-label"><strong>Description:</strong></label>
                <textarea 
                    class="form-control @error('description') is-invalid @enderror" 
                    style="height:150px" 
                    name="description" 
                    id="inputDescription" 
                    placeholder="Describe the room"></textarea>
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>
@endsection