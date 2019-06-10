@extends('layouts.default')

@section('title', 'Customer')

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
                    <form class="form-horizontal" method="POST" action="{{ route('customer.update', $customer->id)  }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit Konsumen</h4>
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Konsumen</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" value="{{ $customer->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Customer name" autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-right control-label col-form-label">No HP</label>
                                <div class="col-sm-9">
                                    <input type="text" id="phone" name="phone" value="{{ $customer->phone_number }}" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="Phone number" autofocus>
                                    @if ($errors->has('phone_number'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone_number') }}
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
