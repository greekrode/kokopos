@extends('layouts.default')

@section('title', 'Category')

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
                    <form class="form-horizontal" method="POST" action="{{ route('stock.update', $stock->id)  }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit stock</h4>
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" id="amount" name="amount" value="{{ $stock->stock }}" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" placeholder="Stock amount" autofocus>
                                    @if ($errors->has('amount'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('amount') }}
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
