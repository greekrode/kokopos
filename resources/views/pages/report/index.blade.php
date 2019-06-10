@extends('layouts.default')

@section('title', 'Report')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <form class="form-horizontal" method="POST" action="{{ route('report.create')  }}">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif (session('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">Filter Laporan</h4>
                            @csrf
                            <div class="form-group row" id="filter">
                                <label for="filter" class="col-sm-3 text-right control-label col-form-label">Filter</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="filter" onchange="showFilter()">
                                        <option selected value=''>--Select Filter--</option>
                                        <option value="daily">Harian</option>
                                        <option value="monthly">Bulanan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="month" style="visibility: hidden;">
                                <label for="month" class="col-sm-3 text-right control-label col-form-label">Bulan</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="month">
                                        <option selected value=''>--Select Month--</option>
                                        <option value='1'>Januari</option>
                                        <option value='2'>Februari</option>
                                        <option value='3'>Maret</option>
                                        <option value='4'>April</option>
                                        <option value='5'>Mei</option>
                                        <option value='6'>Juni</option>
                                        <option value='7'>Juli</option>
                                        <option value='8'>Agustus</option>
                                        <option value='9'>September</option>
                                        <option value='10'>Oktober</option>
                                        <option value='11'>November</option>
                                        <option value='12'>Deember</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
@endsection

@push('scripts')
    <script>
        function showFilter(){
            let filter = $('#filter :selected').val();
            if (filter === 'monthly') {
                $('#month').css("visibility", "visible");
            } else {
                $('#month').css("visibility", "hidden");
            }
        }
    </script>
@endpush
