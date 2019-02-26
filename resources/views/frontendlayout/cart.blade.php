<body class="cart-box-body">
    @if(Cart::content()->count())
    <div class="cart-box">
        <div class="cart-items text-center">
            <span class="cart-count">{{Cart::count()}}</span><span>&nbsp;Items</span>
        </div>
        <div class="cart-bag text-center">
            <i style="color: #FFF" class="fa fa-shopping-bag fa-2x"></i>
        </div>
        <div class="cart-amount">
            <span class="cart-amount-span">৳ {{ number_format(Cart::total()) }}</span>
        </div>
    </div>
    @else
    <div class="cart-box">
        <div class="cart-items text-center">
            <span class="cart-count">0</span><span>&nbsp;Items</span>
        </div>
        <div class="cart-bag text-center">
            <i style="color: #FFF" class="fa fa-shopping-bag fa-2x"></i>
        </div>
        <div class="cart-amount">
            <span class="cart-amount-span">৳ 0</span>
        </div>
    </div>
    @endif
    <div class="cart-box-view">
        <div class="cart-box-inner-view">
            <div class="cart-header">
                <div class="col-sm-5">
                    <img class="header-bag" src="{{Theme::asset('img/shopping-bag.png') }}"/><strong><span class="cart-count">{{Cart::count()}}</span> Item</strong>
                </div>
               <button class="btn btn-info pull-right cart-hide-btn">Hide</button>
                <!--<button class="btn btn-dark pull-right" id="empty_cart_button">Clear Cart</button>-->
                <div class="clearfix"></div>
            </div>
            <div class="cart-body text-center">
                <p class="text-danger background-color-tertiary minimum-qty" style="padding: 5px 0; margin: 0; display: none;">You must order this minimum quantity for this product!</p>
                <p class="text-danger background-color-tertiary minimum-amount" style="padding: 5px 0; margin: 0; display: none;">Minimum order amount must ৳300.</p>
                <div class="cart-table-wrap" style="padding: 0; border-radius: 0; margin-bottom: 0;">
                    @if(Cart::content()->count())
                    <table style="width: 100%; font-size: 11px;" class="cart-table">
                        <tbody>
                            @foreach(Cart::content() as $row)
                            <tr>
                                <td class="product-image-td">
                                    <a href="{{ url('product/'.$row->id) }}" title="Product Name">
                                        @if($row->options->has('img'))
                                      
                                        @endif
                                        <!--<img src="{{ Theme::asset('img/products/cart-product1.jpg') }}" alt="Product Name">-->
                                    </a>
                                </td>
                                <td class="product-name-td">
                                    <span class="text-primary">{{ $row->name }}</span>
                                    <br>
                                    @if($row->options->productPrice == $row->price)
                                    <strong>৳ {{ $row->options->productPrice }}</strong>
                                    @else
                                    <span style="font-size: 11px;"><del>৳ {{ $row->options->productPrice }}</del></span><strong>৳ {{ $row->price }}</strong>
                                    @endif
                                </td>
                                <td style="vertical-align: middle">
                                    <div class="qty-holder" style="width: 90px;">
                                        <a href="#" class="qty-dec-btn" rowId="{{ $row->rowId }}" title="Dec" style="width: 22px;">-</a>
                                        <input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="{{ $row->qty }}">
                                        <a href="#" class="qty-inc-btn" rowId="{{ $row->rowId }}" title="Inc" style="width: 22px;">+</a>
                                    </div>
                                </td>
                                <td>
                                    @if($row->options->productPrice != $row->price)
                                    <span class="text-primary"><del>৳{{ number_format($row->options->productPrice*$row->qty, 1) }}</del></span><br>
                                    @endif
                                    <span class="text-danger">৳{{ number_format($row->price*$row->qty, 1) }}</span>
                                </td>
                                <td class="product-delete" style="padding: 15px 5px;">
                                    <a href="#" title="Remove product" data-rowId="{{ $row->rowId }}"><i class="fa fa-times text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else

                    <img src="{{Theme::asset('img/empty_bag.png') }}">
                    <span>Your shopping bag is empty. Start shopping now.</span> 

                    @endif
                </div>
                <!--<img src="{{Theme::asset('img/empty_bag.png') }}">-->
                <!--<span>Your shopping bag is empty. Start shopping now.</span>--> 
                <div class="clearfix"></div>
            </div>
            <div class="cart-footer">
                <button id="checkout-button" style="border-radius: 6px 0 0 6px;" class="btn btn-success pull-left">Order Now</button>
                <input type="hidden" value="{{ number_format(Cart::total()) }}" name="cart-total"/>
                @if(Cart::content()->count())
                <span style="border-radius: 0 6px 6px 0;" class="btn btn-info cart-amount-span">৳ {{ number_format(Cart::total()) }}</span>
                @else
                <span style="border-radius: 0 6px 6px 0;" class="btn btn-info cart-amount-span">৳ 0</span>
                @endif
                @if(Cart::content()->count())
                <?php
                $sum = 0;
                foreach (Cart::content() as $item) {
                    $sum =$sum + $item->options->productPrice * $item->qty;
                }
                ?>
                <a style="color: #ddd">&nbsp;&nbsp;&nbsp;Saved <span class="saved-amount" >৳{{$sum - Cart::total()}}</span></a>
                @else
                <a style="color: #ddd">&nbsp;&nbsp;&nbsp;Saved <span class="saved-amount" >৳0</span></a>
                @endif
                <a id="empty_cart_button" href="#">
                    <i style="color: #000; margin-right: 15px;" class="fa fa-shopping-cart fa-2x pull-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>