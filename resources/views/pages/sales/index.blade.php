@extends('layouts.default')

@section('title', 'Sales')

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
                        <h3 class="card-title float-left mb-3">Sales Data</h3>
                        <a class="card-title btn btn-primary float-right mb-3" href="{{ route('sales.create') }}"><i class="mdi mdi-plus"></i> Add New</a>
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
                                        <th class="font-22 font-bold">Number</th>
                                        <th class="font-22 font-bold">Date</th>
                                        <th class="font-22 font-bold">Total</th>
                                        <th class="font-22 font-bold">Customer</th>
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
            order: [[2, "desc"]],
            ajax: '{!! route('datatable.sales') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', searchable: false },
                { data: 'number', name: 'number' },
                { data: 'created_at', name: 'created_at' },
                { data: 'total', name: 'total', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
                { data: 'customer.name', name: 'customer.name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
        });
    </script>
@endpush
