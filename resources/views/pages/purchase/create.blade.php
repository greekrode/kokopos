@extends('layouts.default')

@section('title', 'Purchase')

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
                    <form class="form-horizontal" method="POST" action="{{ route('purchase.store')  }}">
                        <div class="card-body">
                            <h4 class="card-title">Pembelian Baru</h4>
                            @csrf
                            <div class="form-group row">
                                <label for="product"
                                       class="col-sm-3 text-right control-label col-form-label">Produk</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                            name="product_id">
                                        <option></option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product"
                                       class="col-sm-3 text-right control-label col-form-label">Supplier</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;"
                                            name="supplier_id">
                                        <option></option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount"
                                       class="col-sm-3 text-right control-label col-form-label">Kuantitas</label>
                                <div class="col-sm-9">
                                    <input type="number" id="amount" name="amount"
                                           class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                                           placeholder="Kuantitas Pembelian" autofocus>
                                    @if ($errors->has('amount'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amount') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price"
                                       class="col-sm-3 text-right control-label col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="number" id="price" name="price"
                                           class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                           placeholder="Harga Pembelian" autofocus>
                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
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
