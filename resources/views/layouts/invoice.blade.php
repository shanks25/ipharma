<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} | Ipharma Limited</title>
        <style type="text/css">
            body{
                background: #FFF;
            }
            .container-fluid{
                width: 100%;
            }
            .container{
                width: 100%;
                margin: 10px auto;
            }
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
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
            .header_table tr td:first-child img{
                float: left;
            }
            .header_table tr td:last-child img{
                float: right;
            }
            .pull-right{
                float: right;
            }
            .clear{
                clear: both;
            }
        </style>

    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <div style="display: block; margin-bottom: 10px;">
                    <table class="table table-bordered header_table">
                        <thead>
                            <tr>
                               
                                <td style="border: none"><img src="{{Theme::asset('img/n_logo1-1.gif') }}" width="300"></td>
                            </tr>
                        </thead>
                        <tbody style="margin-bottom: 10px;"></tbody>
                    </table>
                    <div class="clear"></div>
                </div>
                <div style="display: block;">
                    <table class="table table-bordered header_table">
                        <thead>
                            <tr>
                                <td>
                                  
                                </td>
                                <td>
                                    <b style="text-align: right;">Seller</b>
                                    <b style="text-align: right;">IPharma24.com</b>
                                    <p style="text-align: right;">House-477, Road-32, Mohakhali DOHS, Dhaka – 1206,</p>
                                    <p style="text-align: right;">Email: info@Ipharma24.com</p>
                                    <p style="text-align: right;">Hotline: +88018 8222 8 222</p>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <div class="clear"></div>
                </div>
                <div style="display: block">
                    <table style="margin-bottom: 10px;">
                        <thead>
                            <tr>
                                <td>
                                    <b>Buyer</b>
                                    <b>{{ $order->billingAttr->name or '' }}</b>
                                    <p>Address : {{ $order->billingAttr->address or '' }}</p>
                                    <p>Phone : {{ $order->billingAttr->mobile or '' }}</p>
                                    <p>Email : {{ $order->billingAttr->email or '' }}</p>
                                </td>
                                <td>
                                    <br>
                                    <br>
                                    <br>
                                    <b>Proforma Invoice <span class="pull-right">{{ $order->id }}</span></b>
                                    <p>Invoice Date <span class="pull-right">{{ date("d-m-Y", strtotime($order->created_at)) }}</span></p>
                                    <p>Order Amount (BDT) <span class="pull-right">{{ ($order->shipping + $order->net_total) }}</span></p>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div style="display: block;">
                    <table class="table table-bordered">
                        <thead style="background-color: lightgray;">
                            <tr>
                                <th align="center"><p>Product</p></th>
                                <th align="center"><p>Price(MRP)</p></th>
                                <th align="center"><p>Qty</p></th>
                                <th align="center"><p>Total</p></th>
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
                                        {{ $product->product_code or '' }} - {{ $item->name or '' }}<br>
                                        <span style="color: #ddd">{{ isset($product->typeAttrOptions->attributeValue) ? $product->typeAttrOptions->attributeValue->title : '' }}, {{ isset($product->brandattrOptions->attributeValue) ? $product->brandattrOptions->attributeValue->title : '' }}</span>
                                    </p>
                                </td>
                                <td align="center"><p>{{ ($product->price) }}</p></td>
                                <td align="center"><p>{{ $item->qty or '' }}</p></td>
                                <td align="center"><p>{{ $item->price }}</p></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td align="center"><p>Subtotal</p></td>
                                <td align="center"><p>{{ $order->total or 0 }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td align="center"><p>Tonic Discount</p></td>
                                <td align="center"><p>{{ ($order->total - $order->net_total) }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td align="center"><p>Delivery Charge</p></td>
                                <td align="center"><p>{{ $order->shipping or 0 }}</p></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td align="center"><p>Total</p></td>
                                <td align="center" class="gray"><p>{{ ($order->shipping + $order->net_total) }}</p></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row" style="margin: 10px 0;">
                    <b>Amount in words</b>
                    <p></p>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="form-group">
                        <b>Receiver’s Signature and Comments:</b>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="row" style="border-bottom: 2px solid #ddd; padding-bottom: 10px;">
                    <b>Notes</b>
                    <p>Thank you again for your order! Your order and delivery time line will be confirmed over phone with necessary amendments(if any) by service provider IPharma24.com.</p>
                </div>
                <div class="row" style="margin: 10px 0;">
                    <p style="text-align: center">Delivery Type: Regular Delivery. Payment Method: Cash On Delivery.</p>
                    <p style="text-align: center">© Copyright 2016. All Rights Reserved by Ipharma24.com</p>
                </div>
            </div>
        </div>
    </body>
</html>