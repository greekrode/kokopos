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
                                        <th class="font-22 font-bold" width="10%">ID</th>
                                        <th class="font-22 font-bold" width="25%">Name</th>
                                        <th class="font-22 font-bold" width="20%">Image</th>
                                        <th class="font-22 font-bold" width="15%">Price</th>
                                        <th class="font-22 font-bold" width="15%">Quantity</th>
                                        <th class="font-22 font-bold" width="15%">Subtotal</th>
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
                        <h4 class="card-title">Sales Data</h4>
                    </div>

                    <div class="card-body">
                        <h2 class="card-title float-left">Total</h2>
                        <h2 class="float-right text-primary" id="sales-total">Rp <span id="sales-total-text">0</span></h2>
                    </div>

                    <div class="card-body">
                        <h2 class="card-title float-left">Payment</h2>
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
                        <h2 class="card-title float-left">Change</h2>
                        <h2 class="float-right text-danger" id="change">Rp <span id="change-text">0</span></h2>
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

        function calculate(id) {
            var qty = parseInt($('#qty' + id).val());
            if (qty < 0 || isNaN(qty)) {
                qty = 1;
            }
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
        }

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
                   products.product_id
               ]).draw(false);
               table.column(6).visible(false).draw(false);
               $('#sales-total-text').text(numberWithCommas(products.price));
           } else {
               var itemIdArray = [];
               table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                   itemIdArray.push(data[rowIdx][6]);
               });

               if ($.inArray(products.product_id, itemIdArray) === -1) {
                   dataCheck = false;
               } else {
                   dataCheck = true;
                   table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                       if (data[rowIdx][6] === products.product_id) {
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
                       products.product_id
                   ]).draw(false);

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
                    let paymentAmount = $('#payment-amount').val().replace('.',"");
                    let totalAmount = $('#sales-total-text').html().replace('.', "");

                    $('#payment-text').text(numberWithCommas(paymentAmount));

                    if (paymentAmount >= totalAmount) {
                        $('#change-text').text(numberWithCommas(paymentAmount - totalAmount));
                        $( this ).dialog( "close" );
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