<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice #{{ $order->id }} | Epharma Limited</title>
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
                <img style="width: 100%;" src="{{ URL::asset('prescription/'. $order->prescription) }}"/>
            </div>
        </div>
    </body>
</html>