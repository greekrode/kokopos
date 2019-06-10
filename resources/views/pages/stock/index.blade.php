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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title float-left mb-3">Data Stok</h3>
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
                                        <th class="font-22 font-bold">Produk</th>
                                        <th class="font-22 font-bold">Stok</th>
                                        <th class="font-22 font-bold">Aksi</th>
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
            ajax: '{!! route('datatable.stock') !!}',
            columns: [
                { data: 'rownum', name: 'rownum', searchable: false},
                { data: 'product.name', name: 'product.name' },
                { data: 'stock', name: 'stock'},
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
