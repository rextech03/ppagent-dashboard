@extends('layouts.app')


@section('content')
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a Location</h3>
      <form action="{{ route('locations.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="hostel_location">Location</label>
          <input type="text" class="form-control" id="hostel_location" name="hostel_location" required>
        </div>
        
        <div class="form-group mt-3">
          <label for="hostel_location">Assign a Supervisor</label>
        <select   id="inputSupervisor" name="supervisor" class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            @forelse ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @empty
            <option value="0">There are no data.</option>
            @endforelse
        </select>
</div>

        <br>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
    </div>
  </div>
</div>

@endsection