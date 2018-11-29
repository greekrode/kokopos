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
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <select id="products" name="product_list[]" class="form-control"></select>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Product List</h5>
                        <div class="form-group row">
                            <div class="table-responsive col-md-12">
                                <table id="zero_config" class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="font-22 font-bold">ID</th>
                                        <th class="font-22 font-bold">Name</th>
                                        <th class="font-22 font-bold">Price</th>
                                        <th class="font-22 font-bold">Image</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Test</h4>
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
    <script type="text/javascript">
        $('#products').select2({
            placeholder: "Choose products...",
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('search.product') }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        var table = $('#zero_config').DataTable();
        var counter = 1;


        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        $('#products').on('select2:select', function(e) {
           var products = e.params.data;
           var imgTag = "<img src=\"/uploads/" + products.image + "\" width=\"150\"/>";
           table.row.add([
               counter,
               products.text,
               'Rp ' + numberWithCommas(products.price),
               imgTag
           ]).draw(false);

           counter++;
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
