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

    <form method="POST" action="{{ route('web.register', ['page' => true]) }}" class="register needs-validation" autocomplete="off">

        @method('POST')
        @csrf

        <div class="register-title text-left pt-1 pb-3">
            <h2 class="mb-0">
                Let’s get you started!
            </h2>
            <p>Please provide your detailed personal information.</p>
        </div>

        @if (!$page)
        
            <div class="form-group form-input-customize">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                            First Name
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstname" value="{{ old('firstname', $register_data['firstname'] ?? '') }}" required/>
                    </div>
                    <div class="col-sm-6">
                        <label>
                            Last Name
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="lastname" placeholder="" value="{{ old('lastname', $register_data['lastname'] ?? '') }}" required/>
                    </div>
                </div>

                @if($errors->has('firstname'))
                    <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('firstname') }}</div>
                @endif
                
                @if($errors->has('lastname'))
                    <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('lastname') }}</div>
                @endif
            </div>

            <div class="form-group form-input-customize">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                            Health Care Facility Location
                            <i class="text-danger">*</i>
                        </label>
                        <select name="facility_location" required class="form-select" aria-label="Default select example">
                            <option></option>
                            @foreach($facility_location as $key => $location)
                                <option value="{{ $location['id'] }}" @selected(old('facility_location', $register_data['facility_location'] ?? '') == $location['id'])>
                                    {{ $location['name'] }}
                                </option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="col-sm-6">
                        <label>
                            Facility ID No
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user {{ $errors->has('email') ? '' : '' }}" name="facility_id" value="{{ old('facility_id', $register_data['facility_id'] ?? '') }}" required/>
                    </div>
                </div>
            </div>

            <div class="form-group form-input-customize">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                            Email Address
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" name="email" value="{{ old('email', $register_data['email'] ?? '') }}" required/>
                    </div>
                    <div class="col-sm-6">
                        <label>
                            Mobile Phone
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" name="phone" value="{{ old('phone', $register_data['phone'] ?? '') }}" required/>
                    </div>
                </div>
                @if($errors->has('email'))
                    <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                @if($errors->has('phone'))
                    <div class="mt-2 mb-2 alert alert-danger">{{ $errors->first('phone') }}</div>
                @endif
            </div>

            <!-- <div class="form-group form-input-customize">
                <div class="col no-padding">
                    <input type="text" class="form-control form-control-user" id="exampleInputName" name="username" placeholder="Username" />
                </div>
                @if($errors->has('username'))
                    <div class="mt-2 alert alert-danger">{{ $errors->first('username') }}</div>
                @endif
            </div> -->
            
            <div class="form-group form-input-customize">
                <label>
                    Complete Address
                    <i class="text-danger">*</i>
                    <span>(House No / Street Name / Brgy)</span>
                </label>
                <input type="text" class="form-control form-control-user" name="complete_address" value="{{ old('complete_address', $register_data['complete_address'] ?? '') }}" required/>
            </div>

            <div class="form-group form-input-customize">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>
                            City / Municipality
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" name="municipality" value="{{ old('municipality', $register_data['municipality'] ?? '') }}" required/>
                    </div>
                    <div class="col-sm-6">
                        <label>
                            Province
                            <i class="text-danger">*</i>
                        </label>
                        <input type="text" class="form-control form-control-user" name="province" value="{{ old('province', $register_data['province'] ?? '') }}" required/>
                    </div>
                </div>
            </div>

        @endif

        <!-- <div class="form-group form-input-customize">
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address" />
        </div> -->
        
        <div class="text-right mt-5 pt-1 mb-1 pb-1">
            <input type="submit" value="" class="register-next btn fa-lg gradient-custom-2 mb-3 text-white font-weight-bold" />
        </div>

        <!-- <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Register with Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
        </a> -->

    </form>

    <!-- <hr>

    <div class="text-center pt-1 mb-1 pb-1">
        <a class="text-muted" href="{{ route('admin.forgot-password') }}">Forgot password?</a>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mt-0 me-2">
            <a class="text-muted" href="{{ route('login') }}">Already have an account? Login!</a>   
        </p>
    </div> -->
                            
@endsection

