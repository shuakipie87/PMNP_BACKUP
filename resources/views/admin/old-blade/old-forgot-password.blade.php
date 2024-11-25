

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
                                <h1 class="h4 text-gray-900 mb-4">PMNP - Form</h1>
                            </div>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" class="user">
                                
                                @method('POST')
                                @csrf

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." />
                                </div>

                                <input type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block" />
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Nested Row within Card Body - END -->

            </div>
        </div>
    </div>
</div>