

@extends('admin.layouts.form')

@section('content')
  
    <div class="text-center">
        <img src="{{ asset('assets/img/logo-login.png') }}" alt="logo" />
        <!-- <h4 class="mt-1 mb-5 pb-1">PMNP - Sign In</h4> -->
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form class="forgot-password needs-validation login" autocomplete="off">
        
        <div class="reset-request-title text-center pt-1 pb-3 mt-5">
            <h2 class="mb-0 font-weight-bold">
                {{ 'We have received your password reset request' }}
            </h2>
            <p class="mt-3">{{ 'Pending approval by the system administrator. You will receive a reset link once your request is approved.' }}</p>
        </div>

        <div class="forgot-password-input text-center pt-1 mb-5 pb-1 mt-5">
            <input type="submit" value="Back to Login" class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
        </div>

    </form>

@endsection
