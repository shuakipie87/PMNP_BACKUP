

@extends('admin.layouts.form')

@section('content')
  
    <div class="text-center">
        <img src="{{ asset('assets/img/logo-login.png') }}" alt="logo" />
        <!-- <h4 class="mt-1 mb-5 pb-1">PMNP - Sign In</h4> -->
    </div>

    <form method="POST" action="{{ route('forgot-password.action', ['page' => true]) }}" class="forgot-password needs-validation login" autocomplete="off">
        
        @method('POST')
        @csrf

        <div class="forgot-password-title text-center pt-1 pb-3 mt-5">
            <h2 class="mb-0 font-weight-bold">
                Forgot Password
            </h2>
            <p>Enter the email address associated with your account.</p>
        </div>

        <div class="form-input form-input-customize mb-3">
            <label class="sr-only" for="inlineFormInputGroup">Email</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                </div>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'error-validate' : null }}" id="inlineFormInputGroup" placeholder="Email Address" value="{{ old('email', '') }}" required/>
            </div>
            @if($errors->has('email'))
                <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="text-center pt-1 mb-5 pb-1">
            <input type="submit" value="Forgot Password" class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
        </div>
    </form>

    <div class="d-flex align-items-center justify-content-center pt-5">
        <p class="mb-0 me-2">Already have an account?</p>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-5">
        <p class="mt-0 me-2">
            <a class="font-weight-bold font-bold-color" href="{{ route('login') }}">Login here</a>   
        </p>
    </div>

@endsection
