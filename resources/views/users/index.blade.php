@extends('layouts.app')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Users </h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Room No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Start Date</th>
                    <th>Possible End Date</th>
                    <th>About</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->room_no }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rent_start_date }}</td>
                        <td>{{ $user->rent_end_date }}</td>
                        <td>{{ $user->about }}</td>
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $users->links() !!}

    </div>
</div>

@endsection