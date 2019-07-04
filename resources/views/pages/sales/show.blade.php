@extends('layouts.default')

@section('title', 'Sales')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>Penjualan</b> <span class="pull-right">{{ $sales->number }}</span></h3>
                    @if (Auth::user()->type === 'admin')
                        <span class="pull-left"> <small>Created by: {{ $sales->user->name }}</small></span>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> &nbsp;<b class="text-danger">Kokobop Chicken</b></h3>
                                    <p class="text-muted m-l-5">Grand Palladium, Lt. UG Blok US21 No. 1, 5
                                        <br/> Jl. Kapten Maulana Lubis No. 10
                                        <br/> Medan - 20242</p>
                                </address>
                            </div>
                            <div class="pull-right text-right">
                                <address>
                                    <h2>Kepada, {{ $sales->customer->name }}</h2>
                                    <p class="m-t-30"><i class="fa fa-calendar"></i> <b>Tgl Penjualan :</b> {{ date('l, d/m/Y', strtotime($sales->created_at)) }}</p>
                                    <p><i class="fa fa-clock"></i> <b>Waktu Penjualan :</b> {{ date('H:i:s', strtotime($sales->created_at)) }}</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Produk</th>
                                        <th class="text-right">Qty Produk</th>
                                        <th class="text-right">Harga Produk</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $grandTotal = 0;
                                    @endphp
                                    @foreach ($salesDetails as $salesDetail)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $salesDetail->product->name }}</td>
                                            <td class="text-right">{{ $salesDetail->qty }}</td>
                                            <td class="text-right">Rp {{ number_format($salesDetail->product->selling_price, 0 ,',', '.') }}</td>
                                            <td class="text-right">Rp {{ number_format($salesDetail->product->selling_price * $salesDetail->qty, 0 ,',', '.') }}</td>
                                        </tr>
                                        @php
                                            $grandTotal += $salesDetail->product->selling_price * $salesDetail->qty;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <p>Sub total: Rp {{ number_format($grandTotal, 0 ,',', '.') }}</p>
                                <!-- <p>Pajak (0%) : Rp 0 </p> -->
                                <hr>
                                <h3><b>Total :</b> Rp {{ number_format($grandTotal, 0 ,',', '.') }}</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
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
