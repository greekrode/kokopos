@extends('layouts.default')

@section('title', 'Stock')

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
                    <form class="form-horizontal" method="POST" action="{{ route('supplier.update', $supplier->id)  }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit supplier</h4>
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama Supplier</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" value="{{ $supplier->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nama supplier" autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_person" class="col-sm-3 text-right control-label col-form-label">Contact Person</label>
                                <div class="col-sm-9">
                                    <input type="tel" id="contact_person" name="contact_person" value="{{ $supplier->contact_person }}"  class="form-control {{ $errors->has('contact_person') ? 'is-invalid' : '' }}" placeholder="Contact person" autofocus>
                                    @if ($errors->has('contact_person'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('contact_person') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" id="address" name="address" value="{{ $supplier->address }}"  class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Alamat" autofocus>
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
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
