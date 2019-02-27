 @extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')
<style>
    .cart-table tbody tr td{
        padding: 5px 10px;
    }
</style>


<div role="main" class="main">
 

    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-md-9 col-md-push-3 my-account">
                <h1 class="h2 heading-primary font-weight-normal">{{ $userInfo->name }} - Order History</h1>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <h2 class="h3 mb-sm"><strong>Details Order History</strong></h2>

                <div class="row">
                    <div class="col-sm-12">
                        <fieldset>
                            <table id="shopping-cart-table" class="data-table cart-table">
                                @forelse($userOrder->orders as $val)
                                <tbody style="border: 3px solid #808080; box-shadow: 0 0 2px 0;">
                                    <tr>
                                        <td class="text-info" style="font-weight: bold">&nbsp;&nbsp;Order Id : {{ $val->id }}</td>
                                        <td>&nbsp;&nbsp;Total : ৳{{ number_format($val->total) }} </td>
                                        <td>Status : 
                                            @if($val->status == 0)
                                            &nbsp;&nbsp;<b class="text-primary">Processing</b>
                                            @elseif($val->status == 1)
                                            &nbsp;&nbsp;<b class="text-info">On Hold</b>
                                            @elseif($val->status == 3)
                                            &nbsp;&nbsp;<b class="text-info">Cancel</b>
                                            @else
                                            &nbsp;&nbsp;<b class="text-success">Delivered</b>
                                            @endif
                                        </td>
                                        <td>Order Date : {{ date("F j, Y", strtotime($val->created_at)) }}</td>
                                        <form action="{{ url('order-info',$val->id) }}" method="get">
                                        <td><button class="btn btn-info">Invoice</button></td></form>
                                    </tr>
                                    @foreach($val->items as $orderItems)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" title="" class="product-image">
                                                <img src="{{ asset('/storage/'.$orderItems->product->media[0]->src) }}" alt="" height="80" width="80">
                                            </a>
                                        </td>

                                        <td class="td-product-name">
                                            <h4 class="product-name">
                                                <a href="{{ URL::to('product/'. $orderItems->id) }}">
                                                    {{ $orderItems->name }}
                                                </a>
                                            </h4>
                                        </td>

                                        <td class="product-unit-price a-center">
                                            <span class="cart-price">
                                                <span class="price">৳{{ number_format($orderItems->price/$orderItems->qty) }}</span>
                                            </span>
                                        </td>

                                        <td class="a-center product-qty">
                                            <input readonly name="product_qty" id="cart[6dc30fa7e7024b6dcb0329bbb754b757][qty]" value="{{ $orderItems->qty }}" size="4" title="Qty" class="input-text qty" maxlength="12">
                                        </td>

                                        <td class="a-center product-subtotal">
                                            <span class="cart-price"> <span class="price">৳{{ number_format($orderItems->price) }}</span> </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @empty
                                <p>No Orders</p>
                                @endforelse
                            </table>
                        </fieldset>
                    </div>
                </div>


            </div>

      @include('frontendlayout.user_sidebar')

        </div>
    </div>

</div>

@endsection

 