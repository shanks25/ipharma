<style>
    .tagcloud ul{
        padding: 0;
        margin: 0;
    }
    .tagcloud ul li{
        list-style: none;
    }
    .tagcloud ul li a{
        text-decoration: none;
        font-size: 10pt;
        border: none;
    }
    .fa-meetup{
        color: #99ddff;
    }
    .gen_style{
        color: #333;
        font-size: 12px;
        line-height: 15px;
    }
    .ac-item-a{
        color: #3097D1;
    }
    .search-btn-cart{
        /*margin-top: 8px;*/
    }
</style>
 <footer>
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-7">
            <form id="newsletter-validate-detail" method="post" action="#">
              <h3 class="hidden-sm">Sign up for newsletter</h3>
              <div class="newsletter-inner">
                <input class="newsletter-email" name='Email' placeholder='Enter Your Email'/>
                <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
              </div>
            </form>
          </div>
          <div class="social col-md-4 col-sm-5">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network googleplus"><a title="Connect us on Google+" target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="social-network linkedin"><a title="Connect us on Linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li class="social-network rss"><a title="Connect us on Instagram" target="_blank" href="#"><i class="fa fa-rss"></i></a></li>
              <li class="social-network instagram"><a title="Connect us on Instagram" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4">
          <h3 class="links-title">Contact Information
        <a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
          <div class="footer-content">
            <div class="email"> <i class="fa fa-envelope"></i>
              <p>info@Ipharma24.com</p>
            </div>
            <div class="phone"> <i class="fa fa-phone"></i>
              <p>880 9617111555</p>
            </div>
            <div class="address"> <i class="fa fa-map-marker"></i>
              <p>Everyday / 09:00 AM - 09:00 PM</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Footer Menu<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
            <div class="tabBlock" id="TabBlock-1">
              <ul class="list-links list-unstyled">
                <li><a href="{{ url('how-to-order') }}">How To Order</a></li>
                <li><a href="{{ url('partners') }}">Partners</a></li>
                <li><a href="{{ url('policy') }}"> Policy</a></li>
                <li><a href="{{ url('news') }}"> News</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Mobile App<a class="expander visible-xs" href="#TabBlock-3">+</a></h3>
            <div class="tabBlock" id="TabBlock-3">
              <ul class="list-links list-unstyled">
                <li> <a href="#"> <img src="{{ asset('newdesign/images/google_play1.png') }}"> </a> </li>
               
              </ul>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2019 <a href="#"> Ipharama </a>. All Rights Reserved. </div>
          <div class="col-sm-6 col-xs-12">
            <div class="payment">
              <ul>
                <li><a href="#"><img title="Visa" alt="Visa" src="{{ asset('newdesign/images/visa.png') }}"></a></li>
                <li><a href="#"><img title="Paypal" alt="Paypal" src="{{ asset('newdesign/images/paypal.png') }}"></a></li>
                <li><a href="#"><img title="Discover" alt="Discover" src="{{ asset('newdesign/images/discover.png') }}"></a></li>
                <li><a href="#"><img title="Master Card" alt="Master Card" src="{{ asset('newdesign/images/master-card.png') }}"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- Vendor -->
<script src="{{ Theme::asset('css/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/common/common.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ Theme::asset('css/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
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
<script src="{{ Theme::asset('js/jquery-ui.js') }}"></script>

<script src="{{ Theme::asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<link rel="stylesheet" href="{{ Theme::asset('css/easy-autocomplete.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/easy-autocomplete.themes.min.css') }}">
<script type="text/javascript" src="{{ Theme::asset('social-share/jssocials.min.js') }}"></script>

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



<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-12345678-1', 'auto');
ga('send', 'pageview');
</script>
-->
