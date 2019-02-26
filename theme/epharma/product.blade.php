

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Ipharma24 &#8211; Your Online Healthcare Solution</title>

<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="ePharma.com.bd &#8211; Your Online Healthcare Solution">
<meta name="author" content="{{ url('/') }}">

<meta property="og:title" content="{{ $product->name or '' }}" />
<?php
$bc = strip_tags($product->description);
?>
<meta property="og:description" content="{{ $product->short_description }}" />
<meta property="og:url" content="{{ url('product/'. $product->id) }}" />
<meta property="og:image" content="{{ (isset($product->media[0])) ? Theme::publicImg($product->media[0]->src) : '' }}" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{ Theme::asset('img/favicon-32x32-1.png') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="../img/apple-touch-icon.png">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/bootstrap/css/style.scss') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/magnific-popup/magnific-popup.min.css') }}">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/theme.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/theme-elements.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/theme-blog.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/theme-shop.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/star-rating-svg.css') }}">

<!-- Current Page CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/settings.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/layers.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('css/vendor/rs-plugin/css/navigation.css') }}">

<!-- Skin CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/skins/skin-shop-4.css') }}">

<!-- Demo CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/demos/demo-shop-4.css') }}">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ Theme::asset('css/custom.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('social-share/jssocials.css') }}">
<link rel="stylesheet" href="{{ Theme::asset('social-share/jssocials-theme-flat.css') }}">

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

</head>
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
                <img class="pull-right cart-hide-btn" style="margin-right: 10px; margin-top: 5px;" src="{{Theme::asset('img/x-button.png') }}"/>
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
                    $sum += $item->options->productPrice * $item->qty;
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

    <div class="body">
        <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 75, 'stickySetTop': '-75px', 'stickyChangeLogo': true}">
            <div class="header-body">
                <!--                <div class="header-top">
                                    <div class="container">
                                        <div class="dropdowns-container">
                                            <div class="header-dropdown cur-dropdown">
                                                <a href="#"><i class="fa fa-facebook" style="color: white; font-size: 14px;"></i></a>
                                            </div>

                                            <div class="header-dropdown lang-dropdown">
                                                <a href="#"><i class="fa fa-twitter" style="color: white; font-size: 14px;"></i></a>
                                            </div>

                                            <div class="compare-dropdown">
                                                <a href="#"><i class="fa fa-youtube" style="color: white; font-size: 14px;"></i></a>
                                            </div>
                                        </div>

                                        <div class="top-menu-area">
                                            <a href="#">Links <i class="fa fa-caret-down"></i></a>
                                            <ul class="top-menu">
                                                <li><a href="{{ url('how-to-order') }}">How To Order</a></li>
                                                <li><a href="{{ url('partners') }}">Partners</a></li>
                                                <li><a href="{{ url('policy') }}">Policy</a></li>
                                                <li><a href="{{ url('news') }}">News</a></li>
                                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                                <li><a href="{{ url('login') }}">My Account</a></li>
                                                <li class="menu-item">
                                                    <a href="{{ url('login') }}">
                                                        <i class="fa fa-user" style="margin-right: 5px;"></i>Login
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{ url('login') }}">
                                                        <i class="fa fa-user-plus" style="margin-right: 5px;"></i>Register
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>-->
                <div class="header-container container">
                    <div class="header-row">
                        <div class="col-sm-2" style="border-right: 1px solid #fff; padding-left: 0;">
                            <div class="header-logo">
                                <a href="{{ url('/') }}">
                                    <img alt="Epharma" src="{{ Theme::asset('img/n_logo1-1.gif') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="header-search hidden-sm hidden-xs">
                                    <p style="color: #fff; display: block; font-size: 18px; margin: 0; line-height: 50px; padding-left: 20px;">Your Online Healthcare Solution</p>
                                </div>

                                <a href="#" class="mmenu-toggle-btn" title="Toggle menu">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5 hidden-sm hidden-xs">
                            <div class="row">
                                <div class="cart-area">
                                    <div class="custom-block" style="line-height: 25px;">
                                        <div class="row">
                                            <i class="fa fa-phone" style="line-height: 25px;"></i>
                                            <span> 018 8 222 8 222</span>
                                            <span class="split"></span>
                                            <a class="pull-right" style="text-align: right; cursor: default; white-space: nowrap; text-decoration: none;">Order by 1pm Same day Delivery</a>
                                            <br>
                                            <i class="fa fa-phone" style="line-height: 25px;"></i>
                                            <span> 017 0 129 0 890</span>
                                            <span class="split"></span>
                                            <a class="pull-right" style="text-align: right; cursor: default; white-space: nowrap; text-decoration: none;">After 1pm Next Day Delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        </div>
                                        <!--                                        <div class="row">
                                                                                    <i class="fa fa-phone"></i>
                                                                                    <span> 019 3333 66 55</span>
                                                                                    <span class="split"></span>
                                                                                    <a class="pull-right" style="text-align: right; cursor: default; white-space: nowrap; text-decoration: none;">After 1pm Next Day Delivery</a>
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="header-container header-nav">
                    <div class="container">
                        <div class="header-nav-main">
                            <nav>
                                <ul class="nav nav-pills" id="mainNav">
                                    @if(option('menu'))
                                    @foreach(option('menu') as $menu)
                                    <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                        <a href="{{ $menu->customSelect }}" <?php echo (! empty( $menu->children )) ? 'class="dropdown-toggle"' : 'class="dcss"';  ?>>
                                            <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="{{ $menu->icon }}"></i>{{ $menu->title }}
                                        </a>
                                        @if(isset($menu->children))
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="dropdown-mega-content dropdown-mega-content-small">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="row">
                                                                @if(isset($menu->children))
                                                                <ul class="dropdown-mega-sub-nav">
                                                                    @foreach( $menu->children as $menu)
                                                                    <div class="col-md-6">
                                                                        <li><a href="{{ $menu->customSelect }}">{{$menu->title}}</a></li>
                                                                    </div>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5 mega -banner-bg">
                                                            <img src="{{ Theme::asset('img/menu-bg.png') }}" alt="Banner bg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endif
                                        <div class="clearfix"></div>
                                    </li>
                                    @endforeach
                                    @endif

                                    <li>
                                        <a href="{{ url('product-inquiry') }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                            Request Product
                                        </a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="pull-right ">
                                        <a href="{{ route('logout') }}" 
                                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><i class="fa fa-expand"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" 
                                              action="{{ route('logout') }}" 
                                              method="POST" 
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                    <li class="pull-right ">
                                        <a href="{{ url('customer/account/index') }}"><i class="fa fa-user-circle"></i> My Account </a>
                                    </li>

                                    @else
                                    <li class="pull-right ">
                                        <a href="{{ url('user-login') }}">
                                            <i class="fa fa-user-circle"></i>
                                            Login
                                        </a>
                                    </li>
                                    @endif
                                    <li class="pull-right ">
                                        <a href="{{ url('refill-request') }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                            Refill Request
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-nav">
            <div class="mobile-nav-wrapper">
                <ul class="mobile-side-menu">
                    @if(option('menu'))
                    @foreach(option('menu') as $menu)
                    <li>
                        @if(isset($menu->children))
                        <span class="mmenu-toggle"></span>
                        @endif
                        <a href="{{ $menu->customSelect }}"><i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="{{ $menu->icon }}"></i>{{ $menu->title }}</a>
                        @if(isset($menu->children))
                        <ul>
                            @foreach( $menu->children as $menu)
                            <li><a href="{{ $menu->customSelect }}">{{ $menu->title }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    @endif
                    <li>
                        <a href="{{ url('product-inquiry') }}">
                            Request Product
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('prescription-upload') }}">
                            Upload Prescription
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="mobile-menu-overlay"></div>

<!--<style>
    th{
        font-size: 12px;
        color: #FFF;
    } 
    td{
        font-size: 12px;
        color: #38393b;
    }
</style>-->
<div role="main" class="main">

    @include('Theme::ajax_search')

<!--    <section class="page-header mb-lg">

        <div class="container">
            <ul class="breadcrumb">
                <li> <a href="{{ URL::to('/') }}" title="Go to Home Page">Home</a></li>
                @if($product->categories()->count())
                <li class="category5"> <a href="{{ URL::to('category/'. $product->categories()->first()->id) }}" title="">{{$product->categories()->first()->name}}</a></li>
                @endif
                <li class="active"> <strong>{{ $product->name or '' }}</strong> </li>
            </ul>
        </div>
    </section>-->

    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-md-7">
                <div class="product-view">
                    <div class="product-essential">
                        <div class="row">
                            <div class="product-img-box col-sm-5">
                                <div class="product-img-box-wrapper">
                                    <div class="product-img-wrapper">
                                        @if(isset($product->media[0]))
                                        @foreach($product->media as $media)
                                        <img src="{{ Theme::publicImg($media->src) }}" data-zoom-image="{{ Theme::publicImg($media->src) }}" alt="Product main image">
                                        @endforeach
                                        @else
                                        <img src="{{ Theme::publicImg('1Go032fuC2QI3jbK6dmIpO73T4chZPHuSo1raIiv.jpeg') }}" data-zoom-image="{{ Theme::publicImg('1Go032fuC2QI3jbK6dmIpO73T4chZPHuSo1raIiv.jpeg') }}" alt="Product main image">
                                        @endif
                                    </div>
                                </div>

                                <!--                                <div class="owl-carousel manual" id="productGalleryThumbs">
                                                                    <div class="product-img-wrapper">
                                                                        <a href="#" data-image="{{ Theme::asset('img/products/single/product1.jpg') }}" data-zoom-image="{{ Theme::asset('img/products/single/product1.jpg') }}" class="product-gallery-item">
                                                                            <img src="{{ Theme::asset('img/products/single/thumbs/product1.jpg') }}" alt="product">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-img-wrapper">
                                                                        <a href="#" data-image="{{ Theme::asset('img/products/single/product2.jpg') }}" data-zoom-image="{{ Theme::asset('img/products/single/product2.jpg') }}" class="product-gallery-item">
                                                                            <img src="{{ Theme::asset('img/products/single/thumbs/product2.jpg') }}" alt="product">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-img-wrapper">
                                                                        <a href="#" data-image="{{ Theme::asset('img/products/single/product3.jpg') }}" data-zoom-image="{{ Theme::asset('img/products/single/product3.jpg') }}" class="product-gallery-item">
                                                                            <img src="{{ Theme::asset('img/products/single/thumbs/product3.jpg') }}" alt="product">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-img-wrapper">
                                                                        <a href="#" data-image="{{ Theme::asset('img/products/single/product4.jpg') }}" data-zoom-image="{{ Theme::asset('img/products/single/product4.jpg') }}" class="product-gallery-item">
                                                                            <img src="{{ Theme::asset('img/products/single/thumbs/product4.jpg') }}" alt="product">
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-img-wrapper">
                                                                        <a href="#" data-image="{{ Theme::asset('img/products/single/product5.jpg') }}" data-zoom-image="{{ Theme::asset('img/products/single/product5.jpg') }}" class="product-gallery-item">
                                                                            <img src="{{ Theme::asset('img/products/single/thumbs/product5.jpg') }}" alt="product">
                                                                        </a>
                                                                    </div>
                                                                </div>-->
                            </div>

                            <div class="product-details-box col-sm-7">
                                <h1 class="product-name" style="font-size: 22px; line-height: 25px;">

                                    {{ $product->name or '' }}
                                </h1>

                                <div class="product-rating-container">
                                    <div class="product-ratings">
                                        <div class="ratings-box">
                                            <div class="rating" style="width:{{ $ratingAvg }}%"></div>
                                        </div>
                                    </div>
                                    <div class="review-link">
                                        <a href="#" class="review-link-in" rel="nofollow"> <span class="count">{{ number_format($totalRating, 1) }} Out of 5</a> | 
                                        <a href="#" id="button_lastdiv" onclick="return false" class="review-link-in" rel="nofollow"> <span class="count">{{ $rating_count }}</span> customer review</a> | 
                                        <a href="#" id="button_lastdiv2" class="review-link-in" rel="nofollow">Add a review</a>
                                    </div>
                                </div>
                                <?php
                                if ($product->brandattrOptions != NULL) {
                                    $brandDiscountSingle = $product->brandattrOptions->attributeValue->discount_percentage;
                                } else {
                                    $brandDiscountSingle = 0;
                                }
                                ?>

                                <div class="product-detail-info">
                                    <div class="product-price-box">
                                        @if($product->discount_percentage != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($product->discount_amount != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($product->terms[0]->discount_percentage != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($brandDiscountSingle != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @endif
                                        <span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscountSingle); ?><b style="font-weight: normal; font-size: 12px; color: #777;">&nbsp;&nbsp;(Per Unit)</b></span>
                                    </div>
                                    <p class="availability">
                                        <!--<span class="font-weight-semibold">Qty / Box Details:</span>-->
                                        {!!html_entity_decode($product->short_description)!!}
                                    </p>
                                </div>

                                <div class="product-actions">
                                    <div class="product-detail-qty">
                                        <input type="hidden" id="minQty" value="{{ $product->min_quantity }}"/>
                                        <input type="text" name="qty" maxlength="12" value="{{ $product->min_quantity }}" class="vertical-spinner" id="product-vqty">
                                        {{ Form::hidden('id', $product->id) }}
                                        <input type="hidden" name="price" value="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscountSingle); ?>"/>
                                        {{ Form::hidden('_token', csrf_token()) }}
                                    </div>
                                    <a href="#" class="addtocart button btn-cart" title="Add to Bag">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add to Bag</span>
                                    </a>
                                </div>

                                <div class="product-detail-info">
                                    @if(isset($product->terms[0]))
                                    <p class="availability">
                                        <span class="font-weight-semibold">Categories:</span>
                                        <a href="{{ url('category/'. $product->terms[0]->id) }}">
                                            {{ $product->terms[0]->name }}
                                        </a>
                                    </p>
                                    @endif
                                    @if(isset($product->genericAttrOptions->attributeValue))
                                    <p class="availability">
                                        <span class="font-weight-semibold">Generic:</span>
                                        {{ $product->genericAttrOptions->attributeValue->title or ''}}
                                    </p>
                                    @endif
                                    @if(isset($product->brandattrOptions->attributeValue))
                                    <p class="availability">
                                        <span class="font-weight-semibold">Brand:</span>
                                        {{ $product->brandattrOptions->attributeValue->title or ''}}
                                    </p>
                                    @endif
                                    @if(isset($product->typeAttrOptions->attributeValue))
                                    <p class="availability">
                                        <span class="font-weight-semibold">Type:</span>
                                        {{ $product->typeAttrOptions->attributeValue->title or ''}}
                                    </p>
                                    @endif
                                    @if(isset($product->packAttrOptions->attributeValue))
                                    <p class="availability">
                                        <span class="font-weight-semibold">Pack Size:</span>
                                        {{ $product->packAttrOptions->attributeValue->title or '' }}
                                    </p>
                                    @endif
                                </div>



                                <div class="product-share-box">
                                    <div id="share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        if(!empty($product->description)){
                    ?>
                    <div class="tabs product-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#product-desc" data-toggle="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="product-desc" class="tab-pane active">
                                <div class="product-desc-area">
                                    {!!html_entity_decode($product->description)!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <h2 class="slider-title">
                    <span class="inline-title">Also Purchased</span>
                    <span class="line"></span>
                </h2>

                <div class="owl-carousel owl-theme" data-plugin-options="{'items':4, 'margin':20, 'nav':true, 'dots': false, 'loop': false}">
                    @forelse($related_product as $rel_product)
                    <?php
                    if ($rel_product->brandattrOptions != NULL) {
                        $brandDiscount = $rel_product->brandattrOptions->attributeValue->discount_percentage;
                    } else {
                        $brandDiscount = 0;
                    }
                    ?>
                    <div class="product">
                        <figure class="product-image-area">
                            <a href="{{ url('product/'.$rel_product->id) }}" title="{{ $rel_product->name or '' }}" class="product-image">
                                @if($rel_product->media->count())

                                @foreach($rel_product->media->nth(2) as $i=>$image)
                                @if($i == 0)
                                <img src="{{ Theme::publicImg('tb_' . $image->src) }}" alt="" /> 
                                @else
                                <img class="product-hover-image" src="{{ Theme::publicImg('tb_' . $image->src) }}" alt="" /> 
                                @endif
                                @endforeach

                                @endif
                            </a>
                        </figure>
                        <div class="product-details-area">
                            <h2 class="product-name"><a href="{{ url('product/'.$rel_product->id) }}" title="{{ $rel_product->name or '' }}">{{ $rel_product->name or '' }}</a></h2>
                            <div class="product-price-box">
                                @if($rel_product->discount_percentage != 0)
                                <span class="old-price">৳{{$rel_product->price}}</span>
                                @elseif($rel_product->discount_amount != 0)
                                <span class="old-price">৳{{$rel_product->price}}</span>
                                @elseif($rel_product->terms[0]->discount_percentage != 0)
                                <span class="old-price">৳{{$rel_product->price}}</span>
                                @elseif($brandDiscount != 0)
                                <span class="old-price">৳{{$rel_product->price}}</span>
                                @endif
                                <span class="product-price">৳<?php echo cat_product_price($rel_product->price, $rel_product->discount_percentage, $rel_product->discount_amount, $rel_product->terms[0]->discount_percentage, $brandDiscount); ?></span>
                            </div>
                            <div class="product-actions">
                                <!--                                <div class="product-detail-qty">
                                                                    <input type="hidden" name="rel_qty" value="1">
                                                                    {{ Form::hidden('rel_id', $rel_product->id) }}
                                                                    {{ Form::hidden('rel_token', csrf_token()) }}
                                                                </div>-->
                                <!--<a href="#" class="addtocart button related-btn-cart" title="Add to Bag">-->
                                <a href="#" class="addtocart related-btn-cart" title="Add to Bag" rel_id="{{ $rel_product->id }}" price="<?php echo cat_product_price($rel_product->price, $rel_product->discount_percentage, $rel_product->discount_amount, $rel_product->terms[0]->discount_percentage, $brandDiscount); ?>" rel_token="{{ csrf_token() }}" rel_qty="{{ $rel_product->min_quantity }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Add to Bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No Product</p>
                    @endforelse
                </div>
                <div id="lastdiv">
                    <div class="tabs product-tabs" style="padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
                        <div id="product-reviews" class="tab-pane">
                            <div class="add-product-review">
                                <h4 class="text-uppercase heading-text-color font-weight-semibold">REVIEW & RATTING</h4>
                                @if(Auth::check())
                                <form id="review" method="POST" action="{{ url('add-comment') }}">
                                    <div class="form-group mb-xlg">
                                        <label>Rate this product<span class="required">*</span></label>
                                        <div class="my-rating"></div>
                                    </div>
                                    <div class="form-group mb-xlg">
                                        <label>Review<span class="required">*</span></label>
                                        {{ Form::hidden('product_id', $product->id) }}
                                        {{ Form::hidden('_token', csrf_token()) }}
                                        <textarea name="review" cols="5" rows="2" class="form-control"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <input id="submit" type="submit" class="btn btn-primary" value="Submit Review">
                                    </div>
                                </form>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @if(isset($reviews))
                        @foreach($reviews as $review)
                        <div class="row">
                            <div class="col-xs-12">
                                <h5>{{ $review['name'] }}</h5>
                                <div class="product-ratings">
                                    <div class="ratings-box">
                                        <div class="rating" style="width:{{ $review['rating'] }}%"></div>
                                    </div>
                                </div>
                                <p>{{ $review['comment'] }}</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        @else
                        <div class="row">
                            <div class="col-xs-12">
                                <p class="text-danger">There is no review for this product!</p>
                            </div>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <aside class="col-md-5 sidebar product-sidebar">
                @if($generic_products->count() > 0)
                <h4>Alternative <span style="color: #98a4b1; font-size: 12px;">(Products with same composition / Generic)</span></h4>
                <style>
                    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
                        padding: 5px; 
                    }
                </style>
                <table class="table table-bordered table-condensed table-hover">
                    <thead style="background-color: #b4b4b4;">
                        <tr>
                            <th style="font-size: 12px;">Name</th>
                            <th style="font-size: 12px;">Form</th>
                            <th style="font-size: 12px;">MRP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($generic_products as $genProduct)
                        <?php
                        $brandName = isset($genProduct->brandattrOptions->attributeValue) ? $genProduct->brandattrOptions->attributeValue->title : $genProduct->typeAttrOptions->attributeValue->title;
                        $typeName = isset($genProduct->typeAttrOptions->attributeValue) ? $genProduct->typeAttrOptions->attributeValue->title : '';
                        ?>
                        @if($genProduct->id != $product->id)
                        <tr>
                            <td style="font-size: 12px;"><a href="{{ url('product/'.$genProduct->id) }}"><b>{{ $genProduct->name }}</b></a><br><span style="color: #959595;">{{ $brandName }}</span></td>
                            <td style="font-size: 12px;">{{ $typeName }}</td>
                            <td style="font-size: 12px;">৳{{ $genProduct->price }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                @endif
                <br>
                <div class="row text-center">
                    <img style="width: 50%; margin-bottom: 10px;" alt="Payments" src="{{ Theme::asset('img/we_accept.jpg') }}" class="footer-payment">
                </div>
                <hr>
                @if($featured_products->count())
                <h4>Featured</h4>
                    <div>
                        @foreach($featured_products as $product)
                        <?php
                        if ($product->brandattrOptions != NULL) {
                            $featbrandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
                        } else {
                            $featbrandDiscount = 0;
                        }
                        ?>
                        <div class="product product-sm" style="max-width: 350px;">
                            <figure class="product-image-area">
                                <a href="{{ url('product/'.$product->id) }}" title="Product Name" class="product-image">
                                    @if($product->media->isNotEmpty())
                                    @foreach($product->media->nth(2) as $i=>$media)

                                    @if($i == 0)
                                    <img src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{$product->name}}">
                                    @else
                                    <img class="img-hided" src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{$product->name}}" class="product-hover-image">
                                    @endif

                                    @endforeach
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details-area">
                                <h2 class="product-name" style="height: 30px; margin-top: 10px;"><a href="{{ url('product/'.$product->id) }}" title="Product Name">{{$product->name}}</a></h2>
                                <div class="product-price-box">
                                    @if($product->discount_percentage != 0)
                                    <span class="old-price">৳{{$product->price}}</span>
                                    @elseif($product->discount_amount != 0)
                                    <span class="old-price">৳{{$product->price}}</span>
                                    @elseif($product->terms[0]->discount_percentage != 0)
                                    <span class="old-price">৳{{$product->price}}</span>
                                    @elseif($featbrandDiscount != 0)
                                    <span class="old-price">৳{{$product->price}}</span>
                                    @endif
                                    <span class="product-price">৳<?php echo number_format(cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $featbrandDiscount), 2); ?></span>
                                </div>
                                <div class="product-actions">
                                    <a href="#" class="addtocart feature-btn-cart" title="Add to Bag" fet_id="{{ $product->id }}" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $featbrandDiscount); ?>" fet_token="{{ csrf_token() }}" fet_qty="{{ $product->min_quantity }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add to Bag</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                @endif
            </aside>
        </div>
    </div>

</div>
<style>
    .nextprev {
        background-color: green;
        border-color: rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        color: #fff;
        font-size: 15px;
        margin-right: 10px;
        padding: 6px 15px;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
    }
    .nextprev:hover {
        background-color: #4F87A2;
        border-color: rgba(0,0,0,0.5);
    }
    .nextprev2 {
        background-color: #00aeef;
        border-color: rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        color: #fff;
        font-size: 15px;
        margin-right: 10px;
        padding: 6px 15px;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
    }
    .nextprev2:hover {
        background-color: #216a94;
        border-color: rgba(0,0,0,0.5);
    }
</style>
@include('Theme::footer')


<script>
    $(document).ready(function () {
        $(".my-rating").starRating({
            starSize: 25,
            disableAfterRate: false,
            callback: function (currentRating, $el) {
                var prodId = $('input[name = product_id]').val();
                var token = '{{ csrf_token() }}';
                $.ajax({
                    type: "POST",
                    url: "{{URL::to('add-reviews')}}",
                    data: {rating: currentRating, p_id: prodId, _token: token},
                    success: function (res) {

                    }
                });
            }
        });
        
        $("#share").jsSocials({
            shares: ["facebook", "email", "twitter"]
        });
        
        $(".view-mode #list").click(function () {
            $("#grid-list-view .products-grid").hide();
            $("#grid-list-view .products-list").show();
        });
        
        $(".view-mode #grid").click(function () {
            $("#grid-list-view .products-grid").show();
            $("#grid-list-view .products-list").hide();
        });
        
        $("#button_lastdiv").click(function(){
            $('html, body').animate({
                 scrollTop: $("#lastdiv").offset().top
            }, 1000);               
        });
        
        $("#button_lastdiv2").click(function(){
            var AuthUser = "{{{ (Auth::user()) ? Auth::user() : 0 }}}";
            var checkLink = "{{URL::to('user-login')}}";
            if(AuthUser != 0){
               $('html, body').animate({
                 scrollTop: $("#lastdiv").offset().top
               }, 1000); 
            }else{
                swal({
                    title: 'Sorry!',
                    text: "For Ratings & Review you have to login first!",
                    type: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    confirmButtonClass: 'btn nextprev',
                    cancelButtonClass: 'btn nextprev2',
                    buttonsStyling: false
                }).then(function () {

                    window.location.href = checkLink;

                });
            }
            return false;
        });
    })
</script>

</body>
</html>
