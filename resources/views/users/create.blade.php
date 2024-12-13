@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" > -->

                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required  autofocus>
                                    <option value="tenant">Tenant</option>
                                    <option value="supervisor">Supervisor</option>
                                </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Eail field -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- room_no -->

                         <div class="row mb-3">
                            <label for="room_no" class="col-md-4 col-form-label text-md-end">{{ __('Room No') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="room_no" type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ old('room_no') }}" required > -->
                                <select   id="inputRoom_no"name="room_no" class="form-select" aria-label="Default select example">
                                    <option selected>Select Room</option>
                                    @forelse ($rooms as $room)
                                    <option value="{{ $room->room_no }}">{{ $room->room_no }}</option>
                                    @empty
                                    <option value="0">There are no data.</option>
                                    @endforelse
                                </select>
                                @error('room_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 'phone_no' -->

            <div class="row mb-3">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-end">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="tel" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required >

                                @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                             <!-- 'rent_start_date' -->

            <div class="row mb-3">
                            <label for="rent_start_date" class="col-md-4 col-form-label text-md-end">{{ __('Rent Start Date') }}</label>

                            <div class="col-md-6">
                                <input id="rent_start_date" type="date" class="form-control @error('rent_start_date') is-invalid @enderror" name="rent_start_date" value="{{ old('rent_start_date') }}" required >

                                @error('rent_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- 'rent_end_date'  -->

            <div class="row mb-3">
                            <label for="rent_end_date" class="col-md-4 col-form-label text-md-end">{{ __('Rent End Date') }}</label>

                            <div class="col-md-6">
                                <input id="rent_end_date" type="date" class="form-control @error('rent_end_date') is-invalid @enderror" name="rent_end_date" value="{{ old('rent_end_date') }}" required >

                                @error('rent_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <!-- 'about' -->

            <div class="row mb-3">
                            <label for="about" class="col-md-4 col-form-label text-md-end">{{ __('About') }}</label>

                            <div class="col-md-6">
                                <textarea id="about" class="form-control @error('about') is-invalid @enderror" name="about" value="{{ old('about') }}" required > </textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- password field -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
