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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title float-left mb-3">Product Data</h3>
                        <a class="card-title btn btn-primary float-right mb-3" href="{{ route('product.create') }}"><i class="mdi mdi-plus"></i> Add New</a>
                        <div class="table-responsive">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table id="zero_config" class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="font-22 font-bold">ID</th>
                                    <th class="font-22 font-bold">Name</th>
                                    <th class="font-22 font-bold">Capital Price</th>
                                    <th class="font-22 font-bold">Selling Price</th>
                                    <th class="font-22 font-bold">Stock</th>
                                    <th class="font-22 font-bold">Image</th>
                                    <th class="font-22 font-bold">Category</th>
                                    <th colspan="2" class="font-22 font-bold">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->capital_price }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td><img src="{{ url('uploads/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width:20% !important;"></td>
                                        <td>{{ $product->category->name }}</td>
                                        <td><a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
