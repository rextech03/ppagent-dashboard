@extends('layouts.app')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">PPAgent</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('suggestions.create') }}"><i class="fa fa-plus"></i> Create New Suggestion</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Room No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Suggestion</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($suggestions as $suggestion)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $suggestion->room_no }}</td>
                        <td>{{ $suggestion->name }}</td>
                        <td>{{ $suggestion->email }}</td>
                        <td>{{ $suggestion->suggestion }}</td>
                        <td>
                            <form action="{{ route('suggestions.destroy',$suggestion->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('suggestions.show',$suggestion->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('suggestions.edit',$suggestion->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $suggestions->links() !!}

    </div>
</div>  

@endsection