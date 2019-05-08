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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title float-left mb-3">Report</h3>
                        <div class="table-responsive">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('fail') }}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-22 font-bold" width="10%">#</th>
                                    <th class="font-22 font-bold" colspan="6">Invoice Number</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th class="font-22 font-bold">Product Name</th>
                                    <th class="font-22 font-bold">Capital Price</th>
                                    <th class="font-22 font-bold">Price</th>
                                    <th class="font-22 font-bold">Qty</th>
                                    <th class="font-22 font-bold">Total Price</th>
                                    <th class="font-22 font-bold">Revenue</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $grandTotalQty = 0;
                                    $grandTotalPrice = 0;
                                    $grandTotalRevenue = 0;
                                @endphp
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td style="font-weight: bold !important;">{{ $loop->iteration }}</td>
                                        <td colspan="6" style="font-weight: bold !important;">{{ $sale->number }}</td>
                                    </tr>
                                    @php
                                        $salesQty = 0;
                                        $salesTotalPrice = 0;
                                        $salesTotalRevenue = 0;
                                    @endphp
                                    @foreach ($sale->salesDetails as $sd)
                                        @php
                                            $salesQty += $sd->qty;
                                            $salesTotalPrice += $sd->qty * $sd->product->selling_price;
                                            $salesTotalRevenue += $sd->qty * ($sd->product->selling_price - $sd->product->capital_price);
                                            $grandTotalQty += $salesQty;
                                            $grandTotalPrice += $salesTotalPrice;
                                            $grandTotalRevenue += $salesTotalRevenue;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td>{{ $sd->product->name }}</td>
                                            <td>Rp {{ number_format($sd->product->capital_price, 2) }}</td>
                                            <td>Rp {{ number_format($sd->product->selling_price, 2) }}</td>
                                            <td>{{ $sd->qty }}</td>
                                            <td>Rp {{ number_format($sd->qty * $sd->product->selling_price, 2) }}</td>
                                            <td>Rp {{ number_format($sd->qty * ($sd->product->selling_price - $sd->product->capital_price), 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td colspan="3" style="font-weight: bold;">Total</td>
                                        <td style="font-weight: bold;">{{ $salesQty }}</td>
                                        <td style="font-weight: bold;">Rp {{ number_format($salesTotalPrice, 2) }}</td>
                                        <td style="font-weight: bold;">Rp {{ number_format($salesTotalRevenue, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td colspan="3" style="font-weight: bold;">Grand Total</td>
                                    <td style="font-weight: bold;">{{ $grandTotalQty }}</td>
                                    <td style="font-weight: bold;">Rp {{ number_format($grandTotalPrice, 2) }}</td>
                                    <td style="font-weight: bold;">Rp {{ number_format($grandTotalRevenue, 2) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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
