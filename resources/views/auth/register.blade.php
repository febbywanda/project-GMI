@extends('layouts.app')
@section('title', 'Register')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4 mt-3">
          <img src="{{asset('admin/img/logohitam.png')}}" alt="">
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-5">
          <form method="POST" action="{{ route('register') }}" style="width: 23rem;">
            @csrf
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

            <div class="form-outline mb-4">
              <label class="form-label" for="name">{{ __('Nama') }}</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="email">{{ __('Email Address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="register" value="register" id="register">Register</button>
            </div>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="{{asset('pages/images/gmihome.png')}}"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
@endsection
