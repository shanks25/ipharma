<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Khaadi –  Official Website</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

        <link media="all" href="{{ Theme::asset('css/box-slider-1.1.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/bootstrap-1.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/local-5.7.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/productbook-1.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/bootstrap-responsive-0.2.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/responsive-3.1.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/settings-1.1.css') }}" type="text/css" rel="stylesheet"/>
        <link media="all" href="{{ Theme::asset('css/jquery.modal.min.css') }}" type="text/css" rel="stylesheet"/>

        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('js/jquery.fancybox-1.3.4.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/captions.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/jquery.modal.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/jquery.swinxyzoom.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/print.css') }}" media="print" />

        <link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/jquery-ui-1.10.4.custom.css') }}" media="print" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.5.5/sweetalert2.min.css">





            <script type="text/javascript" src="{{ Theme::asset('js/jquery/jquery.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/zoom/zoom.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/touch/touch.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/slideshow/jquery.slider.js') }}"></script>


            <script src="https://cdn.jsdelivr.net/sweetalert2/6.5.5/sweetalert2.min.js"></script>


            <script type="text/javascript" src="{{ Theme::asset('js/etheme/box-slider.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/jquery.nicescroll.min.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/touch/jquery.mousewheel.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/modernizr.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/jquery.emodal.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/misc.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/revslider/jquery.themepunch.plugins.min.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/revslider/jquery.themepunch.revolution.min.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/etheme/slideshow/efects.js') }}"></script> 
            <!--<script type="text/javascript" src="{{ Theme::asset('js/etheme/scripts-box-slider.js') }}"></script>-->
            <script type="text/javascript" src="{{ Theme::asset('js/popup/jquery.modal.min.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/jquery-ui-1.10.4.custom.min.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/jquery.fancybox-1.3.4.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/init.js') }}"></script>
            <script type="text/javascript" src="{{ Theme::asset('js/jquery.easing-1.3.pack.js') }}"></script>

            <script type="text/javascript" src="{{ Theme::asset('js/lightbox.min.js') }}"></script>

            <script type="text/javascript">
var onCart = false;
function ajaxRemove(url, lockTopcart) {

    if (typeof (lockTopcart) === "undefined")
        lockTopcart = false;
    params = "isAjax/1/";
    //url += "isAjax/1/";
    if (onCart)
        params += "oncart/1/";
    else
        params += "oncart/0/";
    url = url.replace("checkout/cart/delete", "e_ajax/index/ajaxdelete");

    if (/___SID=U/.test(url)) {
        url = url.split(/\?___SID/)[0] + params + "";
    } else
        url = url.trim() + params;

    topCart = jQuery('.top-cart');
    topCartOverlay = jQuery('#header-items .overlay');
    cartTable = jQuery('.cart');
    if (lockTopcart) {
        topCartOverlay.show();
        topCart.addClass('pending');
    }

    try {

        jQuery.ajax({
            url: url,
            dataType: 'json',
            success: function (data) {
                if (data.status == 'SUCCESS') {
                    topCart.replaceWith(data.topcart);
                    if (onCart) {
                        cartTable.replaceWith(data.cart);
                    }
                } else if (data.status == 'ERROR')
                    alert(data.message);
                else
                    alert('Error: invalid response');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("Error: unable to process the request")

            },
            complete: function () {
                if (lockTopcart) {
                    topCartOverlay.hide();
                    topCart.removeClass('pending');
                    jQuery(".cartContainer").trigger("mouseenter");
                }
            }
        })
    } catch (e) {

    }
}

function showAjaxProductOptions(id) {
    jQuery('#fancybox' + id).trigger('click');
}
function showAjaxProductquickview(id) {
    jQuery('#qvfancybox' + id).trigger('click');
}

function ajaxSuccessAdded(data, modal, productImg, titleForBox) {
    var msgHtml;

    if (data.status == 'SUCCESS') {
        setAjaxData(data);
        if (jQuery(this).width() > 767) {
            modal.eModal('endLoading');
            jQuery(".close-modal").trigger("click");
            jQuery(".cartContainer").trigger("mouseenter");
            jQuery("html, body").animate({scrollTop: 0}, 600);
        } else {
            modal.eModal('endLoading')
                    .eModal('setTitle', titleForBox)
                    .eModal('addImage', productImg)
                    .eModal('addText', 'was successfully added to your shopping cart.')
                    .eModal('addBtn', {
                        title: 'Continue shopping',
                        href: 'javascript:void(0);',
                        class: 'button small hidewindow',
                        hideOnClick: true
                    })
                    .eModal('addBtn', {
                        title: 'Checkout',
                        href: 'http://www.khaadionline.com/pk/checkout/cart/',
                        class: 'button small arrow-right'
                    });
        }
    } else {
        modal.eModal('endLoading')
                .eModal('addError', data.message)
                .eModal('addBtn', {
                    title: 'Continue shopping',
                    href: 'javascript:void(0);',
                    class: 'button small hidewindow',
                    hideOnClick: true
                });
    }
}
function ajaxSuccessAddedQv(data, modal, productImg, titleForBox) {
    var msgHtml;

    if (data.status == 'SUCCESS') {
        //setAjaxData(data);
        modal.eModal('endLoading');
        /*.eModal('setTitle',titleForBox)
         .eModal('addImage', productImg)
         .eModal('addText','was successfully added to your shopping cart.')
         .eModal('addBtn',{
         title: 'Continue shopping',
         href: 'javascript:void(0);',
         class: 'button small hidewindow',
         hideOnClick: true
         })
         .eModal('addBtn',{
         title: 'Checkout',
         href: 'http://www.khaadionline.com/pk/checkout/cart/',
         class: 'button small arrow-right'
         });*/
    } else {
        modal.eModal('endLoading')
                .eModal('addError', data.message)
                .eModal('addBtn', {
                    title: 'Continue shopping',
                    href: 'javascript:void(0);',
                    class: 'button small hidewindow',
                    hideOnClick: true
                });
    }
}

// from list.phtml

(function ($) {
    $(document).ready(function () {
        $('button.btn-cart').on('click', function (e) {
            e.preventDefault();

            var qty = $('input[name=qty]').val();
            var id = $('input[name=id]').val();
            var token = $('input[name=_token]').val();



            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {id: id, qty: qty, _token: token},
                success: function (res) {
                    swal(
                            'Added!',
                            'This product has added to your cart!',
                            'success'
                            );

                    $('span.cart-product-count').text(res);
                }
            });

        });
    });
})(jQuery);

//var modalWindow = jQuery('.btn-cart').eModal();
//function setLocationAjax(url, id) {
//    url += 'isAjax/1';
//    url = url.replace("checkout/cart", "e_ajax/index");
//    var productImg = jQuery('#productimgover' + id + ' img').attr('src');
//    var titleForBox = jQuery('#productname' + id).text();
//    modalWindow.eModal('showModal');
//    try {
//        jQuery.ajax({
//            url: url,
//            dataType: 'json',
//            error: function (data) {
//
//                modalWindow.eModal('endLoading')
//                        .eModal('addError', 'Error with ajax')
//                        .eModal('addBtn', {
//                            title: 'Continue shopping',
//                            href: 'javascript:void(0);',
//                            class: 'button small hidewindow',
//                            hideOnClick: true
//                        });
//            },
//            success: function (data, statusText, xhr) {
//                ajaxSuccessAdded(data, modalWindow, productImg, titleForBox);
//            }
//        });
//    } catch (e) {
//    }
//}


jQuery(function () {
    jQuery(".cartContainer").hover(function () {
        jQuery(".cartContainer .cart-popup").slideDown();
        setTimeout(function () {
            if (jQuery('.cartContainer:hover').length <= 0) {
                jQuery(".cartContainer .cart-popup").slideUp();
            }
        }, 2500);
    },
            function () {
                jQuery(".cartContainer .cart-popup").slideUp();
            });
});
            </script>
            <style type="text/css">
                .span7{
                    width: 510px;
                }
                @import url("public/theme/khaadi/css/large-responsive.css") (min-width: 2000px);
            </style>
    </head>
    <body class="page-empty  ajax-index-quickview catalog-product-view product-Salwar Kameez categorypath-unstitched-lawn-2017-vol-1-html category-lawn-2017-vol-1">
        <div>
            <noscript>
                <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-K5M5LG3" height="0" width="0"
                        style="display:none;visibility:hidden"></iframe>
            </noscript>
            <script>
                dataLayer = [{"customerLoggedIn": 0, "customerId": 0, "customerGroupId": "0", "customerGroupCode": "NOT LOGGED IN", "productId": "29625", "productName": "Salwar Kameez", "productSku": "F17203-Pink", "productPrice": "6500.0000", "categoryId": "223", "categoryName": "Lawn 2017 Vol 1", "pageType": "e_ajax\/index\/quickview"}];
                dataLayer.push({'ecommerce': {"actionField": {"list": "Lawn 2017 Vol 1"}, "detail": [{"name": "Salwar Kameez", "id": "29625", "price": "6500.0000", "brand": null, "category": "Lawn 2017 Vol 1"}]}});
                (function (w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                    var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer', 'GTM-K5M5LG3');
            </script>
            <script type="text/javascript">
                var optionsPrice = new Product.OptionsPrice([]);
            </script>
            <div class="ecom-quick-view product-view" style="margin-top: 10px;">
                <div class="product-essential">
                    <form action="#" method="post" id="product_addtocart_form">
                        <div class="no-display">
                            <input type="hidden" name="product" value="29625" />
                            <input type="hidden" name="related_product" id="related-products-field" value="" />
                        </div>
                        <div class="span7 product_img product-img-box">
                            <div class="zoom-container">
                                <div class="more-views">
                                    @if($product->media->isNotEmpty())
                                    @foreach($product->media->take(2) as $i=>$media)

                                    @if($i == 0)
                                    <div class="slide ">
                                        <a class="zoom-thumbnail"  href="{{ Theme::publicImg($media->src) }}" data-source-width="513" data-source-height="770" data-easyzoom-source="{{ Theme::publicImg($media->src) }}" title=""><img src="{{ Theme::publicImg($media->src) }}" width="117" height="177" alt="" /></a>
                                    </div>
                                    @else
                                    <div class="slide last">
                                        <a class="zoom-thumbnail"  href="{{ Theme::publicImg($media->src) }}" data-source-width="513" data-source-height="770" data-easyzoom-source="{{ Theme::publicImg($media->src) }}" title="back"><img src="{{ Theme::publicImg($media->src) }}" width="117" height="177" alt="back" /></a>
                                    </div>
                                    @endif

                                    @endforeach
                                    @endif
                                </div>

                                <div class="main-image">   
                                    <a id="zoom" class=" main-thumbnail" href="{{ Theme::publicImg($media->src) }}">
                                        <img class="zoom-image" src="{{ Theme::publicImg($media->src) }}" alt="Salwar Kameez" title="Salwar Kameez" />        </a> 
                                </div> 



                            </div>
                            <script type="text/javascript">



                                jQuery('a#zoom').swinxyzoom({mode: 'dock', size: '100%', dock: {position: 'right'}}); // dock window slippy lens
                                jQuery('.more-views .slide:first-child').addClass('active');
                                jQuery('.more-views a').click(function (e) {
                                    e.preventDefault();
                                    //sxy-zoom-container

                                    var $this = jQuery(this),
                                            largeImage = $this.attr('href');
                                    smallImage = $this.data('easyzoom-source');
                                    if (!$this.parent().hasClass('active')) {
                                        jQuery('a#zoom').swinxyzoom('load', smallImage, largeImage);
                                        jQuery('#zoom-lightbox').attr('href', largeImage);
                                        jQuery('.more-views .slide.active').removeClass('active');
                                        $this.parent().toggleClass('active');
                                    }
                                    srcWidth = $this.data('source-width');
                                    srcHeight = $this.data('source-height');
                                    // set up centering margins for wide images
                                    marginTop = (600 - srcHeight) / 2; // 600 is default height for image
                                    marginBottom = marginTop + 20; // 20 margin collapse from thumbnails carousel
                                    //jQuery('.sxy-zoom-container').width(srcWidth).height(srcHeight).css('marginTop', marginTop+'px').css('marginBottom', marginBottom+'px');
                                    // @TODO: handle responsive heights and widths
                                });

                            </script> 

                        </div>
                        <div class="span7 product-shop">
                            <div class="product-name">
                                <h1>{{ $product->name }}</h1>
                            </div>



                            <p class="availability in-stock">Availability: <span>In stock</span></p>



                            <div class="price-box">
                                @if($product->discount)
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">{{number_format($product->price)}} BDT </span> </p>
                                @endif
                                <p class="special-price"> <span class="price-label">Special Price:</span> <span class="price">{{number_format($product->price - (($product->price * $product->discount)/100))}} BDT </span> </p>
                            </div>




                            <div class="clear"></div>

                            @if($product->description != null)
                            <div class="short-description">
                                <div class="ecom-detail">
                                    <h4>Details:</h4>
                                    {!!html_entity_decode($product->description)!!}
                                </div>
                            </div>
                            @endif

                            <table class="table">
                                @foreach($attributes as $attribute)

                                <tr>
                                    <td> <strong>{{ $attribute->attribute->title }} </strong> </td>


                                    @if(in_array($attribute->attribute->type, ['Select', 'Multiselect']))
                                    <td> {{ $attribute->attributeValue->title or '' }} </td>
                                    @else
                                    <td> {{ $attribute->value or '' }} </td>
                                    @endif
                                </tr>

                                @endforeach
                            </table>

                            <div class="add-to-box">
                                <div class="add-to-cart">
                                    <div class="quanitybox">         
                                        <label for="qty">Qty:</label>
                                        <div class="quantity-buttons">
                                            <input type="button" class="quantity_box_button_down" onclick="qtyDown()" />         
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty" />
                                            <input type="button" class="quantity_box_button_up" onclick="qtyUp()" />
                                            {{ Form::hidden('id', $product->id) }}
                                            {{ Form::hidden('_token', csrf_token()) }}
                                        </div>
                                    </div>

                                    <button type="submit" title="Add to Bag" class="button btn-cart big active" ><span><span>Add to Bag</span></span></button>
                                </div>

                                <script type="text/javascript">

                                    var qty_el = document.getElementById('qty');

                                    var qty = qty_el.value;
                                    if (qty < 1) {
                                        jQuery('.quantity_box_button_down').css({
                                            'opacity': '0.2'
                                        });
                                    }
                                    function qtyDown() {
                                        var qty_el = document.getElementById('qty');
                                        var qty = qty_el.value;
                                        if (qty == 1) {
                                            jQuery('.quantity_box_button_down').css({
                                                'opacity': '0.2'
                                            });
                                        }
                                        if (!isNaN(qty) && qty > 0) {
                                            qty_el.value--;
                                        }
                                        return false;
                                    }

                                    function qtyUp() {
                                        var qty_el = document.getElementById('qty');
                                        var qty = qty_el.value;
                                        if (!isNaN(qty)) {
                                            qty_el.value++;
                                        }
                                        jQuery('.quantity_box_button_down').css({
                                            'opacity': '1'
                                        });
                                        return false;
                                    }

                                </script>                                        			                              
                            </div>



                        </div>
                        <div class="clearer"></div>
                    </form>
                    <script type="text/javascript">
                        //<![CDATA[
                        var modalWindow = jQuery('.add-to-cart button.button').eModal();

                        var productAddToCartForm = new VarienForm('product_addtocart_form');
                        var url = jQuery('#product_addtocart_form').attr('action');

                        url = url.replace("checkout/cart", "e_ajax/index");
                        var productImg = jQuery('.zoom-gallery .slide img').attr('src');
                        if (jQuery('.zoom-gallery .slide img').length > 0) {
                            var productImg = jQuery('.zoom-gallery .slide img').attr('src');
                        } else {
                            var productImg = jQuery('.main-image img').attr('src');
                        }

                        var titleForBox = jQuery('.product-name h1').text();
                        var data = {'isAjax': 1}

                        jQuery('#product_addtocart_form').ajaxForm({
                            url: url,
                            data: data,
                            dataType: 'json',
                            beforeSubmit: function () {
                                if (!productAddToCartForm.validator.validate()) {
                                    return false;
                                }
                                modalWindow.eModal('showModal');
                            },
                            error: function (data) {
                                modalWindow.eModal('endLoading')
                                        .eModal('addError', 'Error with ajax')
                                        .eModal('addBtn', {
                                            title: 'Continue shopping',
                                            href: 'javascript:void(0);',
                                            class: 'button small hidewindow',
                                            hideOnClick: true
                                        });
                            },
                            success: function (data, statusText, xhr) {
                                parent.setAjaxData(data, true);
                                ajaxSuccessAddedQv(data, modalWindow, productImg, titleForBox);
                            }
                        });
                        //]]>
                    </script>
                </div>
            </div>                    </div>
    </body>
</html>
