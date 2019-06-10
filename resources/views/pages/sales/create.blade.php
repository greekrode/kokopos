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
                        <h4 class="card-title">Produk</h4>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <select id="products" name="product_list[]" class="form-control"></select>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">List Produk</h5>
                        <div class="form-group row">
                            <div class="table-responsive col-md-12">
                                <table id="zero_config" class="table table-bordered">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th class="font-22 font-bold" width="5%">ID</th>
                                        <th class="font-22 font-bold" width="25%">Nama</th>
                                        <th class="font-22 font-bold" width="20%">Gambar</th>
                                        <th class="font-22 font-bold" width="15%">Harga</th>
                                        <th class="font-22 font-bold" width="15%">Qty</th>
                                        <th class="font-22 font-bold" width="15%">Subtotal</th>
                                        <th class="font-22 font-bold" width="10%">Aksi</th>
                                        <th id="item-id" style="display: none">Item ID</th>
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
                            <h4 class="card-title">Data Penjualan</h4>
                        </div>

                        <div class="card-body">
                            <h2 class="card-title float-left">Nomor Invoice</h2>
                            <h4 class="float-right" style="margin-top: 8px">{{ $sales_no }}</h4>
                            <input type="hidden" id="sales_no" name="sales_no" value="{{ $sales_no }}">
                        </div>

                        <div class="card-body">
                            <h2 class="card-title float-left">Konsumen</h2>
                            <div class="float-right" style="width: 250px">
                                <select class="select2 form-control custom-select" id="customer_id"
                                        name="customer_id">
                                    <option></option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body">
                            <h2 class="card-title float-left">Total</h2>
                            <h2 class="float-right text-primary" id="sales-total">Rp <span id="sales-total-text">0</span></h2>
                        </div>

                        <div class="card-body">
                            <h2 class="card-title float-left">Pembayaran</h2>
                            <h2 class="float-right text-warning" id="payment">Rp <span id="payment-text">0  </span> <button class="btn btn-xs btn-success" id="opener" style="margin-bottom: 5px;"><i class="mdi mdi-plus"></i></button></h2>
                        </div>

                        <div id="dialog" title="Payment Amount">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="text" id="payment-amount" name="payment-amount" class="form-control" aria-label="Payment-Amount" aria-describedby="basic-addon1" placeholder="Payment Amount...">
                            </div>
                            <p id="error-p" style="display: none" class="text-danger"><i class="mdi mdi-alert"></i><span id="error-message"></span></p>
                        </div>

                        <div class="card-body">
                            <h2 class="card-title float-left">Ubah</h2>
                            <h2 class="float-right text-danger" id="change">Rp <span id="change-text">0</span></h2>
                        </div>

                        <div class="card-body">
                            <button type="submit" id="submit" class="btn btn-md btn-primary col-sm-12">Submit</button>
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
            placeholder: "Pilih produk...",
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

        function calculate(id) {
            var qty = parseInt($('#qty' + id).val());
            if (qty < 0 || isNaN(qty)) {
                qty = 1;
            }

            $.ajax({
                url: '{{ route('ajax.product') }}',
                type: 'get',
                data: {
                    productId: id,
                    qty: qty
                },
                success: function(response) {
                    if (response === 'true') {
                        var price = parseInt($('#price' + id).text().replace(/[^0-9]/g,'').toString());

                        var subtotal = qty * price;
                        $('#subtotal'+ id).text('Rp ' + numberWithCommas(subtotal));

                        var spanValues = [];
                        $( "span[id*='subtotal']" ).each(function(){
                            spanValues.push(parseInt($(this).html().substring(3).replace('.', "")));
                        });
                        var subtotalValue = spanValues.reduce(function (a, b) {
                            return a + b;
                        });
                        $('#sales-total-text').text(numberWithCommas(subtotalValue));
                    } else {
                        toastr.error('Product stock has only ' + response + ' left!', 'Error!');
                    }
                }
            });
        }

        function recalculate(itemId) {
            var subtotal = parseInt($('#subtotal' + itemId).html().substring(3).replace('.',""));
            var total = $('#sales-total-text').html().replace('.',"");
            $('#sales-total-text').text(numberWithCommas(total-subtotal));
        }

        $('#zero_config tbody').on( 'click', '#delete', function () {
            var itemId = table.row($(this).parents('tr')).data()[7];
            recalculate(itemId);

            table
                .row( $(this).parents('tr') )
                .remove()
                .draw();
        } );

        $('#products').on('select2:select', function(e) {
            $('#products').empty();
           let products = e.params.data;
           let imgTag = "<img src=\"/uploads/" + products.image + "\" width=\"150\"/>";
           let data = table.rows().data();
           let dataCheck = false;

           if (table.page.info().recordsDisplay === 0) {
               table.row.add([
                   counter,
                   products.text,
                   imgTag,
                   "<span id=\"price" + products.product_id + "\">" + 'Rp ' + numberWithCommas(products.price) +"</span>",
                   "<input type='number' name=\"qty" + products.product_id + "\" id=\"qty" + products.product_id+ "\" value='1' class='form-control col-10' oninput=\"calculate(" + products.product_id + ");\">",
                   "<span id=\"subtotal" + products.product_id + "\">" + 'Rp ' + numberWithCommas(products.price) +"</span>",
                   "<button id=\"delete\" class=\"btn btn-md btn-danger\" type=\"submit\"><i class=\"mdi mdi-delete\"></i></button>",
                   products.product_id
               ]).draw(false);
               table.column(7).visible(false).draw(false);
               $('#sales-total-text').text(numberWithCommas(products.price));
           } else {
               var itemIdArray = [];
               table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                   itemIdArray.push(data[rowIdx][7]);
               });

               if ($.inArray(products.product_id, itemIdArray) === -1) {
                   dataCheck = false;
               } else {
                   dataCheck = true;
                   table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                       if (data[rowIdx][7] === products.product_id) {
                           let rowQty = parseInt(table.cell(rowIdx, 4).nodes().to$().find('input').val()) + 1;
                           table.cell(rowIdx, 4).data("<input type='number' name=\"qty" + products.product_id + "\" id=\"qty" + products.product_id + "\" value=\"" + rowQty + "\"  class='form-control col-10' oninput=\"calculate(" + products.product_id + ");\">").draw();
                           calculate(products.product_id);
                       }
                   });
               }

               if (dataCheck === false) {
                   table.row.add([
                       counter + 1,
                       products.text,
                       imgTag,
                       "<span id=\"price" + products.product_id + "\">" + 'Rp ' + numberWithCommas(products.price) + "</span>",
                       "<input type='number' name=\"qty" + products.product_id + "\" id=\"qty" + products.product_id + "\" value='1' class='form-control col-10' oninput=\"calculate(" + products.product_id + ");\">",
                       "<span id=\"subtotal" + products.product_id + "\">" + 'Rp ' + numberWithCommas(products.price) + "</span>",
                       "<button id=\"delete\" class=\"btn btn-md btn-danger\" type=\"submit\"><i class=\"mdi mdi-delete\"></i></button>",
                       products.product_id,
                   ]).draw(false);
                   table.column(7).visible(false).draw(false);
                   counter++;
               }

               var spanValues = [];
               $( "span[id*='subtotal']" ).each(function(){
                    spanValues.push(parseInt($(this).html().substring(3).replace('.', "")));
               });
               var subtotalValue = spanValues.reduce(function (a, b) {
                  return a + b;
               });
               $('#sales-total-text').text(numberWithCommas(subtotalValue));
           }
        });

        $('#submit').on('click', function() {
            let allItemArray = [];
            let data = table.rows().data();
            let paymentAmount = parseInt($('#payment-amount').val().replace('.',""));

            table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                allItemArray.push({
                    itemId: data[rowIdx][7],
                    itemQty: table.cell(rowIdx, 4).nodes().to$().find('input').val()
                });
            });


            if (allItemArray.length === 0) {
                toastr.error('Please input product first!', 'Error!');
            } else {
                if (paymentAmount > 0) {
                    $.ajax({
                        url: '{{ route('sales.store') }}',
                        method: 'post',
                        data: {
                            itemData: allItemArray,
                            salesTotal: $('#sales-total-text').html().replace(".", ""),
                            salesNumber: $('#sales_no').val(),
                            salesCustomer: $('#customer_id :selected').val()
                        },
                        success: function () {
                            window.location = '/sales';
                        },
                        fail: function () {
                            toastr.error('Something is wrong! Please try again!', 'Error!');
                        }
                    });
                } else {
                    toastr.error('Please input payment first!', 'Error!');
                }
            }
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#dialog").dialog({
            autoOpen: false,
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "Submit": function() {
                    let paymentAmount = parseInt($('#payment-amount').val().replace('.',""));
                    let totalAmount = parseInt($('#sales-total-text').html().replace('.', ""));

                    if (paymentAmount >= totalAmount) {
                        $('#payment-text').text(numberWithCommas(paymentAmount));
                        $('#change-text').text(numberWithCommas(paymentAmount - totalAmount));
                        $( this ).dialog( "close" );
                        $('#error-p').css("display", "none");
                    } else {
                        $('#error-p').css("display", "block");
                        $('#error-message').text(" Payment amount must be bigger than total amount");
                    }
                }
            }
        });

        $( "#opener" ).on( "click", function() {
            $( "#dialog" ).dialog( "open" );
        });

        $('#payment-amount').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                    ;
            });
        });
    </script>
@endpush
