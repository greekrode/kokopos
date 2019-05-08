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
                    <form class="form-horizontal" method="POST" action="{{ route('purchase.update', $purchase->id)  }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit purchase</h4>
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{ $purchase->product->name }}" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number"
                                           id="amount"
                                           name="amount"
                                           value="{{ $purchase->qty }}" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" placeholder="Purchase amount" autofocus>
                                    @if ($errors->has('amount'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amount') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price"
                                       class="col-sm-3 text-right control-label col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number" id="price" name="price"
                                           value="{{ $purchase->price }}"
                                           class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                           placeholder="Purchase Price" autofocus>
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
