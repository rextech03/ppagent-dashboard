@extends('layouts.app')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">PPAgent</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('rooms.create') }}"><i class="fa fa-plus"></i> Create New room</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Location</th>
                    <th>Room No</th>
                    <th>Price</th>
                    <!-- <th>Occupant</th> -->
                    <th>Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $room->location }}</td>
                        <td>{{ $room->room_no }}</td>
                        <td>{{ $room->price }}</td>
                        <!-- <td>{{ $room->occupant }}</td> -->
                        <td>{{ $room->description }}</td>
                        <td>
                            <form action="{{ route('rooms.destroy',$room->id) }}" method="POST">
                            @if ( $room->occupant != '1')
                            <a class="btn btn-secondary btn-sm" href="{{ route('users.show',$room->id) }}"><i class="fa fa-list"></i> view occupant</a>
                            @else
                            <p>No Occupant</p>
                            @endif
                               <a class="btn btn-info btn-sm" href="{{ route('rooms.show',$room->id) }}"><i class="fa fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('rooms.edit',$room->id) }}"><i class="fa fa-pen"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $rooms->links() !!}

    </div>
</div>  

@endsection