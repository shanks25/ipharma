@include('Theme::header')
<div role="main" class="main">
    @include('Theme::ajax_search')
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-xs-12">
                <h3>Order Info</h3>
                <p>Congratulation your order successfully store! Very soon our customer care person contact with you!</p>
            </div>
        </div>
    </div>
    <div class="container" style="background: skyblue; padding-top: 15px;">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-condensed table-hover" style="background: #fff;">
                    <thead>
                        <h3>Billing Address</h3>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-xs-3">Name</td>
                            <td class="col-xs-7">{{ $billing->first_name}} {{ $billing->last_name}} </td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Mobile</td>
                            <td class="col-xs-7">{{ $billing->mobile}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Email</td>
                            <td class="col-xs-7">{{ $billing->email}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Address</td>
                            <td class="col-xs-7">{{ $billing->address}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Order Id</td>
                            <td class="col-xs-7">{{ $order->id}}</td>
                        </tr>
                             <tr>
                            <td class="col-xs-3">Payment Status</td>
                            <td class="col-xs-7">Cash On Delivery</td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>

                        </tr>
                        <tr>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-condensed table-hover" style="background: #fff;">
                    <thead>
                        <h3>Shipping Address</h3>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-xs-3">Name</td>
                            <td class="col-xs-7">{{ $shipping->name}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Mobile</td>
                            <td class="col-xs-7">{{ $shipping->mobile}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Email</td>
                            <td class="col-xs-7">{{ $shipping->email}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Address</td>
                            <td class="col-xs-7">{{ $shipping->address}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Country</td>
                            <td class="col-xs-7">{{ $shipping->country}}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">District</td>
                            <td class="col-xs-7">{{ isset($shipping->zilla) ? $shipping->zilla->name : '' }}</td>
                        </tr>
                        <tr>
                            <td class="col-xs-3">Area</td>
                            <td class="col-xs-7">{{ isset($shipping->upazilla) ? $shipping->upazilla->name : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-condensed table-hover" style="margin-bottom: 15px; background: #fff;">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Description</th>
                            <th>Original Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($order))
                        @foreach($order->items as $products)

                        @php
                        $product = $products->product;
                        @endphp

                        <tr data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                            <td> {{ $product->product_code }} </td>
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
            </table>
        </div>
    </div>
</div>


</div>


@include('Theme::footer')

</body>
</html>
