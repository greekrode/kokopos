@extends('layouts.default')

@section('title', 'Product')

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
                    <form class="form-horizontal" method="POST" action="{{ route('sales.store')  }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <h4 class="card-title">New Sales</h4>
                            <div class="form-group row">
                                <label for="number" class="col-sm-3 text-right control-label col-form-label">Number</label>
                                <div class="col-sm-3">
                                    <input type="text" id="number" name="number" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" placeholder="Product Name" autofocus>
                                    @if ($errors->has('number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('number') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                                {{--<label for="capital_price" class="col-sm-3 text-right control-label col-form-label">Total</label>--}}
                                {{--<div class="col-sm-9">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<div class="input-group-prepend">--}}
                                            {{--<span class="input-group-text" id="basic-addon1">Rp</span>--}}
                                        {{--</div>--}}
                                        {{--<input type="text" id="capital_price" name="capital_price" class="form-control" placeholder="Capital Price" aria-label="Capital Price" aria-describedby="basic-addon1">--}}
                                        {{--@if ($errors->has('capital_price'))--}}
                                            {{--<div class="invalid-feedback">--}}
                                                {{--{{ $errors->first('capital_price') }}--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                @foreach($products as $product)
                                    <div class="col-sm-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('/uploads/'.$product->image) }}" alt="{{ $product->name }}" style="object-fit: fill" width="640px" height="200px">
                                            <div class="card-body">
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
