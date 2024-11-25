@extends('admin.layouts.form')

@section('content')

    <div class="two-factor-group mt-3">
        <div class="row">
            <div class="col-sm-6 mb-6 mb-sm-0">
                <div class="text-left">
                    <img src="{{ asset('assets/img/pmnp-logo-original.png') }}" alt="logo" />
                </div>
            </div>
            <div class="col-sm-6 mb-6 mb-sm-0">
                <div class="text-right">
                    <img src="{{ asset('assets/img/logo-register.png') }}" alt="logo" />
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error) @endforeach
    @endif

    <form method="POST" action="{{ route('two-factor.login.store') }}" class="two-factor-challenge">

        @method('POST')
        @csrf

        <div class="register-title text-left pt-1 pb-5">
            <h2>Verify your identity</h2>
            <p>For your security, a One-Time Password (OTP)</p>
            <!-- <p>
                For your security, a One-Time Password (OTP) has been sent to your
                registered mobile number/email. Please enter the OTP within the next
                5 minutes to verify your identity. 
            </p> -->
        </div>

        <div class="form-input form-input-customize mb-3">
            <label class="sr-only" for="inlineFormInputGroup">Code</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    @if (!$recovery)
                        <div class="input-group-text"><i class="fa fa-code" aria-hidden="true"></i></div>
                    @else
                    <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                    @endif
                </div>

                @if (!$recovery)
                    <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'error-validate' : null }}" id="inlineFormInputGroup" placeholder="Code" value="{{ old('code', '') }}" />
                @else 
                    <input type="text" name="recovery_code" class="form-control {{ $errors->has('recovery_code') ? 'error-validate' : null }}" id="inlineFormInputGroup" placeholder="Code" value="{{ old('recovery_code', '') }}" />
                @endif
            </div>
            @if($errors->has('email'))
                <div class="mt-2 alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="text-right pt-1 pb-5">
            <a class="text-muted" href="{{ $recovery ? route('two-factor.login') : route('two-factor.login', ['recovery' => true]) }}">{{ __(!$recovery ? 'Use Recovery Code' : 'Use Authentication Code') }}</a>
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
            <input type="submit" value="{{ $recovery ? 'Recovery One-Time Password' : 'Verify One-Time Password' }}" class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
        </div>

    </form>

    <div class="d-flex align-items-center justify-content-center pt-5">
        <p class="mb-0 me-2">Don't have an account?</p>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-5">
        <p class="mt-0 me-2">
            <a class="font-weight-bold font-bold-color" href="{{ route('web.register') }}">Register here</a>   
        </p>
    </div>

@endsection