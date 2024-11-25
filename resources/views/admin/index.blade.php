@extends('admin.layouts.dashboard')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1> -->
        <p class="mb-4"></p>

        <!-- DataTales Filter -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @include('admin.dashboard.filter')
            </div>
        </div>

        <!-- DataTales Charts -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Charts</h6>
            </div>
            <div class="card-body">
                <div style="width:50%;float: left;">
                    <!-- {!! $line_chartjs->render() !!} -->
                </div>
                <div style="width:100%;float: left;">
                    {!! $bar_chartjs->render() !!}
                </div>
                <div style="width:100%;clear: both;">
                    <!-- {!! $polar_chartjs->render() !!} -->
                </div>
                <div style="width:100%;clear: both;">
                    <!-- {!! $scatter_chartjs->render() !!} -->
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    
@endsection