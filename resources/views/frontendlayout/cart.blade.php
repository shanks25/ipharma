@section('head')
    
 

    <!-- Theme CSS -->
 
    <link rel="stylesheet" href="{{ Theme::asset('css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset('css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset('css/theme-shop.css') }}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/navigation.css') }}">

    <!-- Skin CSS -->
{{--     <link rel="stylesheet" href="{{ Theme::asset('css/skins/skin-shop-4.css') }}"> --}}

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/demos/demo-shop-4.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/custom.css') }}">

    <!-- Theme Sweet Alert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.5.5/sweetalert2.min.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 



    <!-- Head Libs -->
    <script src="{{ Theme::asset('css/vendor/modernizr/modernizr.min.js') }}"></script>

    <style>
    .fa{
        line-height: 30px;
    }
</style>
@endsection

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

    @section('footer')

<script src="{{ Theme::asset('css/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/isotope/jquery.isotope.min.js') }}"></script>
 
<script src="{{ Theme::asset('css/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/vide/vide.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ Theme::asset('js/theme.js') }}"></script>


<script src="{{ Theme::asset('css/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ Theme::asset('js/views/view.contact.js') }}"></script>

<script src="{{ Theme::asset('css/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/elevatezoom/jquery.elevatezoom.js') }}"></script>

<!-- Demo -->
<script src="{{ Theme::asset('js/demos/demo-shop-4.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ Theme::asset('js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ Theme::asset('js/theme.init.js') }}"></script>
<script src="{{ Theme::asset('js/jquery.star-rating-svg.js') }}"></script>
<!-- Full Slider Js -->
<link rel="stylesheet" href="{{ Theme::asset('css/jquery-ui.css') }}">
 

<script src="{{ Theme::asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<link rel="stylesheet" href="{{ Theme::asset('css/easy-autocomplete.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/easy-autocomplete.themes.min.css') }}">
<script type="text/javascript" src="{{ Theme::asset('social-share/jssocials.min.js') }}"></script>
{{-- in between some shit is not working --}}
<!-- Theme Sweet Alert Js -->
<script src="https://cdn.jsdelivr.net/sweetalert2/6.5.5/sweetalert2.min.js"></script>


<script>
$(document).ready(function () {

    $('.product-actions .btn-cart').on('click', function (e) {
        e.preventDefault();


        var checkLink = window.location;
        var conLink = "{{URL::to('/')}}";
        var qty = $('input[name=qty]').val();
        var id = $('input[name=id]').val();
        var price = $('input[name=price]').val();
        var token = $('input[name=_token]').val();
        var minQty = $('#minQty').val();
        if (minQty > qty) {
            alert('You must add minmum' + minQty + ' quntity!');
        } else {
            $.ajax({
                type: "POST",
                url: "{{URL::to('add-to-cart')}}",
                data: {id: id, qty: qty, price: price, _token: token},
                success: function (res) {
                    var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                    $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                    $('span.cart-count').text(res.count);
                    $('span.cart-amount-span').text('৳ ' + res.total);
                    $('input[name = cart-total]').val(res.total);
                    var i = 0;
                    var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                    // NOTE!  I changed 'object' to 'value' here
                    // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                    jQuery.each(res.content, function (key, value) {

                        var subTotal = value.qty * value.price;

                        var originalPrice = value.options.productPrice;

                        var originalPriceTotal = value.options.productPrice * value.qty;
                        // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                        table += ('<tr>');
                        var path = "{{ Theme::publicImg('') }}";
                        var imageUrl = path + "/" + value.options.img;
                        // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>'); commented by kunal
                        if (originalPrice == value.price) {
                            table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                        }else{
                            table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                        }
                        table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                        if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
                            table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                        } else {
                            table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                        }
                        table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                        table += ('</tr>');

                    });

                    table += '</table>';

                    $('.cart-table-wrap').html(table);
                    $(".cart-box").hide();
                    $(".cart-box-view").show();
                }
            });
        }
    });
    $('.product-actions .related-btn-cart').on('click', function (e) {
        e.preventDefault();

        var checkLink = window.location;
        var conLink = "{{URL::to('/')}}";
        var qty = $(this).attr('rel_qty');
        var id = $(this).attr('rel_id');
        var price = $(this).attr('price');
        var token = $(this).attr('rel_token');
        $.ajax({
            type: "POST",
            url: "{{URL::to('add-to-cart')}}",
            data: {id: id, qty: qty, price: price, _token: token},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                $('span.cart-count').text(res.count);
                $('span.cart-amount-span').text('৳ ' + res.total);
                $('input[name = cart-total]').val(res.total);
                var i = 0;
                var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                jQuery.each(res.content, function (key, value) {

                    var subTotal = value.qty * value.price;

                    var originalPrice = value.options.productPrice;

                    var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "{{ Theme::publicImg('') }}";
                    var imageUrl = path + "/" + value.options.img;
                    // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>'); commented by kunal
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                    if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
                        table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    } else {
                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    }
                    table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                    table += ('</tr>');

                });

                table += '</table>';

                $('.cart-table-wrap').html(table);
                $(".cart-box").hide();
                $(".cart-box-view").show();
            }
        });
        return false;

    });

    $('.product-actions .feature-btn-cart').on('click', function (e) {
        e.preventDefault();

        var checkLink = window.location;
        var conLink = "{{URL::to('/')}}";
        var qty = $(this).attr('fet_qty');
        var id = $(this).attr('fet_id');
        var price = $(this).attr('price');
        var token = $(this).attr('fet_token');
        $.ajax({
            type: "POST",
            url: "{{URL::to('add-to-cart')}}",
            data: {id: id, qty: qty, price: price, _token: token},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                $('span.cart-count').text(res.count);
                $('span.cart-amount-span').text('৳ ' + res.total);
                $('input[name = cart-total]').val(res.total);
                var i = 0;
                var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                jQuery.each(res.content, function (key, value) {

                    var subTotal = value.qty * value.price;

                    var originalPrice = value.options.productPrice;

                    var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "{{ Theme::publicImg('') }}";
                    var imageUrl = path + "/" + value.options.img;
                    // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>'); commented by kunal
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                    if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
                        table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    } else {
                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    }
                    table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                    table += ('</tr>');

                });

                table += '</table>';

                $('.cart-table-wrap').html(table);
                $(".cart-box").hide();
                $(".cart-box-view").show();
            }
        });
        return false;

    });

    $(".cart-box").click(function () {
        $(".cart-box").hide();
        $(".cart-box-view").show();
    });
    $(".cart-box-inner-view .cart-hide-btn").click(function () {
        $(".cart-box").show();
        $(".cart-box-view").hide();
    });

    $(".cart-table-wrap").on('click', '.qty-dec-btn', function (e) {
        e.defaultPrevented;
        var oldVlaue = $(this).next().val();

        if (oldVlaue > 0) {
            $(this).next().val(--oldVlaue);
//            $(".minimum-qty").show();
        }
        var token = '{{ csrf_token() }}';
        var qty = $(this).next().val();

        var rowId = $(this).attr('rowId');
        $.ajax({
            url: '/update-cart-item',
            type: 'post',
            data: {_token: token, rowId: rowId, qty: qty},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                $('span.cart-count').text(res.count);
                $('span.cart-amount-span').text('৳ ' + res.total);
                $('input[name = cart-total]').val(res.total);
                var i = 0;
                var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                jQuery.each(res.content, function (key, value) {

                    var subTotal = value.qty * value.price;
                    
                    var originalPrice = value.options.productPrice;
                    
                    var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "{{ Theme::publicImg('') }}";
                    var imageUrl = path + "/" + value.options.img;
                    // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');commented by kunal
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                    if(originalPriceTotal.toFixed(1) != subTotal.toFixed(1)){
                        table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ '+ subTotal.toFixed(1) +'</span></td>');
                    }else{
                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    }
                    table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                    table += ('</tr>');

                });

                table += '</table>';

                $('.cart-table-wrap').html(table);
                $(".cart-box").hide();
                $(".cart-box-view").show();
            }
        });
        return false;
    });

    $(".cart-table-wrap").on('click', '.qty-inc-btn', function (e) {
        e.defaultPrevented;
        var oldVlaue = $(this).prev().val();
        $(this).prev().val(++oldVlaue);
//        $(".minimum-qty").hide();

        var token = '{{ csrf_token() }}';
        var qty = $(this).prev().val();

        var rowId = $(this).attr('rowId');
        $.ajax({
            url: '/update-cart-item',
            type: 'post',
            data: {_token: token, rowId: rowId, qty: qty},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                $('span.cart-count').text(res.count);
                $('span.cart-amount-span').text('৳ ' + res.total);
                $('input[name = cart-total]').val(res.total);
                var i = 0;
                var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                jQuery.each(res.content, function (key, value) {

                    var subTotal = value.qty * value.price;
                    
                    var originalPrice = value.options.productPrice;
                    
                    var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "{{ Theme::publicImg('') }}";
                    var imageUrl = path + "/" + value.options.img;
                    // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');commented by kunal
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                    if(originalPriceTotal.toFixed(1) != subTotal.toFixed(1)){
                        table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ '+ subTotal.toFixed(1) +'</span></td>');
                    }else{
                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    }
                    table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                    table += ('</tr>');

                });

                table += '</table>';

                $('.cart-table-wrap').html(table);
                $(".cart-box").hide();
                $(".cart-box-view").show();
                var cart_total = $('input[name = cart-total]').val();
                if(cart_total >= 1){
                    $(".minimum-amount").hide();
                }
            }
        });
        return false;
    });
    $('#empty_cart_button').on('click', function () {
        $.ajax({
            type: "GET",
            url: "/destroy-cart",
            success: function (res) {
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + 0);
                $('span.cart-count').text(0);
                $('span.cart-amount-span').text('৳ ' + 0);
                $(".minimum-amount").hide();
                var path = "{{Theme::asset('img/empty_bag.png')}}";
                var html = '<img src="' + path + '">';
                html += '<span>Your shopping bag is empty. Start shopping now.</span>';

                $('.cart-table-wrap').html(html);
//                location.reload();
            }
        });
    });
    $('.cart-table-wrap').on('click', '.product-delete a', function (e) {
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
                if (res.count > 0) {
                    var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                    $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                    $('span.cart-count').text(res.count);
                    $('span.cart-amount-span').text('৳ ' + res.total);
                    $('input[name = cart-total]').val(res.total);
                    $(".cart-box").hide();
                    $(".cart-box-view").show();
                } else {
                    $('span.saved-amount').text('৳ 0');
                    $('span.cart-count').text(0);
                    $('span.cart-amount-span').text('৳ 0');
                    $(".minimum-amount").hide();
                    var path = "{{Theme::asset('img/empty_bag.png')}}";
                    var html = '<img src="' + path + '">';
                    html += '<span>Your shopping bag is empty. Start shopping now.</span>';

                    $('.cart-table-wrap').html(html);
                }
            }
        });
        return false;
    });

//    $('input[name=search-text]').on('input',function(e){
//        var categoryId = $('select[name=categoryId]').val();
//        alert(categoryId);
//    });

    
    
    $('#example-ajax-post').on('input', function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        var te = $('input#example-ajax-post');
        if(inputVal.length){
            te.addClass('loading');
            $.ajax({
                url: "{{ url('ajax-search') }}",
                dataType: "json",
                data: {
                    name: inputVal,
                    catId: $('#productCategory').val(),
                },
                success: function (data) {
                    te.removeClass('loading');
                    if(data != 1){
                        var result = '<table>';
                        $.each(data, function(k, v) {
                            result += ('</tr>');
                            var path = "{{ Theme::publicImg('') }}";
                            var imageUrl = path + "/" + v.img;
                            var qty = $(this).attr('fet_qty');
                            var id = $(this).attr('fet_id');
                            var price = $(this).attr('price');
                            var token = $(this).attr('fet_token');
                            var company = v.c_name ? 'Company - ' + v.c_name + ', ' : "";
                            var pack = v.p_name ? 'Pack Size - ' + v.p_name + ', ' : "";
                            var type = v.t_name ? 'Type - ' + v.t_name : "";
                            result += ('<td class="text-center"><img style="width: 40px; height: 40px;" src="' + imageUrl + '"></td>');
                            if(v.orgPrice == v.price){
                                result += ('<td class="show_name"><span style="color:green; font-size: 15px;" class="col" ids = "'+ v.id +'">'+v.name+'</span>&nbsp;&nbsp;&nbsp;৳'+ v.price +'<sub> (Per Unit)</sub><br><span class="gen_style">'+ company + pack + type +'</span></td>');
                            }else{
                                result += ('<td class="show_name"><span style="color:green; font-size: 15px;" class="col" ids = "'+ v.id +'">'+v.name+'</span>&nbsp;&nbsp;&nbsp;<del style="color:red; font-weight: normal;">৳ '+ v.orgPrice +'</del>&nbsp;&nbsp;&nbsp;৳ '+ v.price +'</b><sub> (Per Unit)</sub><br><span class="gen_style">'+ generic + pack + type +'</span></td>');
                            }
                            result += ('<td><button style="margin-right: 10px;" class="btn btn-success btn-xs pull-right search-btn-cart" fet_id="'+ v.id +'" fet_qty="'+ v.qty +'" price="'+ v.price +'" fet_token="{{ csrf_token() }}">Add to Bag</button></td>');
                            result += ('</tr>');
                        });
                        if(Object.keys(data).length > 5){
                            result += '<tr><td class="text-center"><a href="#" id="see_all">See All</a></td></tr>';
                        }
                        result += '</table>'
                        $('.result').html(result);
                    }else{
                        var result = '<p style="color:blue; line-height: 38px; font-size: 13px; padding:10px; margin: 0; border: 1px dotted #ccc;">Sorry No Result Found! <a href="{{ url("product-inquiry") }}"><button class="btn btn-info pull-right">Request Product</button></a></p>'
                        $('.result').html(result);
                    }
                    
//                    resultDropdown.html(result);
                }
            });
        }else{
            te.removeClass('loading');
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result table tr td.show_name", function(){
        var text = $(this).children('span.col').text();
        $(this).parents(".search").find('#example-ajax-post').val(text);
        $(this).parents(".search").find(".result").empty();
    });
    
    $('.result').on('click', '.search-btn-cart', function (e) {
        e.preventDefault();

        var checkLink = window.location;
        var conLink = "{{URL::to('/')}}";
        var qty = $(this).attr('fet_qty');
        var id = $(this).attr('fet_id');
        var price = $(this).attr('price');
        var token = $(this).attr('fet_token');
        $.ajax({
            type: "POST",
            url: "{{URL::to('add-to-cart')}}",
            data: {id: id, qty: qty, price: price, _token: token},
            success: function (res) {
                var savedAmount = res.originalTotal - res.total;
//                window.location.href = checkLink;
                $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
                $('span.cart-count').text(res.count);
                $('span.cart-amount-span').text('৳ ' + res.total);
                $('input[name = cart-total]').val(res.total);
                var i = 0;
                var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
                // NOTE!  I changed 'object' to 'value' here
                // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//                $.each(JSON.parse(res.content), function (key, value) {
                jQuery.each(res.content, function (key, value) {

                    var subTotal = value.qty * value.price;

                    var originalPrice = value.options.productPrice;

                    var originalPriceTotal = value.options.productPrice * value.qty;
                    // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
                    table += ('<tr>');
                    var path = "{{ Theme::publicImg('') }}";
                    var imageUrl = path + "/" + value.options.img;
                    // table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');commented by kunal
                    if (originalPrice == value.price) {
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                    }else{
                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
                    }
                    table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                    if(originalPriceTotal == subTotal){
//                        table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    else{
//                        table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                    }
                    if (originalPriceTotal.toFixed(1) != subTotal.toFixed(1)) {
                        table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    } else {
                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
                    }
                    table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
                    table += ('</tr>');

                });

                
                table += '</table>';

                $('.cart-table-wrap').html(table);
                $(".cart-box").hide();
                $(".cart-box-view").show();
            }
        });
        return false;
    });
    
    $('.result').on('click', 'table tr td.show_name', function (e) {
        var ids = $(this).children('span').attr('ids');
        var url = "{{ url('product') }}/"+ ids;
        e.preventDefault();
        window.open(url,"_self");
    });
    
    $('.result').on('click', '#see_all', function () {
        var search_text = $('#example-ajax-post').val();
        var url = "{{ url('products') }}?text="+search_text;
        window.open(url,"_self");
    });
    
    $(document).on('click', function (e) {
        if($(e.target).attr('id') != "search-results") {
            $(".search").find(".result").empty();
        }
    });

//    $("#example-ajax-post").autocomplete({
//        source: function (request, response) {
//            $.ajax({
//                url: "{{ url('ajax-search') }}",
//                dataType: "json",
//                data: {
//                    name: request.term,
//                    catId: $('#productCategory').val(),
//                },
//                success: function (data) {
//                    response($.map(data, function (results) {
//                        return {
////                            label: results.name + " - ৳" + results.price,
//                            label: results.name,
//                            proId: results.id,
//                            value: results.name,
//                            qty: results.qty,
//                            price: results.price,
//                            orgPrice: results.orgPrice,
//                            g_name: results.g_name,
//                            t_name: results.t_name,
//                            p_name: results.p_name,
//                            img: results.img,
//                        }
//                    }));
//                }
//            });
//        },
//        select: function (event, ui) {
//            var id = ui.item.proId;
//            var elem = $(event.toElement);
//            if (elem.hasClass('ac-item-a')) {
//                var url = "{{ url('product') }}/"+ id;
//                event.preventDefault();
//                window.open(url);
//            }else{
//                var id = ui.item.proId;
//                 var qty = ui.item.qty;
//                 var price = ui.item.price;
//                 var token = '{{ csrf_token() }}';
//                 $.ajax({
//                     url: "{{URL::to('add-to-cart')}}",
//                     dataType: "json",
//                     type: "POST",
//                     data: {
//                         id: id,
//                         qty: qty,
//                         price: price,
//                         _token: token
//                     },
//                     success: function (res) {
//                        var savedAmount = res.originalTotal - res.total;
//        //                window.location.href = checkLink;
//                        $('span.saved-amount').text('৳ ' + savedAmount.toFixed(1));
//                        $('span.cart-count').text(res.count);
//                        $('span.cart-amount-span').text('৳ ' + res.total);
//                        $('input[name = cart-total]').val(res.total);
//                        var i = 0;
//                        var table = '<table style="width: 100%; font-size: 11px;" class="cart-table">';
//                        // NOTE!  I changed 'object' to 'value' here
//                        // NOTE 2!  We added a JSON.parse on the 'data' variable to convert from JSON to JavaScript objects.
//        //                $.each(JSON.parse(res.content), function (key, value) {
//                        jQuery.each(res.content, function (key, value) {
//
//                            var subTotal = value.qty * value.price;
//
//                            var originalPrice = value.options.productPrice;
//
//                            var originalPriceTotal = value.options.productPrice * value.qty;
//                            // We need to access the value variable in this loop because 'data' is the original array that we were iterating!
//                            table += ('<tr>');
//                            var path = "{{ Theme::publicImg('') }}";
//                            var imageUrl = path + "/" + value.options.img;
//                            table += ('<td><img style="width: 30px; border: 1px solid skyblue; border-radius: 5px;" src="' + imageUrl + '"></td>');
//                            if (originalPrice == value.price) {
//                                table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
//                            }else{
//                                table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ '+ originalPrice +'</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
//                            }
//                            table += ('<td style="font-size: 13px; vertical-align: middle; padding: 8px 0;"><div class="qty-holder" style="width: 90px;"><a href="#" class="qty-dec-btn" rowId="' + value.rowId + '" title="Dec" style="width: 22px;">-</a><input style="width: 22px !important;" type="text" name="product_qty" id="product_qty" class="qty-input" value="' + value.qty + '"><a href="#" class="qty-inc-btn" rowId="' + value.rowId + '" title="Inc" style="width: 22px;">+</a></div></td>');
//                            if(originalPriceTotal == subTotal){
//                                table += ('<td><span><del>৳ '+ originalPriceTotal.toFixed(1) +'</del></span><br><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                            else{
//                                table += ('<td><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//        //                    }
//                            if(originalPriceTotal.toFixed(1) != subTotal.toFixed(1)){
//                                table += ('<td><span class="text-primary"><del>৳ ' + originalPriceTotal.toFixed(1) + '</del></span><br><span class="text-danger">৳ '+ subTotal.toFixed(1) +'</span></td>');
//                            }else{
//                                table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(1) + '</span></td>');
//                            }
//                            table += ('<td class="product-delete" style="padding: 15px 5px;"><a href="#" title="Remove product" data-rowId="' + value.rowId + '"><i class="fa fa-times text-danger"></i></a></td>');
//                            table += ('</tr>');
//
//                        });
//
//                        table += '</table>';
//
//                        $('.cart-table-wrap').html(table);
//                        $(".cart-box").hide();
//                        $(".cart-box-view").show();
//                    }
//                 }); 
//            }
//            
//        }
//    }).data("ui-autocomplete")._renderItem = function (ul, item) {
//        var path = "{{ Theme::publicImg('') }}";
//        var imageUrl = path + "/" + item.img;
//        if(item.orgPrice == item.price){
//            var html = "<img style='width: 50px;' src='"+ imageUrl +"'/>&nbsp;&nbsp;<b class='ac-item-a'>" + item.label + "&nbsp;&nbsp;&nbsp;৳ "+ item.price +"</b> <button class='btn btn-info pull-right search-btn-cart'>Add to cart</button><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='gen_style'>Pack Size - "+ item.p_name +" / Generic - "+ item.g_name +"</span>";
//        }else{
//            var html = "<img style='width: 50px;' src='"+ imageUrl +"'/>&nbsp;&nbsp;<b class='ac-item-a'>" + item.label + "&nbsp;&nbsp;&nbsp;<del style='color:#3d6983; font-weight: normal;'>৳ "+ item.orgPrice +"</del>&nbsp;&nbsp;&nbsp;৳ "+ item.price +"</b> <button class='btn btn-info pull-right search-btn-cart'>Add to cart</button><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='gen_style'>Pack Size - "+ item.p_name +" / Generic - "+ item.g_name +"</span>";
//        }
//        return $("<li></li>")
//                .data("item.autocomplete", item)
//                .append(html)
//                .appendTo(ul);
//    };
    
    $("#checkout-button").on('click', function(){
        var cart_total = $('input[name = cart-total]').val();
        if(cart_total < 1){
            $(".minimum-amount").show();
        }else{
            $(".minimum-amount").hide();
            window.location.replace("{{ url('checkout') }}");
        }
    });
    
    

//    var options = {
//
//    url: function(phrase) {
//      return "/ajax-search";
//    },
//
//    getValue: function(element) {
//      return element.name + '<button class="btn btn-success">Add to cart</button>';
//    },
//
//    ajaxSettings: {
//      dataType: "json",
//      method: "POST",
//      data: {
//        dataType: "json"
//      }
//    },
//
//    preparePostData: function(data) {
//      data.phrase = $("#example-ajax-post").val();
//      data._token = $("#example-ajax-token").val();
//      return data;
//    },
//
//    requestDelay: 400
//  };
//
//  $("#example-ajax-post").easyAutocomplete(options);
});

//$('.addtocart').on('click',function(){
//    var names = $(this).attr('names');
//    var price = $(this).attr('price');
//    var id = $(this).attr('id');
//
//    /* Adding data to local storage */
//
//    var items = [];
//
//    if(students.length < 0){
//        var array = { 'names': names, 'price':price,'id':id};
//        students.push(array);
//        localStorage.setItem("items", JSON.stringify(items));
//    }else{
//        var stored = JSON.parse(localStorage.getItem("items"));
//        var array = { 'names': names, 'price':price,'id':id};
//        stored.push(array);
//        localStorage.setItem("items", JSON.stringify(stored));
//        var result = JSON.parse(localStorage.getItem("items"));
//    }
//
//    console.log(result);
//
//});
</script>
    @endsection