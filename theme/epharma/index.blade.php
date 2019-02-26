<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>iPharma.com &#8211; Your Online Healthcare Solution</title>

    <meta name="keywords" content="ipharma" />
    <meta name="description" content="Your Online Healthcare Solution">
    <meta name="author" content="themessengerbd.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Theme::asset('img/favicon.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/bootstrap/css/style.scss') }}">
    <!-- Full Slider CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/full-slider.css') }}">
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
                                                    <img alt="ipharma" src="{{ Theme::asset('img/n_logo1-1.gif') }}">
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
                                                <div class="cart-area" style="margin-top: 0;">
                                                    <div class="custom-block" style="line-height: 25px;">
                                                        <div class="row">
                                                            <i class="fa fa-phone" style="line-height: 25px;"></i>
                                                            <span> +880 1817-2990742</span>
                                                            <span class="split"></span>
                                                            <a class="pull-right" style="text-align: right; cursor: default; white-space: nowrap; text-decoration: none;">Order by 1pm Same day Delivery</a>
                                                            <br>
                                                            <i class="fa fa-phone" style="line-height: 25px;"></i>
                                                            <span> +880 1817-2990742</span>
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
<!--                                    <li class="active">
                                        <a href="{{ url('/') }}">
                                            <i class="fa fa-home"></i>
                                            Home
                                        </a>
                                    </li>-->
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
                                                            <img style="width: 100%; height: 150px;"  src="{{ Theme::asset('img/menu-bg.png') }}" alt="Banner bg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <div class="clearfix"></div>
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
                                    <a href="{{ url('registration') }}">
                                        <i class="fa fa-user-circle"></i>
                                        Register
                                    </a>
                                </li>
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
                <!--<li><a href="{{ url('/') }}">Home</a></li>-->
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
                        <i style="line-height: 0; margin-right: 3px; margin-top: -1px;" class="fa fa-clipboard-list"></i>
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
    @inject('option', 'Epharma\Model\Option')
    @inject('media', 'Epharma\Model\Media')
    <style>
    .search-box{
        width: 100%;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .result {
        position: absolute;
        z-index: 999;
        top: 75%;
        left: 35px;
        background: #FFF;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    .result{
        width: 69%;
        box-sizing: border-box;
    }
    .result table {
        width: 100%;
    }
    /* Formatting result items */
    .result table tr{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result table tr td:first-child{
        width: 10%;
        padding: 10px 0;
    }
    .result table tr td:nth-child(2){
        width: 75%;
    }
    .result table tr td:nth-child(2):hover{
        background: #f2f2f2;
    }
</style>
<div role="main" class="main">

    <header id="myCarousel" class="carousel slide">
        <!-- Wrapper for Slides -->
        <div class="carousel-buttons">
            <div class="search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group search-box">
                                            <div class="serchtile"></div>
                                            <input type="text" autocomplete="off" id="example-ajax-post" placeholder="Search here..." class="form-control"/>
                                            <input type="hidden" id="example-ajax-token" value="{{csrf_token()}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="serchtile"></div>
                                            <select id="productCategory" name="categoryId" class="form-control">
                                                <option value="1">Brand Name</option>
                                                <option value="2">Generic Name</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ url('prescription-upload') }}">
                                            <button class="btn pull-right" style="background-color: #00334d; color: #FFF; width: 100%; margin-top: 17px; line-height: 23px;">Upload Prescription</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="search-results" class="result"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="carousel-inner">
            <?php
            $active='';
            ?>
            @if($sliderImageIds = option('slider-images'))
            @foreach($media->findMany($sliderImageIds) as $k => $sliderImage)
            @php
            $active = ($k == 0) ? "active" : "";
            @endphp
            <div class="item {{$active}}">
                <div class="fill" style="background-image: url('{{ Theme::publicImg($sliderImage->src) }}'); background-size: 100% 100%;"></div>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>

    </header>



    <div class="banners-wrapper">
        <div class="banners-container">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3 col-xs-12">
                        <a href="#" class="banner">
                            <img src="{{ Theme::asset('img/banners/shop4/banner1.jpg') }}" alt="Banner">
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-12 col-sm-push-6">
                        <a href="#" class="banner">
                            <img src="{{ Theme::asset('img/banners/shop4/banner7.jpg') }}" alt="Banner">
                        </a>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-sm-6 col-sm-pull-3">
                        <a href="#" class="banner">
                            <img src="{{ Theme::asset('img/banners/shop4/banner4.jpg') }}" alt="Banner">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    @if($featured_products->count())
    <div class="container mb-lg">
        <h2 class="slider-title">
            <span class="inline-title">Feature Product</span>
            <span class="line"></span>
        </h2>

        <div class="owl-carousel owl-theme manual new-products-carousel">
            @foreach($featured_products as $product)
            <?php
            if ($product->brandattrOptions != NULL) {
                $brandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
            } else {
                $brandDiscount = 0;
            }
            ?>
            <div class="product">
                <figure class="product-image-area">
                    <a href="{{ url('product/'.$product->id) }}" title="Product Name" class="product-image">
                        @if($product->media->isNotEmpty())
                        @foreach($product->media->take(2) as $i=>$media)

                        @if($i == 0)
                        <img src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="Product Name">
                        @else
                        <img class="img-hided" src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="" width="200" height="200">
                        @endif

                        @endforeach
                        @endif
                    </a>
                    @if($product->discount_percentage || $product->discount_amount || $product->terms[0]->discount_percentage || $brandDiscount)
                    <div class="product-label">
                        <span class="new"><?php echo disPercentage($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?>%</span>
                    </div>
                    @endif
                </figure>
                <div class="product-details-area">
                    <h2 class="product-name">
                        <a href="{{ url('product/'.$product->id) }}" title="Product Name" class="name-item">{{$product->name}}</a>
                    </h2>
                            <!--                                <div class="product-ratings">
                                                                <div class="ratings-box">
                                                                    <div class="rating" style="width:0%"></div>
                                                                </div>
                                                            </div>-->
                                                            <div class="product-price-box">
                                                                @if($product->discount_percentage != 0)
                                                                <span class="old-price">৳{{$product->price}}</span>
                                                                @elseif($product->discount_amount != 0)
                                                                <span class="old-price">৳{{$product->price}}</span>
                                                                @elseif($product->terms[0]->discount_percentage != 0)
                                                                <span class="old-price">৳{{$product->price}}</span>
                                                                @elseif($brandDiscount != 0)
                                                                <span class="old-price">৳{{$product->price}}</span>
                                                                @endif
                                                                <span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?></span>
                                                            </div>

                                                            <div class="product-actions">
                                <!--                                    <a href="#" class="addtowishlist" title="Add to Wishlist">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>-->
                                                                    <a href="#" class="addtocart feature-btn-cart" title="Add to Bag" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?>" fet_id="{{ $product->id }}" fet_token="{{ csrf_token() }}" fet_qty="{{ $product->min_quantity }}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                        <span>Add to Bag</span>
                                                                    </a>
                                <!--                                    <a href="#" class="comparelink" title="Add to Compare">
                                                                        <i class="glyphicon glyphicon-signal"></i>
                                                                    </a>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                @endif

                                                @each('Theme::index-collections', $collections, 'collection')
                                            </div>

                                            @include('Theme::footer')
                                            <script>
                                                $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5bea7e0d70ff5a5a3a71e792/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

    </body>
    </html>
