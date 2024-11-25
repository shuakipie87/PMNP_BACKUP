@extends('admin.layouts.default')

@section('content')
  
<div class="row justify-content-center"> <!-- Outer Row -->
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <!-- Nested Row within Card Body -->
                <div class="row d-flex align-items-center justify-content-center h-10">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5">
                        <div class="p-4">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">PMNP - Sign Up</h1>
                            </div>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error) @endforeach
                            @endif

                            <form method="POST" class="user">

                                @method('POST')
                                @csrf

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="exampleFirstName" name="firstname" placeholder="First Name" />
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="exampleLastName" name="lastname" placeholder="Last Name" />
                                            
                                        </div>
                                    </div>

                                    @if($errors->has('firstname'))
                                        <div class="mt-2 alert alert-danger">{{ $errors->first('firstname') }}</div>
                                    @endif
                                    
                                    @if($errors->has('lastname'))
                                        <div class="mt-2 alert alert-danger">{{ $errors->first('lastname') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputName" name="username" placeholder="Username" />
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email Address" />
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" />
                                    </div>
                                </div>

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

                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" />

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('admin.forgot-password') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('admin.login') }}">Already have an account? Login!</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Nested Row within Card Body - END -->

            </div>
        </div>
    </div>
</div>

@endsection