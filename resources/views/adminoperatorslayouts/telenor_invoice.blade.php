<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} | Epharma Limited</title>
        <style type="text/css">
            body{
                background: #FFF;
                width: 70%;
                margin: 0 auto;
            }
            .container-fluid{
                width: 100%;
            }
            .container{
                width: 90%;
                margin: 10px auto;
            }
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
                border-collapse: collapse;
            }
            .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th{
                border: 1px solid #ddd;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }

            .gray {
                background-color: lightgray
            }

            .comments{
                font-size: x-small;
            }
            b{
                display: block;
                font-size: 14px;
                padding-left: 10px;
                padding-right: 10px;
            }
            p{
                font-size: 12px;
                margin: 5px 0;
                padding-left: 10px;
                padding-right: 10px;
            }
            span{
                margin-right: 30px;
            }
            .form-control{
                border: 1px solid #000;
            }
            table{
                width: 100%;
            }
            .form-control{
                display: block;
                width: 100%;
            }
            .header_table tr th:first-child img{
                float: left;
                display: block;
            }
            .header_table tr th:last-child img{
                float: right;
                display: block;
            }
            .pull-right{
                float: right;
            }
        </style>

    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <table class="table table-bordered header_table" style="margin: 20px 0;">
                        <thead>
                            <tr>
                                <th style="border: none;">
                                    <img src="{{Theme::asset('img/tonic_yellow.png') }}"><br>
                                </th>
                                <th style="border: none;">
                                    <img src="{{Theme::asset('img/n_logo1-1.gif') }}">
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div style="display: block; margin: 10px 0; width: 100%; background: #007cc3; padding: 20px 0;">
                        <h2 style="text-align: center; color: #FFF;">Customer Order</h2>
                    </div>
                    <p style="margin: 20px 0; font-size: 12px; padding-left: 0;">An order has been placed by <strong>{{ $order->billingAttr->name or 'New Customer' }}</strong>, The order is as follows:</p>
                    <h3 style="color:#007cc3; ">Order # {{ $order->id }} ( {{ date("d-M, Y", strtotime($order->created_at)) }} )</h3>
                    <table class="table table-bordered">
                        <thead style="background-color: lightgray;">
                            <tr>
                                <th align="center"><p>Product</p></th>
                                <th align="center"><p>Qty</p></th>
                                <th align="center"><p>Price</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            @php
                            $product = $item->product;
                            @endphp
                            <tr>
                                <td>
                                    <p>
                                        (#{{ $product->product_code }}) - {{ $item->name or '' }}<br>
                                    </p>
                                </td>
                                <td align="center"><p>{{ $item->qty or '' }}</p></td>
                                <td align="center"><p>{{ $item->price }}</p></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="1"></td>
                                <td align="center"><p>Subtotal</p></td>
                                <td align="center"><p>{{ $order->total or 0 }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td align="center"><p>Tonic Discount</p></td>
                                <td align="center"><p>{{ ($order->total - $order->net_total) }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td align="center"><p>Delivery Charge</p></td>
                                <td align="center"><p>{{ $order->shipping or 0 }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td align="center"><p>Total</p></td>
                                <td align="center" class="gray"><p>{{ ($order->shipping + $order->net_total) }}</p></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row" style="margin: 30px 0;">
                    <b style="color: #007cc3">Customer Details</b>
                    <ul>
                        <li><p>Email : {{ $order->billingAttr->email or '' }}</p></li>
                        <li><p>Phone : {{ $order->billingAttr->mobile or '' }}</p></li>
                    </ul>
                </div>
                <table class="table table-bordered header_table" style="margin: 20px 0;">
                    <thead>
                        <tr>
                            <td>
                                <b style="color: #007cc3">Billing Address</b>
                                <b>{{ $order->billingAttr->name or '' }}</b>
                                <p>Address : {{ $order->billingAttr->address or '' }}</p>
                                <p>Phone : {{ $order->billingAttr->mobile or '' }}</p>
                                <p>Email : {{ $order->billingAttr->email or '' }}</p>
                                <p>Country : {{ $order->billingAttr->country or '' }}</p>
                            </td>
                            <td>
                                <b style="color: #007cc3">Shipping Address</b>
                                <b>{{ $order->billingAttr->name or '' }}</b>
                                <p>Address : {{ $order->billingAttr->address or '' }}</p>
                                <p>Phone : {{ $order->billingAttr->mobile or '' }}</p>
                                <p>Email : {{ $order->billingAttr->email or '' }}</p>
                                <p>Country : {{ $order->billingAttr->country or '' }}</p>
                            </td>
                        </tr>
                    </thead>
                </table>
                <div class="row" style="border-bottom: 2px solid #ddd; margin-top: 10px; padding-bottom: 30px;">
                    <p style="text-align: center;">Thank you again for your order!<br>
                        Your order and delivery time line will be confirmed<br>
                        over phone with necessary amendments(if any) by service provider <a href="http://epharma.com.bd" target="_blank">ePharma.com.bd</a>.<br>
                        Please note that, the discount rate is an exclusive offer and only applicable for Tonic members.
                    </p>
                </div>
                <div class="row" style="margin: 20px 0;">
                    <p style="text-align: center">Delivery Type: Regular Delivery. Payment Method: Cash On Delivery.</p>
                    <p style="text-align: center">© Copyright 2016. All Rights Reserved by Limitless Solutions Limited.</p>
                </div>
            </div>
        </div>
    </body>
</html>