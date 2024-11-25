@extends('admin.layouts.default')

@section('content')
  
<div class="row justify-content-center"> <!-- Outer Row -->
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <!-- Nested Row within Card Body -->
                <div class="row d-flex align-items-center justify-content-center h-10">
                    <div class="col-md-7 col-lg-5 col-xl-5">
                        <div class="p-4">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">PMNP - Sign In</h1>
                            </div>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error) @endforeach
                            @endif

                            <form method="POST" class="user">

                                @method('POST')
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" value="{{ old('email', '') }}" />
                                    @if($errors->has('email'))
                                        <div class="mt-2 alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="{{ old('password', '') }}" />
                                    @if($errors->has('password'))
                                        <div class="mt-2 alert alert-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" name="remember" value="1" class="custom-control-input" id="customCheck"  @if (old('remember') == 1) checked="checked" @endif />
                                        <label class="custom-control-label" for="customCheck">
                                            Remember Me
                                        </label>
                                    </div>
                                    @if($errors->has('remember'))
                                        <div class="mt-2 alert alert-danger">{{ $errors->first('remember') }}</div>
                                    @endif
                                </div>

                                <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" />

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>

                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('admin.forgot-password') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('admin.register') }}">Create an Account!</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"class="img-fluid" alt="Sample image">
                    </div>
                </div>
                <!-- Nested Row within Card Body - END -->
            </div>
        </div>
    </div>
</div>

@endsection

