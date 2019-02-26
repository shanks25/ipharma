@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row" style="background: #9CC2CB">
        <div class="col-xs-12">
            <b style="color: #000; font-size: 16px; line-height: 35px;">
                 Customer Name :{{$order->user->first_name}} {{$order->user->last_name}} {{--{{ (isset($order->user->name)) ? $order->user->first_name.last_name : 'Guest' }} --}}
            </b>
            <a href="{{URL::to('admin/invoice/'.$order->id)}}">
                <button class="btn btn-dark pull-right">Download PDF</button>
            </a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Order Details</h4>
                </div>

                <div class="x_content">
                    {!! Form::open(array('url' => 'admin/order', 'method' => 'PUT', 'id'=>'create-form')) !!}
                    <div class="form-horizontal">
                        <div class="form-group">
                            {{ Form::label('status', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                <?php
                                $orderStatus = [
                                    '0' => 'Processing',
                                    '1' => 'Order Placed',
                                    '2' => 'On the way to delivery address',
                                    '3' => 'Delivered',
                                    '4' => 'On Hold',
                                    '5' => 'Cancelled'
                                ];

                                $statusSelected = (isset($order->status)) ? $order->status : 0;
                                ?>
                                {{ Form::select('status', $orderStatus, $statusSelected, ['class' => 'form-control']) }}
                                {{Form::hidden('id', $order->id)}}
                                {{Form::hidden('sms_mobile', $billing->mobile)}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button id="create-order" type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>                       
                        </div>  
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h4>Payment Details</h4>
                </div>

                <div class="x_content">
                    {!! Form::open(array('url' => 'admin/payment-status/'.$order->id, 'method' => 'POST', 'id'=>'create-form')) !!}
                    <div class="form-horizontal">
                        <div class="form-group">
                            {{ Form::label('Payment', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                <?php
                                $paymentStatus = [
                                    '1' => 'SUCCESS',
                                    '2' => 'PENDING',
                                    '3' => 'CANCELED',
                                    '4' => 'FAILED',
                                ];

                                $paymentSelected = (isset($order->payment->status)) ? $order->payment->status : 2;
                                ?>
                                {{ Form::select('payment_status', $paymentStatus, $paymentSelected, ['class' => 'form-control']) }}
                                {{Form::hidden('id', $order->id)}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button id="payment-confirm" class="btn btn-primary btn-block">Update</button>
                            </div>                       
                        </div>  
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title row">
                    <div class="col-sm-12">
                        <h4>Order items (Order ID - {{ $order->id }})<span class="pull-right" style="color: inherit">Order Date - {{ date("F j, Y", strtotime($order->created_at)) }}</span></h4>
                        <h4>Pickup Date - {{ date("F j, Y", strtotime($order->pickup_date)) }}<span class="pull-right" style="color: inherit">Order Time -  {{ date("g:i A", strtotime($order->created_at)) }}</span></h4>
                    </div>

                    <!--                    <div class="col-sm-6">
                                            <button href="#" class="btn btn-primary btn-sm pull-right" id="create-order" data-toggle="modal" data-target="#addItem">Add Items</button>
                                        </div>-->
                </div>
                <div class="x_content">

                    <table class="table" id="order-items">
                        <thead>
                            <tr>
                                <th width="20%">Product Code</th>
                                <th width="40%">Description</th>

                                <th width="20%">Original Price</th>
                                <!--<th width="20%">Discount Price</th>-->
                                <th width="20%">Qty</th>
                                <th width="20%">Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(isset($order))
                            @foreach($order->items as $products)
                            
                            @php
                            $product = $products->product;
                            @endphp

                            <tr data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                                <td> {{ $product->id }} </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->price }} </td>
                                <!--<td> {{ $products->price / $products->qty }} </td>-->
                                <td> {{ $products->qty }} </td>
                                <td> {{ $products->price }} </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Sub-total : </th>
                                <th> {{ $order->total or '' }} </th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Discount (-) : </th>
                                <th> {{ $order->total - $order->net_total }} </th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Shipping Fee (+) : </th>
                                <th> {{ $order->shipping or 0 }} </th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-right">Total : </th>
                                <th> {{ ($order->net_total + $order->shipping) }} </th>
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
                                <td class="col-xs-7"> : {{ $billing->name}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Mobile</td>
                                <td class="col-xs-7">: {{ $billing->mobile}}</td>
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
                                <td class="col-xs-3">District</td>
                                <td class="col-xs-7">: {{ isset($billing->zilla) ? $billing->zilla->name : '' }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Area</td>
                                <td class="col-xs-7">: {{ isset($billing->upazilla) ? $billing->upazilla->name : '' }}</td>
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
                                <td class="col-xs-7"> : {{ $shipping->name}}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Mobile</td>
                                <td class="col-xs-7">: {{ $shipping->mobile}}</td>
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
                                <td class="col-xs-3">District</td>
                                <td class="col-xs-7">: {{ isset($shipping->zilla) ? $shipping->zilla->name : '' }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-3">Area</td>
                                <td class="col-xs-7">: {{ isset($shipping->upazilla) ? $shipping->upazilla->name : '' }}</td>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $('#create-order').on('click', function (e) {
            e.preventDefault();

            var form = $(this).closest('form');
            var formData = form.serializeArray();

            var id = form.find("input[name=id]").val();
            console.log(id);
            $.ajax({
                url: "/admin/order/" + id,
                method: "POST",
                data: formData,
                success: function (res) {
                    if (res.success == 1) {
                        swal('Updated!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }
                }
            });

        });
        
        $('#payment-confirm').on('click', function (e) {
            e.preventDefault();

            var form = $(this).closest('form');
            var formData = form.serializeArray();

            var id = form.find("input[name=id]").val();
            console.log(id);
            $.ajax({
                url: "/admin/payment-status/" + id,
                method: "POST",
                data: formData,
                success: function (res) {
                    if (res.success == 1) {
                        swal('Updated!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }
                }
            });

        });
    });
</script>
@endpush

@include('layouts.footer')