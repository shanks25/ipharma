@include('Theme::header')


<div role="main" class="main">
    @include('Theme::ajax_search')
    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-sm-12">
                            <div class="form-content">
                                {{ csrf_field() }}
                                <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">Refill Request From Previous Order </h3>
                                <div class="clearfix"></div>
                                @if (count($errors) > 0)
                                <div style="background: #FBD8DB; padding: 20px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li style="color: #90111A; padding: 5px 0;">{{ $error }}<sup style="color: red">*</sup></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="font-weight-normal">Refill Order Id <span class="required">*</span></label>
                                    <input type="text" name="order_id" placeholder="Enter your refill order id" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-action clearfix">
                                <button id="submit" class="btn btn-primary btn-lg">REFILL</button>
                                <!--<input type="submit" class="btn btn-primary btn-lg" value="Enter">-->
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

</div>


@include('Theme::footer')

<script>
    $(document).ready(function () {
        $('button#submit').on('click', function () {
            var refillId = $('input[name=order_id]').val();
            var token = '{{ csrf_token() }}';
            var reloadLink = "{{URL::to('/')}}";
            $.ajax({
                type: "POST",
                url: "{{URL::to('ajax-refill-data')}}",
                data: {refillId: refillId, _token: token},
                success: function (res) {
                    $.each(res, function (index, item) {
                        var qty = item.qty;
                        var id = item.id;
                        var price = item.price;
                        var token = '{{ csrf_token() }}';
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
                                var i = 0;
                                var table = '<table class="table table-hover">';
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
                                    table += ('<td><img style="width: 30px;" src="' + imageUrl + '"></td>');
                                    if (originalPrice == value.price) {
                                        table += ('<td><span class="text-primary">' + value.name + '</span><br><strong style="font-size: 11px;">৳ ' + originalPrice + '</strong></td>');
                                    } else {
                                        table += ('<td><span class="text-primary">' + value.name + '</span><br><del style="font-size: 11px; margin-right: 5px;">৳ ' + originalPrice + '</del><strong style="font-size: 11px;">৳ ' + value.price + '</strong></td>');
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
                                        table += ('<td style="vertical-align: middle; padding: 8px 0;"><span class="text-danger">৳ ' + subTotal.toFixed(2) + '</span></td>');
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
                    });
                },
                error: function (jqXHR, exception) {
                    var firstError = jqXHR.responseJSON[Object.keys(jqXHR.responseJSON)[0]][0];
                    swal('Someting Worng!', firstError, 'error');
                }
            });
        });
    });
//    $(document).ajaxStop(function () {
//        var reloadLink = "{{URL::to('/')}}";
//        setTimeout(window.location.href = reloadLink, 15000);
//    });
</script>
</body>
</html>
