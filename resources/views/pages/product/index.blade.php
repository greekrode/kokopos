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
                            @elseif (session('fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('fail') }}
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
                                        <th class="font-22 font-bold">Action</th>
                                    </tr>
                                </thead>
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

@push('scripts')
    <script>
        var table = $('#zero_config').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.product') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', searchable: false},
                { data: 'name', name: 'name' },
                { data: 'capital_price', name: 'capital_price' },
                { data: 'selling_price', name: 'selling_price' },
                { data: 'stock', name: 'stock' },
                {
                    data: 'image', name: 'image',
                    render: function (data, type, row) {
                        return "<img src=\"/uploads/" + data + "\" width=\"150\"/>";
                    }
                },
                { data: 'categories_name', name: 'category' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $('#zero_config').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {method: '_DELETE', submit: true}
                }).always(function (data) {
                    $('#zero_config').DataTable().draw(false);
                });
            }else
                alert("You have cancelled!");
        });
    </script>
@endpush
