@extends('layouts.default')

@section('title', 'Revenue Report')

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
                        <h3 class="card-title float-left mb-3">Laporan Laba Rugi</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-22 font-bold" width="10%">#</th>
                                    <th class="font-22 font-bold" colspan="6">Nomor Invoice</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th class="font-22 font-bold">Nama Produk</th>
                                    <th class="font-22 font-bold">Harga Modal</th>
                                    <th class="font-22 font-bold">Harga Jual</th>
                                    <th class="font-22 font-bold">Qty</th>
                                    <th class="font-22 font-bold">Total Harga</th>
                                    <th class="font-22 font-bold">Laba / Rugi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $subTotalQty = 0;
                                    $subTotalPrice = 0;
                                    $subTotalRevenue = 0;
                                    $grandTotalIncome = 0;
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
                                            $subTotalQty += $salesQty;
                                            $subTotalPrice += $salesTotalPrice;
                                            $subTotalRevenue += $salesTotalRevenue;
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
                                        <td style="font-weight: bold; color: green">Rp {{ number_format($salesTotalRevenue, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td colspan="3" style="font-weight: bold;">Sub Total</td>
                                    <td style="font-weight: bold;">{{ $subTotalQty }}</td>
                                    <td style="font-weight: bold;">Rp {{ number_format($subTotalPrice, 2) }}</td>
                                    <td style="font-weight: bold; color: green">Rp {{ number_format($subTotalRevenue, 2) }}</td>
                                </tr>
                                @php
                                    $unsoldTotalQty = 0;
                                    $unsoldTotalPrice = 0;
                                @endphp
                                @if(count($resetStocks) > 0)
                                    <tr>
                                        <td colspan="7" class="font-22 font-bold">Barang Tidak Terjual</td>
                                    </tr>
                                    @foreach($resetStocks as $rs)
                                        @php
                                            $unsoldTotalQty += $rs->qty;
                                            $unsoldTotalPrice += ($rs->qty * $rs->product->capital_price);
                                        @endphp
                                        <tr>
                                            <td style="font-weight: bold;">{{ $loop->iteration }}</td>
                                            <td>{{ $rs->product->name }}</td>
                                            <td>Rp {{ number_format($rs->product->capital_price, 2) }}</td>
                                            <td>-</td>
                                            <td>{{ $rs->qty }}</td>
                                            <td>Rp {{ number_format($rs->qty * $rs->product->capital_price, 2) }}</td>
                                            <td style="color: red;">Rp {{ number_format($rs->qty * $rs->product->capital_price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td colspan="3" style="font-weight: bold;">Total</td>
                                        <td style="font-weight: bold;">{{ $unsoldTotalQty }}</td>
                                        <td style="font-weight: bold;">Rp {{ number_format($unsoldTotalPrice, 2) }}</td>
                                        <td style="font-weight: bold; color: red;">Rp {{ number_format($unsoldTotalPrice, 2) }}</td>
                                    </tr>
                                @endif
                                @php
                                    $expenseTotalPrice = 0;
                                @endphp
                                @if(count($expenses) > 0)
                                    <tr>
                                        <td colspan="7" class="font-22 font-bold">Other expenses</td>
                                    </tr>
                                    @foreach($expenses as $expense)
                                        @php
                                            $expenseTotalPrice += $expense->price;
                                        @endphp
                                        <tr>
                                            <td style="font-weight: bold;">{{ $loop->iteration }}</td>
                                            <td>{{ $expense->product->name }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>Rp {{ number_format($expense->price, 2) }}</td>
                                            <td style="color: red;">Rp {{ number_format($expense->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td colspan="4" style="font-weight: bold;">Total</td>
                                        <td style="font-weight: bold;">Rp {{ number_format($expenseTotalPrice, 2) }}</td>
                                        <td style="font-weight: bold; color: red;">Rp {{ number_format($expenseTotalPrice, 2) }}</td>
                                    </tr>
                                @endif
                                </tbody>
                                    <tr>
                                        <td colspan="6" class="font-16 font-bold">Grand Total</td>
                                        <td class="font-16 font-bold" style="color: {{ $subTotalRevenue - $unsoldTotalPrice - $expenseTotalPrice > 0 ? 'green' : 'red' }}">Rp {{ number_format($subTotalRevenue - $unsoldTotalPrice - $expenseTotalPrice, 2) }}</td>
                                    </tr>
                                <tfoot>
                                    <tr></tr>
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
