@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            @if (Auth::user()->role === 'admin')
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('category') }}">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-database"></i></h1>
                                <h6 class="text-white">Category</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('stock') }}">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                            <h6 class="text-white">Stocks</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('purchase') }}">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-cash"></i></h1>
                            <h6 class="text-white">Purchases</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{ route('report.index') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-paperclip"></i></h1>
                            <h6 class="text-white">Revenue Report</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <a href="{{ route('report.index.purchase') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-paperclip"></i></h1>
                            <h6 class="text-white">Purchase Report</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('supplier') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-paperclip"></i></h1>
                            <h6 class="text-white">Suppliers</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('expense') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-nature-people"></i></h1>
                            <h6 class="text-white">Expenses</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <a href="{{ route('customer') }}">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1>
                            <h6 class="text-white">Customers</h6>
                        </div>
                    </div>
                    </a>
                </div>
            @endif

            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
                <a href="{{ route('product') }}">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-biohazard"></i></h1>
                        <h6 class="text-white">Product</h6>
                    </div>
                </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
                <a href="{{ route('penjualan') }}">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-cart"></i></h1>
                        <h6 class="text-white">Sales</h6>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
