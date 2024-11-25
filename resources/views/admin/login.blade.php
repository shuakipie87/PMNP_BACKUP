@extends('admin.layouts.form')

@section('content')

<div class="text-center">
    <img src="{{ asset('assets/img/logo-login.png') }}" alt="logo" />
    <!-- <h4 class="mt-1 mb-5 pb-1">PMNP - Sign In</h4> -->
</div>

@if ($errors->any())
    @foreach ($errors->all() as $error) @endforeach
@endif

<form method="POST" action="{{ route('login') }}" class="register needs-validation login" autocomplete="off">

    @method('POST')
    @csrf

    <div class="login-title text-center pt-1 pb-5">
        <p class="">Please sign in to continue</p>
    </div>

    <div class="form-input form-input-customize mb-3">
        <label class="sr-only" for="inlineFormInputGroup">Email</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
            </div>
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'error-validate' : null }}" id="inlineFormInputGroup" placeholder="Email" value="{{ old('email', '') }}" required/>
        </div>
        @if($errors->has('email'))
            <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="form-input form-input-customize">
        <label class="sr-only" for="inlineFormInputGroup">Password</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
            </div>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'error-validate' : null }}" id="inlineFormInputGroup" placeholder="Password" value="{{ old('email', '') }}" required/>
        </div>
        @if($errors->has('password'))
            <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <div class="text-right pt-1 pb-5">
        <a class="text-muted" href="{{ route('forgot-password') }}">Forgot password?</a>
    </div>

    <!-- <div data-mdb-input-init class="form-outline mb-4">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" name="remember" value="1" class="custom-control-input" id="customCheck"  @if (old('remember') == 1) checked="checked" @endif />
            <label class="custom-control-label" for="customCheck">
                Remember Me
            </label>
        </div>
        @if($errors->has('remember'))
            <div class="mt-2 alert alert-danger">{{ $errors->first('remember') }}</div>
        @endif
    </div> -->

    <div class="text-center pt-1 mb-5 pb-1">
        <input type="submit" value="Login" class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
    </div>

    <div class="d-flex align-items-center justify-content-center pt-5">
        <p class="mb-0 me-2">Don't have an account?</p>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-5">
        <p class="mt-0 me-2">
            <a class="font-weight-bold font-bold-color" href="{{ route('web.register') }}">Register here</a>   
        </p>
    </div>

@endsection