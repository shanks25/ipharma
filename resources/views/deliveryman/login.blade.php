<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>iPharma.com &#8211; Your Online Healthcare Solution</title>

<meta name="keywords" content="iPharma, Meidcine, Napa" />
<meta name="description" content="iPharma.com &#8211; - Your Online Healthcare Solution">
<meta name="author" content="{{ url('/') }}">

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

                                                        <div class="col-md-5 mega-banner-bg">
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



<div role="main" class="main">

    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <form role="form" method="POST" action="{{ route('pharmacylogin') }}">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    {{ csrf_field() }}
                                    <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">PHARMACY LOGIN</h3>
                                    <div class="clearfix"></div>
                                    @if (count($errors) > 0)
                                    <div style="background: #FBD8DB; padding: 20px">
                                        <p style="color: red; font-size: 14px; padding: 0">ERROR!!!</p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li style="color: #90111A; padding: 5px 0;">{{ $error }}<sup style="color: red">*</sup></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="font-weight-normal">Email <span class="required">*</span></label>
                                        <input type="email" name="email" placeholder="Type Your login email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-normal">Password <span class="required">*</span></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <p class="required">* Required Fields</p>
                                </div>

                                <div class="form-action clearfix">
                                    <a href="#" class="pull-left">Forgot Your Password?</a>

                                    <input type="submit" class="btn btn-primary btn-lg" value="Login">
                                </div>

                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

</div>

 

</body>
</html>
