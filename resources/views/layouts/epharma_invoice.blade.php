<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} | Ipharma Limited</title>
        <style type="text/css">
            body{
                background: #FFF;
                width: 100%;
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
                            <tr style="border: 1px dotted #333">
                                <th style="border: none;">
                                    <img src="{{Theme::asset('img/epahrma_mail_logo.png') }}">
                                </th>
                                <th style="border: none; text-align: right">
                                    <p style="margin: 0; padding: 0;"><b>IPharma24.com</b></p>
                                    <p style="display: block; margin: 0; padding: 0;">Hotline:+88018 8222 8222</p>
                                    <p style="display: block; margin: 0; padding: 0;">Email:info@Ipharma24.com</p>
                                    <p style="display: block; margin: 0; padding: 0;">www.Ipharma24.com</p>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <table class="table header_table" style="margin: 20px 0;">
                        <thead>
                            <tr>
                                <td style="text-align: left">
                                    <p>Buyer: <b>{{ $order->billingAttr->name or '' }}</b></p>
                                    <p>Address: {{ $order->billingAttr->address or '' }}</p>
                                    <p>Phone: {{ $order->billingAttr->mobile or '' }} Email: {{ $order->billingAttr->email or '' }}</p>
                                </td>
                                <td style="text-align: left">
                                    <p style="font-weight: bold; border-bottom: 1px solid #333">Proforma Invoice: <span style="float: right">{{ $order->id }}</span></p>
                                    <p style="border-bottom: 1px solid #333">Order Date: <span style="float: right">{{ date("d-m-Y", strtotime($order->created_at)) }}</p>
                                    <p style="border-bottom: 1px solid #333">Delivery Date: <span style="float: right">{{ date("d-m-Y", strtotime($order->pickup_date)) }}</p>
                                    <p style="border-bottom: 1px solid #333">Order Amount: <span style="padding: 0; font-weight: bold; float: right">{{ number_format(($order->shipping + $order->net_total),2) }}tk</span></p>
                                    <p style="border-bottom: 1px solid #333">Payment Mode: <span style="float: right">{{$order->payment->payment_type}}</p>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead style="background-color: lightgray;">
                            <tr>
                                <th style="width: 58%;" align="center"><p>Product</p></th>
                                <th style="width: 10%;" align="center"><p>MRP</p></th>
                                <th style="width: 15%;" align="center"><p>Discounted Price</p></th>
                                <th style="width: 7%;" align="center"><p>Qty</p></th>
                                <th style="width: 10%;" align="center"><p>Price</p></th>
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
                                <td style="width: 58%;">
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
                                <td style="width: 10%;" align="center"><p>{{ ($product->price) }}</p></td>
                                <td style="width: 15%;" align="center"><p>{{ ($item->price / $item->qty) }}</p></td>
                                <td style="width: 7%;" align="center"><p>{{ $item->qty or '' }}</p></td>
                                <td style="width: 10%;" align="center"><p>{{ number_format($item->price, 2) }}</p></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <!--<td style="border: none" colspan="3"></td>-->
                                <td style="border: none" align="right" colspan="3"><p>Subtotal:</p></td>
                                <td style="border: none" align="right" colspan="2"><p>{{ number_format($order->total, 2) }}</p></td>
                            </tr>
                            <tr>
                                <td style="border: none" colspan="2"><p>Amount in words: </p></td>
                                <td style="border: none" align="right"><p>Discount:</p></td>
                                <td style="border: none" align="right" colspan="2"><p>{{ number_format(($order->total - $order->net_total), 2) }}</p></td>
                            </tr>
                            <tr>
                                <!--<td style="border: none" colspan="3"></td>-->
                                <td style="border: none" align="right" colspan="3"><p>Delivery Charge:</p></td>
                                <td style="border: none" align="right" colspan="2"><p>{{ number_format($order->shipping, 2) }}</p></td>
                            </tr>
                            <tr>
                                <!--<td style="border: none" colspan="3"></td>-->
                                <td style="border: none" align="right" colspan="3"><p>Order Total:</p></td>
                                <td style="border: none" align="right" colspan="2"><p>{{ number_format(($order->shipping + $order->net_total), 2) }}tk</p></td>
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
                <div class="row" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <b>Receiver’s Signature and Comments:</b>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="row" style="border-bottom: 2px solid #ddd; margin-top: 20px; padding-bottom: 30px;">
                    <p style="text-align: center"><b>Notes:</b> Thank you for your order! We will confirm your order over phone and delivery timeline with updated product price(if any).For ordered medicines you may need to show your prescription to our delivery person while delivering. </p>
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
                            Regular Delivery.
                            <?php
                        } elseif ($order->pickup_time == 2) {
                            ?>
                            Express Delivery.
                            <?php
                        } else {
                            ?>
                            Free Delivery.
                            <?php
                        }
                        ?>
                        Payment Method: {{$order->payment->payment_type}}.</p>
                    <p style="text-align: center">© Copyright 2016. All Rights Reserved by Ipharma24.com</p>
                </div>
            </div>
        </div>
    </body>
</html>