@extends('admin.layouts.dashboard')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Profile</h1>
        <p class="mb-4"></p>

        @include('admin.profiles.form')

        @include('admin.profiles.two-factor')

    </div>
    <!-- /.container-fluid -->

@endsection