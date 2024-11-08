@extends('layouts.app')


@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Suggestion</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('suggestions.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form class="dropzone overflow-visible p-4" id="formDropzone" action="{{ route('suggestions.store') }}" method="POST" enctype="multipart/form-data">
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
                name="images[]" 
                id="photos" 
                placeholder="Upload photos"
                multiple
                 />
                 <!-- <input name="images[]" class="form-control" type="file" multiple /> -->

                 <!-- <div class="form-group mb-4">
                <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                <div class="dropzone-drag-area form-control" id="previews">
                    <div class="dz-message text-muted opacity-50" data-dz-message>
                        <span>Drag file here to upload</span>
                    </div>    
                    <div class="d-none" id="dzPreviewContainer">
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-photo">
                                <img class="dz-thumbnail" data-dz-thumbnail>
                            </div>
                            <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="invalid-feedback fw-bold">Please upload an image.</div>
            </div> -->
               
                @error('photos')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

    </div>
</div>


@endsection