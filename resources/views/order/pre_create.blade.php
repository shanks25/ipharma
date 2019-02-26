@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row" style="background: #9CC2CB">

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Order Details</h4>
                </div>

                <div class="x_content">
                    
                    <div class="form-horizontal">
                        <div class="form-group">
                            {{ Form::label('status', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                <?php
                                $orderStatus = [
                                    '0' => 'Processing',
                                    '1' => 'On Hold',
                                    '2' => 'Complete',
                                ];

                                $statusSelected = (isset($order->status)) ? $order->status : 0;
                                ?>
                                {{ Form::select('status', $orderStatus, $statusSelected, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button id="create-order" class="btn btn-primary btn-block">Save</button>
                            </div>                       
                        </div>  
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title row">
                    <div class="col-sm-6">
                        <h4>Order items</h4>
                    </div>

                    <div class="col-sm-6">
                        <button href="#" class="btn btn-primary btn-sm pull-right" id="create-order" data-toggle="modal" data-target="#addItem">Add Items</button>
                    </div>
                </div>
                <div class="x_content">

                    <table class="table" id="order-items">
                        <thead>
                            <tr>
                                <th width="40%">items</th>
                                <th width="20%">cost</th>
                                <th width="20%">qty</th>
                                <th width="20%">total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(isset($order))
                            @foreach($order->items as $products)

                            @php
                            $product = $products->product;
                            @endphp

                            <tr data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->price }} </td>
                                <td> {{ $products->qty }} </td>
                                <td> {{ $products->price }} </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total : </th>
                                <th> {{ $order->total or '' }} </th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row" style="background: #9CC2CB; margin-top: 10px; padding-top: 10px;">
        <!-- /User Shipping -->
        <div class="col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Billing Details
                        </h4>
                    </div>
                    <table class="table table-fixed">
                        <tbody>
                            <tr>
                                <td class="col-xs-3">Name</td>
                                <td class="col-xs-7"> : {{ $billing->first_name. ' ' .  $billing->last_name}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Email</td>
                                <td class="col-xs-7">: {{ $billing->email}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Address</td>
                                <td class="col-xs-7">: {{ $billing->address}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Country</td>
                                <td class="col-xs-7">: {{ $billing->country}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Division</td>
                                <td class="col-xs-7">: {{ $billing->division}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">City</td>
                                <td class="col-xs-7">: {{ $billing->city}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Postal Code</td>
                                <td class="col-xs-7">: {{ $billing->zip_code}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Mobile</td>
                                <td class="col-xs-7">: {{ $billing->mobile}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Phone</td>
                                <td class="col-xs-7">: {{ $billing->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /User Shipping -->
        <div class="col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Shipping Details
                        </h4>
                    </div>
                    <table class="table table-fixed">
                        <tbody>
                            <tr>
                                <td class="col-xs-3">Name</td>
                                <td class="col-xs-7"> : {{ $shipping->first_name. ' ' .  $shipping->last_name}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Email</td>
                                <td class="col-xs-7">: {{ $shipping->email}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Address</td>
                                <td class="col-xs-7">: {{ $shipping->address}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Country</td>
                                <td class="col-xs-7">: {{ $shipping->country}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Division</td>
                                <td class="col-xs-7">: {{ $shipping->division}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">City</td>
                                <td class="col-xs-7">: {{ $shipping->city}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Postal Code</td>
                                <td class="col-xs-7">: {{ $shipping->zip_code}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Mobile</td>
                                <td class="col-xs-7">: {{ $shipping->mobile}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Phone</td>
                                <td class="col-xs-7">: {{ $shipping->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="clearence"></div>
        <!-- /End User Shipping -->
    </div>
</div>
<!-- /page content -->



<!-- Modal -->
<div class="modal fade create-order" id="addItem" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <select name="product-search" id="product-search" class="form-control" width="100%" multiple>
                    <option value="Search">Search product</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-to-order-table">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script id="item-template" type="text/x-handlebars-template">
    <tr data-id="@{{ id }}" data-name="@{{ name }}" data-price="@{{ price }}" data-qty="@{{ qty }}" data-subtotal=" @{{ subtotal }} ">
    <td> @{{ name }} </td>
    <td> @{{ price }} </td>
    <td> 1 </td>
    <td> @{{ price }} </td>
    </tr>
</script>


@push('scripts')
<script>
    $(document).ready(function () {

        var productSearchSelect2 = $("#product-search").select2({
            width: 'element',
            ajax: {
                placeholder: "Select Product",
                url: "../product-list",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            minimumInputLength: 1,
            templateResult: formatProduct,
            templateSelection: formatProductSelection
        });

        function formatProduct(product) {
            return product.name;
        }

        function formatProductSelection(product) {

            if (product.id === '') {
                return 'Select Product';
            }

            return product.name;
        }


        $('#add-to-order-table').on('click', function () {
            var template = Handlebars.compile($("#item-template").html());
            var products = productSearchSelect2.select2('data');

            $.each(products, function (key, product) {
                var data = {
                    id: product.id,
                    name: product.name,
                    price: product.price
                };
                data.subtotal = product.price * product.qty;
                var html = template(data);
                $('#order-items tbody').append(html);
            });

        })

        $('#addItem').on('show.bs.modal', function (e) {
            $("#product-search").val("").trigger("change");
        })


        $('#create-order').on('click', function (e) {

            var tableRows = $('#order-items tbody tr'),
                    products = [];

            $.each(tableRows, function (k, row) {
                products.push($(row).data());
            });

            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "/admin/order",
                method: "POST",
                data: {_token: token, products: products},
                error: function () {
                    toastr.error('Some error occurred while creating order', 'Something Error');
                },
                success: function () {
                    toastr.success('New order has placed successfully.', 'Order Placed');
                }
            })

        });

    });

</script>
@endpush


@include('layouts.footer')