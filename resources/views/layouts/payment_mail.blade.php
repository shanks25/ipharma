<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $payment->order_id }} | Ipharma Limited</title>

        <!--<link href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">-->

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-large;
            }
            table tr td{
                font-weight: bold;
                font-size: x-large;
            }

            .gray {
                background-color: lightgray
            }

            .comments{
                font-size: x-large;
            }
        </style>

    </head>
    <body>

        <div style="display: block; text-align: center">
            <img src="{{ Theme::asset('img/logo.png') }}" alt="" />
        </div>

        <div style="display: block;">

            <table width="100%">
                <tr>
                    <td>
                        <strong>From:</strong> Admin
                        <br>
                        Ipharma Limited
                    </td>
                </tr>

            </table>

            <br/>

            <table width="100%">
                <thead style="background-color: lightgray; width: 100%;">
                    <tr style="text-align: center">
                        <th style="text-align: center">Payment Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Invoice Number</td>
                        <td>Invoice # {{ $payment->order_id or '' }}</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>{{ $payment->amount or '' }}</td>
                    </tr>
                    <tr>
                        <td>Purchase Time</td>
                        <td>{{ $payment->tran_date or '' }}</td>
                    </tr>
                    <tr>
                        <td>Transaction ID</td>
                        <td>{{ $payment->transaction_id or '' }}</td>
                    </tr>
                    <tr>
                        <td>Bank Transaction ID</td>
                        <td>{{ $payment->bank_tran_id or '' }}</td>
                    </tr>
                    <tr>
                        <td>Card No</td>
                        <td>{{ $payment->card_no or '' }}</td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td>
                            @if($payment->status == 1)
                            Success
                            @else
                            Failed
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="comments">
            <strong>Thank you</strong>
            <a style="display: block" href="http://www.Ipharmalimited.com/" target="_blank">Ipharma24</a>
        </div>

    </body>
</html>