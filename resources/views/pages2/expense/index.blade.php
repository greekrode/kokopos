@extends('layouts.default')

@section('title', 'Expense')

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
                        <h3 class="card-title float-left mb-3">Expense Data</h3>
                        <a class="card-title btn btn-primary float-right mb-3" href="{{ route('expense.create') }}"><i class="mdi mdi-plus"></i> Tambah Data</a>
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
                                        <th class="font-22 font-bold">Price</th>
                                        <th class="font-22 font-bold">Date</th>
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
            order: [[4, "desc"]],
            ajax: '{!! route('datatable.expense') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', searchable: false},
                { data: 'product.name', name: 'product.name' },
                { data: 'price', name: 'price', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
                { data: 'created_at', name: 'created_at'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
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
            if (confirm('Apakah anda yakin untuk menghapusnya?')) {
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
