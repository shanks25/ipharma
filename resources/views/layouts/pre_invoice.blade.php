<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} |  Ipharma24.com</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
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
        </style>

    </head>
    <body>

        <table width="100%">
            <tr>
                <td valign="top">
                        <!-- <img src="{{ Theme::asset('img/logo.jpg') }}" alt="" width="150"/> -->
                    <h2>Ipharma - ( Ipharma24.com )</h2>
                    @if($order->user->id == 50)
                    <h3>Telenor Invoice # {{ $order->id }}</h3>
                    @else
                    <h3>Invoice # {{ $order->id }}</h3>
                    @endif
                    @if($order->payment->payment_type == 'tco')
                    <p>Payment Type # Online Payment</p>
                    @else
                    <p>Payment Type # Cash On Delivery</p>
                    @endif
                </td>
                <td align="right">
                    <pre>
                Mohakhali DOHS
                House # 112
                Phone 01234567890
                    </pre>
                </td>
            </tr>

        </table>

        <table width="100%">
            <tr>
                <td>
                    <strong>From:</strong> Ipharma
                </td>


                <td>
                    <strong>To:</strong> 
                    {{ $order->billingAttr->name or '' }}
                    <br>
                    {{ $order->billingAttr->address or '' }}
                    <br>
                    {{ $order->billingAttr->city or '' }}
                    {{ $order->billingAttr->country or '' }}
                    <br>
                    District : {{ $order->billingAttr->zilla->name or '' }}
                    <br>
                    Upazilla : {{ $order->billingAttr->upazilla->name or '' }}
                    <br>
                    Mobile : {{ $order->billingAttr->mobile or '' }}
                </td>

                <td>
                    <strong>Shipping:</strong> 
                    {{ $order->shippingAttr->name or '' }}
                    <br>
                    {{ $order->shippingAttr->address or '' }}
                    <br>
                    {{ $order->shippingAttr->city or '' }}
                    {{ $order->shippingAttr->country or '' }}
                    <br>
                    District : {{ $order->shippingAttr->zilla->name or '' }}
                    <br>
                    Upazilla : {{ $order->shippingAttr->upazilla->name or '' }}
                    <br>
                    Mobile : {{ $order->shippingAttr->mobile or '' }}
                </td>
            </tr>

        </table>

        <br/>

        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>#</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price (BDT)</th>
                    <th>Total (BDT)</th>
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
                    <th scope="row">{{ $sl++ }}</th>
                    <td> {{ $product->product_code or '' }} </td>
                    <td> {{ $item->name or '' }} </td>
                    <td align="right"> {{ $item->qty or '' }} </td>
                    <td align="right">{{ ($product->price-$product->discount) }}</td>
                    <td align="right">{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td align="right">Subtotal</td>
                    <td align="right"> {{ $order->total or 0 }} </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td align="right">Shipping Charge </td>
                    <td align="right"> {{ $order->shipping or 0 }} </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td align="right">Total</td>
                    <td align="right" class="gray">BDT {{ ($order->shipping + $order->total) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="comments">
            <strong>Customer Comment:</strong>
            {{ $order->comments or '' }}
        </div>

    </body>
</html>