@include('Theme::header')

<div role="main" class="main">
    <div class="cart">
        <div class="container">
            <h1 class="h2 heading-primary mt-lg clearfix">
                <span>Shopping Cart</span>
                <a href="{{ url('checkout') }}" class="btn btn-primary pull-right">Proceed to Checkout</a>
            </h1>

            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="cart-table-wrap">
                        @if(Cart::content()->count())
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $row)
                                <tr>
                                    <td class="product-delete product-action-td">
                                        <a href="#" title="Remove product" class="btn-remove" data-rowId="{{ $row->rowId }}"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td class="product-image-td">
                                        <a href="{{ url('product/'.$row->id) }}" title="Product Name">
                                            @if($row->options->has('img'))
                                            <img src="{{ Theme::publicImg($row->options->img) }}" width="85" height="125" alt="" />
                                            @endif
                                        </a>
                                    </td>
                                    <td class="product-name-td">
                                        <h2 class="product-name"><a href="{{ url('product/'.$row->id) }}" title="Product Name">{{ $row->name }}</a></h2>
                                    </td>
                                    <td>৳{{number_format($row->price)}}</td>
                                    <td>
                                        <div class="qty-holder">
                                            <input type="hidden" name="product_rowId[]" value="{{ $row->rowId }}" />
                                            <a href="#" class="qty-dec-btn" title="Dec">-</a>
                                            <input type="text" name="product_qty[]" id="product_qty" class="qty-input" value="{{ $row->qty }}">
                                            <a href="#" class="qty-inc-btn" title="Inc">+</a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-primary">৳{{ number_format($row->price*$row->qty) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="clearfix">
                                        <button class="btn btn-default hover-primary btn-continue">Continue Shopping</button>
                                        <button class="btn btn-default hover-primary btn-update">Update Shopping Cart</button>
                                        <button class="btn btn-default hover-primary btn-clear" id="empty_cart_button">Clear Shopping Cart</button>
                                    </td>
                                </tr> 
                            </tfoot>	
                        </table>
                        @else

                        <div class="text-center" style="height:100%;">
                            <h3>No product on your cart</h3>
                        </div>

                        @endif
                    </div>
                </div>
                <aside class="col-md-4 col-lg-3 sidebar shop-sidebar">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#panel-cart-discount">
                                        Discount Code
                                    </a>
                                </h4>
                            </div>
                            <div id="panel-cart-discount" class="accordion-body collapse">
                                <div class="panel-body">
                                    <p class="mb-sm">Enter your coupon code if you have one.</p>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-block" value="Apply Coupon">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" href="#panel-cart-ship">
                                        ESTIMATE SHIPPING AND TAX
                                    </a>
                                </h4>
                            </div>
                            <div id="panel-cart-ship" class="accordion-body collapse">
                                <div class="panel-body">
                                    <p class="mb-sm">Enter your destination to get a shipping estimate.</p>
                                    <form action="#">
                                        <div class="form-group">
                                            <label>Contry <span class="required">*</span></label>
                                            <select name="#" class="form-control">
                                                <option value="United States">United States</option>
                                                <option value="United Kingdon">United Kingdon</option>
                                                <option value="China">China</option>
                                                <option value="Russia">Russia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>State/Province</label>
                                            <select name="#" class="form-control">
                                                <option value="United States">Please select region, state</option>
                                                <option value="Alabama">Alabama</option>
                                                <option value="Alaska">Alaska</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-block" value="Get a Quote">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" href="#panel-cart-total">
                                        Cart Totals
                                    </a>
                                </h4>
                            </div>
                            <div id="panel-cart-total" class="accordion-body collapse in">
                                <div class="panel-body">
                                    <table class="totals-table">
                                        <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>৳{{ number_format(Cart::total()) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Grand Total</td>
                                                <td>৳{{ number_format(Cart::total()) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="totals-table-action">
                                        <a href="{{ url('checkout') }}" class="btn btn-primary btn-block">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            @if($featured_products->count())
            <div class="crosssell-products">
                <h2 class="h4"><strong>Based on your selection, you may be interested in the following items:</strong></h2>
                <div class="row">
                    @foreach($featured_products as $product)
                    <div class="col-sm-6 col-md-3">
                        <div class="product product-sm">
                            <figure class="product-image-area">
                                <a href="{{ url('product/'.$product->id) }}" title="Product Name" class="product-image">
                                    @if($product->media->isNotEmpty())
                                    @foreach($product->media->take(2) as $i=>$media)

                                    @if($i == 0)
                                    <img style="height: 130px;" src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{$product->name}}">
                                    @else
                                    <img style="height: 130px;" class="img-hided" src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{$product->name}}" class="product-hover-image">
                                    @endif

                                    @endforeach
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name"><a href="#" title="{{$product->name}}">{{$product->name}}</a></h2>

                                <div class="product-price-box">
                                    @if($product->discount)
                                    <span class="old-price">৳{{number_format($product->price)}}</span>
                                    @endif
                                    <span class="product-price">৳{{number_format($product->price - $product->discount)}}</span>
                                </div>

                                <div class="product-actions">
                                    <a href="#" class="addtocart feature-btn-cart" title="Add to Cart" fet_id="{{ $product->id }}" fet_token="{{ csrf_token() }}" fet_qty="1">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix visible-sm"></div>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>

@include('Theme::footer')

<script>
    $(document).ready(function () {
        $(".qty-dec-btn").on('click', function () {
            var oldVlaue = $(this).next().val();

            if (oldVlaue > 0) {
                $(this).next().val(--oldVlaue)
            }
            return false;
        });

        $(".qty-inc-btn").on('click', function () {
            var oldVlaue = $(this).prev().val();
            $(this).prev().val(++oldVlaue);
            if (+oldVlaue > 20) {
                alert("You can add Maximum 20 item");
                $(this).prev().val('20');
            }
            return false;
        });

        $('#empty_cart_button').on('click', function () {
            $.ajax({
                type: "GET",
                url: "/destroy-cart",
                success: function (res) {
                    location.reload();
                }
            });
        });

        $('.btn-continue').on('click', function () {
            window.location = '/';
            return false;
        });

        $('.product-delete a').on('click', function (e) {
            e.defaultPrevented;
            var token = '{{ csrf_token() }}',
                    rowId = $(this).data('rowid'),
                    parent = $(this).parents('tr');
            $.ajax({
                url: '/remove-cart-item',
                type: 'post',
                data: {_token: token, rowId: rowId},
                success: function (res) {
                    parent.remove();
                    location.reload();
                }
            });
            return false;
        });

        $('.btn-update').on('click', function (e) {
            e.defaultPrevented;
            var token = '{{ csrf_token() }}';

            var qty = $('input[name="product_qty[]"]').map(function () {
                return this.value;
            }).get();

            var rowId = $('input[name="product_rowId[]"]').map(function () {
                return this.value;
            }).get();

            $.ajax({
                url: '/update-cart-item',
                type: 'post',
                data: {_token: token, rowId: rowId, qty: qty},
                success: function (res) {
                    location.reload();
                }
            });

        });
    });
</script>
</body>
</html>
