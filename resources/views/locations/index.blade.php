@extends('layouts.app')


@section('content')
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('locations.index') }}>Locations</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('locations.create') }}>Add Location</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      @foreach ($locations as $location)
        <div class="col-sm">
          <div class="card">
            
            <div class="card-body">
              <p class="card-text">{{ $location->hostel_location }}</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('locations.edit', $location->id) }}"
            class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col-sm">
                  <a href="{{ route('locations.show', $location->id) }}"
            class="btn btn-primary btn-sm">Details</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('locations.destroy', $location->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection