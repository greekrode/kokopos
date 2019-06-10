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
                    <form class="form-horizontal" method="POST" action="{{ route('product.update', $product->id)  }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @method('PATCH')
                            @csrf
                            <h4 class="card-title">Edit Produk</h4>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Product Name" value="{{ $product->name }}" autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="capital_price" class="col-sm-3 text-right control-label col-form-label">Harga Modal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" id="capital_price" name="capital_price" value="{{ $product->capital_price }}" class="form-control" placeholder="Capital Price" aria-label="Capital Price" aria-describedby="basic-addon1">
                                        @if ($errors->has('capital_price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('capital_price') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="selling_price" class="col-sm-3 text-right control-label col-form-label">Harga Jual</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" id="selling_price" name="selling_price" value="{{ $product->selling_price }}" class="form-control" placeholder="Selling Price" aria-label="Selling Price" aria-describedby="basic-addon1">
                                        @if ($errors->has('capital_price'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('capital_price') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                        @if ($errors->has('image'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('image') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="category" class="col-sm-3 text-right control-label col-form-label">Kategori</label>--}}
{{--                                <div class="col-sm-9">--}}
{{--                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">--}}
{{--                                        <option> </option>--}}
{{--                                        @foreach($categories as $cat)--}}
{{--                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

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
