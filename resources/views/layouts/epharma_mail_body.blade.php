<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} | Ipharma Limited</title>
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
                    <table class="table table-bordered header_table">
                        <thead>
                            <tr style="border: 1px solid #ddd">
                                <th style="border: none;">
                                    <img src="{{Theme::asset('img/epahrma_mail_logo.png') }}">
                                </th>
                                <th style="border: none; text-align: right">
                                    <b>IPharma24.com</b>
                                    <span style="display: block; margin: 0">Hotline: +88018 8222 8 222</span>
                                    <span style="display: block; margin: 0">Email: info@Ipharma24.com</span>
                                    <span style="display: block; margin: 0">www.Ipharma24.com</span>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div style="display: block; margin: 10px 0; width: 100%; padding: 20px 0;">
                        <p style="margin-bottom: 20px;">Hi 
                            @if(isset($order->user->name))
                            {{ $order->user->name }}
                            @else
                            {{ $order->billingAttr->name }}
                            @endif,</p>
                        <p>Greetings from IPharma!<p>
                        <p style="margin-bottom: 20px;">
                            We are happy to receive your order #{{ $order->id }} and save your 2 hours by avoiding traffic and long queue in
                            pharmacy stores. Now you can spend some quality time with your family or friends. Enjoy!
                            You will receive a phone call for verification & price/delivery confirmation from us. Appreciate your cooperation.
                            IPharma24.com
                        </p>
                        <p style="margin-bottom: 20px;">
                            You will receive a phone call for verification & price/delivery confirmation from us. Appreciate your cooperation.
                            IPharma24.com 
                        </p>
                        <p>
                            Thank you for shopping with us. Below is the summary of your order.
                            IPharma24.com

                        </p>
                    </div>

                    <table class="table header_table" style="margin: 20px 0;">
                        <thead>
                            <tr>
                                <td style="text-align: left">
                                    <p>Buyer: <b>{{ $order->billingAttr->name or '' }}</b></p>
                                    <p>Address: {{ $order->billingAttr->address or '' }}</p>
                                    <p>Phone: {{ $order->billingAttr->mobile or '' }}</p>
                                    <p>Email: {{ $order->billingAttr->email or '' }}</p>
                                </td>
                                <td style="text-align: right">
                                    <p style="text-align: right"><b>Proforma Invoice</b>: {{ $order->id }}</p>
                                    <p style="text-align: right">Order Date: {{ date("d-m-Y", strtotime($order->created_at)) }}</p>
                                    <p style="text-align: right">Delivery Date: {{ date("d-m-Y", strtotime($order->pickup_date)) }}</p>
                                    <p style="text-align: right">Payment Mode: {{$order->payment->payment_type}}</p>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead style="background-color: lightgray;">
                            <tr>
                                <th align="center"><p>Product</p></th>
                                <th align="center"><p>MRP</p></th>
                                <th align="center"><p>Discounted Price</p></th>
                                <th align="center"><p>Qty</p></th>
                                <th align="center"><p>Price</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl = 1;
                            ?>
                            @foreach($order->items as $item)
                            @php
                            $product = $item->product;
                            @endphp
                            <tr>
                                <td>
                                    <p>
                                        {{ $sl++ }} {{ $product->product_code }} - {{ $item->name or '' }}<br> 
                                        <span style="color: #575757">@if(isset($product->typeAttrOptions->attributeValue))
                                            Type : {{ $product->typeAttrOptions->attributeValue->title }}, 
                                            @endif
                                            @if(isset($product->brandattrOptions->attributeValue))
                                            Company : {{ $product->brandattrOptions->attributeValue->title }}
                                            @endif
                                        </span>
                                    </p>
                                </td>
                                <td style="text-align: center;"><p>{{ ($product->price) }}</p></td>
                                <td style="text-align: center;"><p>{{ ($item->price / $item->qty) }}</p></td>
                                <td style="text-align: center;"><p>{{ $item->qty or '' }}</p></td>
                                <td style="text-align: center;"><p>{{ number_format($item->price, 2) }}</p></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none" colspan="3"></td>
                                <td style="border: none" style="text-align: right;"><p>Subtotal:</p></td>
                                <td style="border: none" style="text-align: center;"><p>{{ number_format($order->total, 2) }}</p></td>
                            </tr>
                            <tr>
                                <td style="border: none" colspan="3"><p>Amount in words: </p></td>
                                <td style="border: none" style="text-align: right;"><p>Discount:</p></td>
                                <td style="border: none" style="text-align: center;"><p>{{ number_format(($order->total - $order->net_total), 2) }}</p></td>
                            </tr>
                            <tr>
                                <td style="border: none" colspan="3"></td>
                                <td style="border: none" style="text-align: right;"><p>Delivery Charge:</p></td>
                                <td style="border: none" style="text-align: center;"><p>{{ number_format($order->shipping, 2) }}</p></td>
                            </tr>
                            <tr>
                                <td style="border: none" colspan="3"></td>
                                <td style="border: none" style="text-align: right;"><p>Total:</p></td>
                                <td style="border: none" style="text-align: center;"><p>{{ number_format(($order->shipping + $order->net_total), 2) }}tk</p></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--                <div class="row" style="margin: 30px 0;">
                                    <b style="color: #007cc3">Customer Details</b>
                                    <ul>
                                        <li><p>Email : {{ $order->billingAttr->email or '' }}</p></li>
                                        <li><p>Phone : {{ $order->billingAttr->mobile or '' }}</p></li>
                                    </ul>
                                </div>-->
                <!--                <table class="table table-bordered header_table" style="margin: 20px 0;">
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
                                </table>-->
                <div class="row" style="border-bottom: 2px solid #ddd; margin-top: 20px; padding-bottom: 30px;">
                    <p style="text-align: center"><b>Notes:</b> For ordered medicines you may need to show your prescriptions to our delivery person while delivering to your
                        given location. </p>
                        <!--                    <p style="text-align: center;">Thank you again for your order!<br>
                                                Your order and delivery time line will be confirmed<br>
                                                over phone with necessary amendments(if any) by service provider <a href="http://Ipharma24.com" target="_blank">IPharma24.com</a>.<br>
                                                Please note that, the discount rate is an exclusive offer and only applicable for Tonic members.
                                            </p>-->
                </div>
                <div class="row" style="margin: 20px 0;">
                    <p style="text-align: center">Delivery Type: 
                        <?php
                        if ($order->pickup_time == 1) {
                            ?>
                            Regular Delivery;
                            <?php
                        } elseif ($order->pickup_time == 2) {
                            ?>
                            Express Delivery
                            <?php
                        } else {
                            ?>
                            Free Delivery
                            <?php
                        }
                        ?>
                        Payment Method: Cash On Delivery.</p>
                    <p style="text-align: center">© Copyright 2016. All Rights Reserved by Ipharma24.com</p>
                </div>
            </div>
        </div>
    </body>
</html>