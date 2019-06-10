@extends('layouts.default')

@section('title', 'Purchase Report')

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
                        <h3 class="card-title float-left mb-3">Purchase Report</h3>
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
                                    <th class="font-22 font-bold">Product Name</th>
                                    <th class="font-22 font-bold">Date</th>
                                    <th class="font-22 font-bold">Price </th>
                                    <th class="font-22 font-bold">Amount</th>
                                    <th class="font-22 font-bold">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $grandTotalQty = 0;
                                    $grandTotalPrice = 0;
                                @endphp
                                @foreach ($purchases as $purchase)
                                @php
                                    $grandTotalQty += $purchase->qty;
                                    $grandTotalPrice += $purchase->qty * $purchase->price;
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $purchase->product->name }}</td>
                                        <td>{{ date_format($purchase->created_at, 'd-m-Y') }}</td>
                                        <td>Rp {{ number_format($purchase->price, 2) }}</td>
                                        <td>{{ $purchase->qty }}</td>
                                        <td>Rp {{ number_format($purchase->qty * $purchase->price, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4" style="font-weight: bold;">Grand Total</td>
                                    <td style="font-weight: bold;">{{  $grandTotalQty }}</td>
                                    <td style="font-weight: bold;">Rp {{ number_format($grandTotalPrice, 2) }}</td>
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
