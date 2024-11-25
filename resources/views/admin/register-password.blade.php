@extends('admin.layouts.form')

@section('content')

    <div class="logo-group mb-3">
        <div class="row">
            <div class="col-sm-6 mb-6 mb-sm-0">
                <div class="text-left">
                    <img src="{{ asset('assets/img/pmnp-logo-original.png') }}" alt="logo" />
                </div>
            </div>
            <div class="col-sm-6 mb-6 mb-sm-0">
                <div class="text-right logo-register">
                    <img src="{{ asset('assets/img/logo-register.png') }}" alt="logo" />
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error) 
            @php
                // var_dump($error);
            @endphp
        @endforeach
    @endif

    <form method="POST" action="{{ route('web.register.password.store', ['page' => true]) }}" class="register needs-validation" autocomplete="off">

        @method('POST')
        @csrf

        <div class="register-title text-left pt-1 pb-3">
            <h2 class="mb-3">
                Set Password
            </h2>
        </div>

        <div class="form-group row form-input-customize {{ $errors->has('password') ? 'mb-2' : '' }}">
            <div class="col-sm-12">
                <label>
                    Password
                    <i class="text-danger">*</i>
                </label>
                <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="password" value="{{ old('password', '') }}" required/>
            </div>
        </div>

        @if($errors->has('password'))
            <div class="mt-1 mb-2 alert alert-danger">{{ $errors->first('password') }}</div>
        @endif

        <div class="form-group row form-input-customize {{ $errors->has('password_confirmation') ? 'mb-2' : '' }}">
            <div class="col-sm-12">
                <label>
                    Repeat Password
                    <i class="text-danger">*</i>
                </label>
                <input type="text" class="form-control form-control-user" id="exampleRepeatPassword" name="password_confirmation" value="{{ old('password_confirmation') }}" required/>
            </div>
        </div>

        @if($errors->has('password_confirmation'))
            <div class="mt-1 mb-2 alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
        @endif

        <style> 
            .input-group.progress-container { 
                width: 100%; 
                height: auto; 
                padding: 4px; 
            } 
            .progress { 
                height: 4px;
                width: 100%;
                margin-bottom: 15px;
            } 
            .progress-bar { 
                background-color: green; 
            } 
        </style> 

        <div class="input-group progress-container"> 
            <div class="progress"> 
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div> 
            </div>
        </div> 

        <div class="input-group status-container"> 
            <div class="col-12 no-padding password-status"> 
                <p>
                    Password Strength: 
                    <span class="status-value">
                        <i class="text-danger">{{ 'Weak' }}</i>
                    </span>
                </p>
            </div>
            <div class="col-12 no-padding info">
                <div class="password-details">
                    <p class="must-8">
                        <i class="fa fa-check mr-2 text-success" aria-hidden="true"></i>
                        {{ 'Must be 8 characters long.' }}
                    </p>
                    <p class="special-character">
                        <i class="fa fa-check mr-2 text-success" aria-hidden="true"></i>
                        {{ 'Must include at least one special character and one number.' }}
                    </p>
                    <p class="45-days">
                        <i class="fa fa-check mr-2 text-success" aria-hidden="true"></i>
                        {{ 'Password will expire every 45 days.' }}
                    </p>
                    <p class="5-failed">
                        <i class="fa fa-check mr-2 text-success" aria-hidden="true"></i>
                        {{ 'Account will be locked after 5 failed login attempts.' }}
                    </p>
                </div>
                <span class="info-value">
                    <!-- info -->
                </span>
            </div>
        </div> 
        
        <div class="text-center pt-1 mt-5 pb-1">
            <input type="submit" value="Complete Registration" class="btn btn-block fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
        </div>

        <!--
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Register with Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
        </a> -->

    </form>

    <!--

    <div class="text-center pt-1 mb-1 pb-1">
        <a class="text-muted" href="{{ route('admin.forgot-password') }}">Forgot password?</a>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mt-0 me-2">
            <a class="text-muted" href="{{ route('login') }}">Already have an account? Login!</a>   
        </p>
    </div> -->
                            
@endsection