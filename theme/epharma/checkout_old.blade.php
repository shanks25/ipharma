<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IPharma24.com &#8211; Your Online Healthcare Solution</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Theme::asset('img/favicon-32x32-1.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ Theme::asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">
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
    </style>

</head>
<body class="cart-box-body">
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
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="header-search">
                                    <p style="color: #fff; display: block; font-size: 18px; margin: 0; line-height: 50px; padding-left: 20px;">Your Online Healthcare Solution</p>
                                </div>

                                <a href="#" class="mmenu-toggle-btn" title="Toggle menu">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="cart-area">
                                    <div class="custom-block">
                                        <div class="row">
                                            <i class="fa fa-phone"></i>
                                            <span> 019 3333 66 55</span>
                                            <span class="split"></span>
                                            <a class="pull-right" style="text-align: right; cursor: default; white-space: nowrap; text-decoration: none;">Order by 1pm Same day Delivery</a>
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
                                    <li class="active">
                                        <a href="{{ url('/') }}">
                                            <i class="fa fa-home"></i>
                                            Home
                                        </a>
                                    </li>
                                    @if(option('menu'))
                                    @foreach(option('menu') as $menu)
                                    <li style="margin-top: 2px;" class="dropdown dropdown-mega-small">
                                        <a href="{{ $menu->customSelect }}" <?php echo (! empty( $menu->children )) ? 'class="dropdown-toggle"' : 'class="dcss"';  ?>>
                                            {{ $menu->title }}
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
                                        <a href="#">
                                            <i class="fa fa-pencil-square-o"></i>
                                            Refill Request
                                        </a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#">
                                            <i class="fa fa-paperclip"></i>
                                            Quick Order
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
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @if(option('menu'))
                    @foreach(option('menu') as $menu)
                    <li>
                        @if(isset($menu->children))
                        <span class="mmenu-toggle"></span>
                        @endif
                        <a href="{{ $menu->customSelect }}">{{ $menu->title }}</a>
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
                        <a href="#">
                            Quick Order
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

        <div role="main" class="main" style="padding-top: 30px;">
<!--            <section class="page-header mb-lg">

                <div class="container">
                    <ul class="breadcrumb">
                        <li> <a href="{{ URL::to('/') }}" title="Go to Home Page">Home</a></li>
                        <li class="active"> <strong>Checkout</strong> </li>
                    </ul>
                </div>
            </section>-->
            <div class="checkout">
                {{ Form::open(['url' => 'checkout', 'method' => 'POST', 'id' => 'onepagecheckout_orderform', 'autocomplete' => 'off']) }}
                <div class="container">
                    <h1 class="h2 heading-primary mt-lg mb-md clearfix">
                        Checkout
                    </h1>

                    <div class="checkout-menu clearfix">
                        <span style="font-size: 14px;">Returning Customer? <a style="font-weight: bold" href="{{ url('user-login') }}">Click here to login</a></span>

                        <div class="dropdown pull-right checkout-review-dropdown">
                            <button class="btn btn-primary mb-sm" id="reviewTable" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-cart"></i>
                                ৳{{ number_format(Cart::total(), 2) }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="reviewTable">
                                <h3>Review Your Order</h3>
                                @if(Cart::content()->count())
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::content() as $row)
                                        <tr>
                                            <td>
                                                <a href="{{ url('product/'.$row->id) }}" title="Product Name">
                                                    @if($row->options->has('img'))
                                                    <img src="{{ Theme::publicImg($row->options->img) }}" width="30" height="50" alt="" />
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                {{ $row->name }}<br>
                                                @if($row->options->productPrice == $row->price)
                                                <strong>৳ {{ number_format($row->options->productPrice, 2) }}</strong>
                                                @else
                                                <del style="color: #555">৳ {{ number_format($row->options->productPrice, 2) }}</del> &nbsp;&nbsp;<strong>৳ {{ number_format($row->price, 2) }}</strong>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $row->qty }}</td>
                                            <td class="text-right">৳{{ number_format(($row->price*$row->qty), 2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            @php
                                            $sum = 0;
                                            foreach (Cart::content() as $item) {
                                                $sum += $item->options->productPrice * $item->qty;
                                            }
                                            @endphp
                                            <td class="text-left">Saved Amount</td>
                                            <td class="text-left">৳{{ number_format(($sum - Cart::total()), 2) }}</td>
                                            <td class="text-right">Subtotal</td>
                                            <td class="text-right">৳{{ number_format(Cart::total(), 2) }}</td>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                                <div class="box-content">
                                    <div class="form-col">
                                        <h3><a>DELIVERY DETAILS</a></h3>

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

                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Name<span class="required">*</span></label>
                                                    <input type="text" name="billing[firstname]" value="{{ isset($user_info->address[0]) ? $user_info->address[0]->name : '' }}" title="User Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile<span class="required">*</span></label>
                                                    <input type="text" name="billing[mobile]" value="{{ isset($user_info->address[0]) ? $user_info->address[0]->mobile : '' }}" title="Mobile" class="form-control" placeholder="880">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group wide">
                                                    <label>Address<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="billing[address]" value="{{ isset($user_info->address[0]) ? $user_info->address[0]->address : '' }}" placeholder="Apartment, house, road, area etc.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group wide">
                                                    <label>Email Address</label>
                                                    <input type="text" name="billing[email]" value="{{ isset($user_info->address[0]) ? $user_info->address[0]->email : '' }}" title="Email Address" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>District<span class="required">*</span></label>
                                                    {{ Form::select('billing[district]', $district, isset($user_info->address[0]) ? $user_info->address[0]->district : null, ['id'=>'billing_region_id', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="area-div">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Area<span class="required">*</span></label>
                                                    {{ Form::select('billing[area]', $areas, isset($user_info->address[0]) ? $user_info->address[0]->area : null, ['id'=>'billing_area_id', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="dalivery-time">
                                            @php
                                            $days = new DatePeriod(new DateTime, new DateInterval('P1D'), 7, DatePeriod::EXCLUDE_START_DATE);
                                            @endphp
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Pickup Date</label>
                                                    <select name="billing[pickup_date]" class="form-control" id="pickup_date">
                                                        <option value="{{ date('Y-n-j') }}" id="hide-option">Today, {{ date('M d, Y') }}</option>
                                                        @foreach($days as $d)
                                                        <option value="{{ trim(strtoupper($d->format('Y-n-j')).PHP_EOL)}}">{{ strtoupper($d->format('D, M d, Y')) . PHP_EOL }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Pickup Time</label>
                                                    <?php
                                                    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                                    $current_hour = $dt->format('H');
                                                    $currentDate = 'Today' . ', ' . date('M d, Y');
                                                    ?>
                                                    <select class="form-control today" name="billing[pickup_time]" id="pickup_time">
                                                        <option value="">Select Delivery Time</option>
                                                        @if($current_hour >= 10 && $current_hour < 12)
                                                        <option value="{{$delivery_time[1]->delivery_time}}">{{$delivery_time[1]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[2]->delivery_time}}">{{$delivery_time[2]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[3]->delivery_time}}">{{$delivery_time[3]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[4]->delivery_time}}">{{$delivery_time[4]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @elseif($current_hour >= 12 && $current_hour < 14)
                                                        <option value="{{$delivery_time[2]->delivery_time}}">{{$delivery_time[2]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[3]->delivery_time}}">{{$delivery_time[3]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[4]->delivery_time}}">{{$delivery_time[4]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @elseif($current_hour >= 14 && $current_hour < 16)
                                                        <option value="{{$delivery_time[3]->delivery_time}}">{{$delivery_time[3]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[4]->delivery_time}}">{{$delivery_time[4]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @elseif($current_hour >= 16 && $current_hour < 18)
                                                        <option value="{{$delivery_time[4]->delivery_time}}">{{$delivery_time[4]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @elseif($current_hour >= 18 && $current_hour < 20)
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @else
                                                        <option value="{{$delivery_time[0]->delivery_time}}">{{$delivery_time[0]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[1]->delivery_time}}">{{$delivery_time[1]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[2]->delivery_time}}">{{$delivery_time[2]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[3]->delivery_time}}">{{$delivery_time[3]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[4]->delivery_time}}">{{$delivery_time[4]->delivery_time}}</option>
                                                        <option value="{{$delivery_time[5]->delivery_time}}">{{$delivery_time[5]->delivery_time}}</option>
                                                        @endif
                                                    </select>
                                                    <!--<input type="text" name="asda" value="<?php // echo $currentDate; ?>"/>-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="checkbox mb-sm">
                                            <label>
                                                <input type="checkbox" name="billing[register_account]" value="1" title="Create an account for later use" id="billing_register_account" class="checkbox" />
                                                Create an account for later use
                                            </label>
                                        </div>

                                        <div class="row" id="register-customer-password" style="display: none;">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="billing:customer_password" class="required"> Password<span class="required">*</span> </label>
                                                    <div class="data_area">
                                                        <input type="password" name="billing[customer_password]" id="billing:customer_password" title="Password" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="billing:confirm_password" class="required"> Confirm Password<span class="required">*</span> </label>
                                                    <div class="data_area">
                                                        <input type="password" name="billing[confirm_password]" title="Confirm Password" id="billing:confirm_password" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='clr'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                                <div class="box-content">
                                    <div class="checkbox mb-sm">
                                        <label style="padding-left: 0;">
                                            <a style="font-size: 18px; font-weight: bold">DELIVERY TO DIFFERENT ADDRESS</a>
                                            <input name="shipping[same_as_billing]" style="margin-top: 9px; margin-left: 15px;" type="checkbox" value="1" id="shipping_same_as_billing">
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <textarea name="order_comment" class="form-control" rows="3"></textarea>
                                    </div>
                                    <hr>
                                    <div class="form-col" id="ship_address_block" style="display: none">
                                        <h3>New Shipping Address</h3>

                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Name<span class="required">*</span></label>
                                                    <input type="text" name="shipping[firstname]" value="{{ isset($user_info->address[1]) ? $user_info->address[1]->name : '' }}" title="User Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" name="shipping[mobile]" value="{{ isset($user_info->address[1]) ? $user_info->address[1]->mobile : '' }}" title="Mobile" class="form-control" placeholder="880">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group wide">
                                                    <label>Address<span class="required">*</span></label>
                                                    <input type="text" class="form-control" name="shipping[address]" value="{{ isset($user_info->address[1]) ? $user_info->address[1]->address : '' }}" placeholder="Apartment, house, road, area etc.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group wide">
                                                    <label>Email Address<span class="required">*</span></label>
                                                    <input type="text" name="shipping[email]" value="{{ isset($user_info->address[1]) ? $user_info->address[1]->email : '' }}" title="Email Address" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>District<span class="required">*</span></label>
                                                    {{ Form::select('shipping[district]', $district, isset($user_info->address[1]) ? $user_info->address[1]->district : null, ['id'=>'billing:region_id', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="area-div">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Area<span class="required">*</span></label>
                                                    {{ Form::select('shipping[area]', $areas, isset($user_info->address[1]) ? $user_info->address[1]->area : null, ['id'=>'billing_area_id', 'class' => 'form-control']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                <div class="col-md-4">
                                            <div class="form-col">
                                                <h3>Shipping Method</h3>
                                                <div class="ship-list">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" value="shipping-method-1" name="shipping[method]" checked="checked">
                                                            Flat Rate
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" value="shipping-method-2" name="shipping[method]" checked="checked">
                                                            Fixed <span class="text-primary">$5.00</span>
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" value="shipping-method-2" name="shipping[method]" checked="checked">
                                                            Fixed <span class="text-primary">$5.00</span>
                                                        </label>
                                                    </div>
                                                </div>
                        
                        
                                                <h3 class="no-border">Discount Codes <a class="expand-plus collapsed" role="button" data-toggle="collapse" href="#discountArea" aria-expanded="false" aria-controls="discountArea"></a></h3>
                        
                                                <div class="collapse" id="discountArea">
                                                    <div class="form-group wide">
                                                        <label>Enter your coupon code:</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                        
                                                    <a href="#" class="btn btn-primary">Apply</a>
                                                </div>
                                            </div>
                                        </div>-->
                        <div class="col-md-6">
                            <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                                <div class="box-content">
                                    <div class="form-col">
                                        <h3>Payment Method</h3>
                                        <div class="checkout-payment-method">
                                            <div class="radio">
                                                <label>
                                                    <input id="p_method_cashondelivery" type="radio" value="cod" name="payment_method" checked="checked" class="payment-card-check">
                                                    Cash on delivery
                                                </label>
                                                <p id="cod-msg">Pay with cash upon delivery.</p>
                                            </div>
                                            
                                            <div class="radio">
                                                <label for="payment_method_bacs">
                                                    <input id="payment_method_bacs" value="bkash" type="radio" name="payment_method" title="Bkash Payment" class="payment-card-check"/>
                                                    bKash Transfer 
                                                </label>
                                                <p id="bcash-msg" style="display: none">Payment to our bKash Merchant Number(01933336655). Please use your Order Number as the payment reference.</p>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input id="payment_method_foster" type="radio" value="card"  name="payment_method" class="payment-card-check">
                                                    Visa/Master
                                                </label>
                                            </div>

                                            <div id="payment-credit-card-area">
                                                <div class="form-group wide mb-md">
                                                    <label>Card Type<span class="required">*</span></label>
                                                    <select class="form-control" name="online_method">
                                                        <option value="foster">Credit Card (Visa, Mastercard, DBBL Nexus, bKash or DBBL Mobile Banking)</option>
                                                        <option value="foster2">American Express</option>
                                                        <option value="foster_dbbl">Dutch Bangla Bank</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout-review-action">
                                            @php
                                            $sum = 0;
                                            foreach (Cart::content() as $item) {
                                                $sum += $item->options->productPrice * $item->qty;
                                            }
                                            @endphp
                                            <span class="sub-total" style="display: none">{{ Cart::total() }}</span>
                                            <h5>Order Total <span class="pull-right amnt_total">{{ $sum }}</span></h5>
                                            @if(number_format(($sum - Cart::total()), 1) != 0.0)
                                            <hr>
                                            <h5>Order Discount <span class="pull-right">{{ number_format(($sum - Cart::total()), 1) }}</span></h5>
                                            @endif
                                            <?php
                                            $dis_amount = $sum-Cart::total();
                                            $net_amount = $dis_amount+Cart::total();
                                            $dis_per = $dis_amount*100/$net_amount;
                                            ?>
                                            <input type="hidden" name="dis_per" value="{{$dis_per}}"/>
                                            <hr id="cupon-hr">
                                            <h5 id="cupon-value">Coupon Discount <span class="pull-right cuppon-dis">0</span></h5>
                                            @if(Cart::total() >= 10000)
                                            <hr>
                                            <h5>Total Discount(2%) <span class="pull-right total-dis">{{ (Cart::total()*2)/100 }}</span></h5>
                                            @endif
                                            <div id="dbbl" style="display: none;">
                                                <hr>
                                                <h5>Discount for Bank Promotion <span class="pull-right bank-dis">0</span></h5>
                                            </div>
                                            <hr>
                                            <h5><span style="margin-left: 0;" class="delivery_text">Delivery Charge </span>
                                                @if(Cart::total() > 799)
                                                <span class="shipping-fee pull-right">
                                                0
                                                </span>
                                                @else
                                                <span class="shipping-fee pull-right">
                                                <?php
                                                    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                                    $currentHour = $dt->format('H');
                                                    ?>
                                                    @if($currentHour >= 14 && $currentHour < 18)
                                                    99
                                                    @else
                                                    49
                                                    @endif
                                                </span>
                                                @endif
                                            </h5>
                                            <h5 style="border-top: 2px solid #555;">Grand Total <span class="grand-total pull-right"></span></h5>
                                            <button style="margin-top: 30px;" id="place-order" name="submit" type="submit" title="Place Order now" class="btn btn-primary pull-right">Place Order now</button>
                                            <span class="please-wait" id="review-please-wait" style="display:none;">Submitting order information... </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-xs-12">
                                    <p>I’ve read and accept the - <a href="#" style="color: maroon; text-decoration: none; font-weight: bold;">Terms & Condition</a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>

            <div class="modal fade shop-login-modal" tabindex="-1" role="dialog" aria-labelledby="myLoginModal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <form action="#">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                                <h4 class="modal-title" id="myLoginModal">Login to your Account</h4>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="mb-xs">Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label class="mb-xs">Password <span class="required">*</span></label>
                                    <input type="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="#" class="btn btn-link pull-left" data-toggle="modal" data-target=".shop-fpass-modal" data-dismiss="modal">Forget Your Password?</a>
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade shop-fpass-modal" tabindex="-1" role="dialog" aria-labelledby="myRecoverModal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">

                        <form action="#">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                                <h4 class="modal-title" id="myRecoverModal">Recover your password</h4>
                            </div>

                            <div class="modal-body">
                                <p>Please enter your email address below. You will receive a link to reset your password.</p>
                                <div class="form-group">
                                    <label class="mb-xs">Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <a href="#" class="btn btn-link pull-left" data-toggle="modal" data-target=".shop-login-modal" data-dismiss="modal"><i class="fa fa-angle-double-left mr-xs"></i>Back to Login</a>
                                <input type="submit" class="btn btn-primary" value="Recover">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        @include('Theme::footer')
        
    <script>
        $(window).on('load', function () {
            var disId = $('#billing_region_id').val();
            if(disId == 1){
                $('#area-div').show();
                $('#dalivery-time').show();
            }else{
                $('#area-div').hide();
                $('#dalivery-time').hide();
            }
            var cuppon = $('.cuppon-dis').text();
            if(cuppon == 0){
               $('#cupon-value').hide(); 
               $('#cupon-hr').hide(); 
            }
            var shippingFee = $('.shipping-fee').text();
            var subTotal = $('.sub-total').text();
            var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
            if(subTotal >= 10000){
                var totalDis = (parseFloat(subTotal)*2)/100;
            }else{
                var totalDis = 0;
            }
//            alert(totalDis);
            var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2);
//            var total = (((subTotal + shippingFee) - cuppon) - totalDis);
            $('.grand-total').text(total);
            
            var date = new Date();
            Date.prototype.AddDays = function (days) {
                days = parseInt(days, 10);
                return new Date(this.valueOf() + 1000 * 60 * 60 * 24 * days);
            }
            var tomorrow = date.AddDays(1);
            var nextDay = tomorrow.getFullYear()+'-'+(tomorrow.getMonth()+1)+'-'+tomorrow.getDate();
            if(date.getHours() >= 18 ){
                $("#hide-option").hide();
                $('.today').hide();
                $('.tomorrow').show();
                $("#pickup_date").find("option").each(function () {
                    if ($(this).val() == nextDay) {
                        $(this).prop("selected", "selected");
                    }
                });
            }
        });
        $(document).ready(function () {
            $('#billing_region_id').on('change', function(){
                var subTotal = $('.sub-total').text();
                var disId = $(this).val();
                if(disId == 1){
                    $('#area-div').show();
                    $('#dalivery-time').show();
                    var tt = 'Delivery Charge';
                    $('span.delivery_text').text(tt);
                }else{
                    $('#area-div').hide();
                    $('#dalivery-time').hide();
                    var ttt = 'Courier Charge';
                    $('span.delivery_text').text(ttt);
                }
                var token = '{{ csrf_token() }}';
                $.ajax({
                    type: "POST",
                    url: "{{URL::to('get-shipping-value')}}",
                    data: {disId: disId, _token: token},
                    success: function (res) {
                        if(disId == 1 && subTotal > 799){
                            $('.shipping-fee').text(0);
                        }else if(disId == 1 && subTotal <= 799){
                            var time = new Date();
//                            alert(time.getHours());
                            if(time.getHours() >= 18){
                               $('.shipping-fee').text(49);
                            }else{
                               $('.shipping-fee').text(res); 
                            }
                        }else{
                            $('.shipping-fee').text(res);
                        }
                        var cuppon = $('.cuppon-dis').text();
                        if(disId == 1 && subTotal > 799){
                            var shippingFee = 0;
                        }else if(disId == 1 && subTotal <= 799){
                            var time = new Date();
//                            alert(time.getHours());
                            if(time.getHours() >= 18){
                               var shippingFee = 49;
                            }else{
                               var shippingFee = res;
                            }
                        }else{
                            var shippingFee = res;
                        }
                        var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
                        if(subTotal >= 10000){
                            var totalDis = (parseFloat(subTotal)*2)/100;
                        }else{
                            var totalDis = 0;
                        }
                        var dis_for_bank = $('.bank-dis').text();
                        //            alert(totalDis);
                        var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2) - dis_for_bank;
                        //            var total = (((subTotal + shippingFee) - cuppon) - totalDis);
                        $('.grand-total').text(total);
                    }
                });
//                if(disId == 1){
//                   var shipAmount  = 99;
//                }else{
//                   var shipAmount  = 150;
//                }
//                $('.shipping-fee').text(shipAmount);
//                
                
                
            });
            
            $(document).ready(function () {
                $('#billing_area_id').on('change', function(){
                    var areaId = $(this).val();
                    var token = '{{ csrf_token() }}';
                    var subTotal = $('.sub-total').text();
                    $.ajax({
                        type: "POST",
                        url: "{{URL::to('get-area-shipping-value')}}",
                        data: {areaId: areaId, _token: token},
                        success: function (res) {
                            if(subTotal > 799){
                                $('.shipping-fee').text(0);
                            }else if(subTotal <= 799 && res > 0){
                                var time = new Date();
    //                            alert(time.getHours());
                                if(time.getHours() >= 18){
                                   $('.shipping-fee').text(49);
                                }else{
                                   $('.shipping-fee').text(res); 
                                }
                            }else{
                                $('.shipping-fee').text(res);
                            }
                            var cuppon = $('.cuppon-dis').text();
                            if(subTotal > 799){
                                var shippingFee = 0;
                            }else if(subTotal <= 799 && res > 0){
                                var time = new Date();
    //                            alert(time.getHours());
                                if(time.getHours() >= 18){
                                   var shippingFee = 49;
                                }else{
                                   var shippingFee = res;
                                }
                            }else{
                                var shippingFee = res;
                            }
                            var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
                            if(subTotal >= 10000){
                                var totalDis = (parseFloat(subTotal)*2)/100;
                            }else{
                                var totalDis = 0;
                            }
                            var dis_for_bank = $('.bank-dis').text();
                            //            alert(totalDis);
                            var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2) - dis_for_bank;
                            //            var total = (((subTotal + shippingFee) - cuppon) - totalDis);
                            $('.grand-total').text(total);
                        }
                    });
                });
                
                $('#pickup_date').on('change', function(){
                    var date = $(this).val();
                    var nowDate = new Date();
                    var subTotal = $('.sub-total').text();
                    var today = nowDate.getFullYear()+'-'+(nowDate.getMonth()+1)+'-'+nowDate.getDate();
                    if(date == today){
                        $('.today').show();
                        $('.tomorrow').hide();
                        var time = new Date();
                        if(subTotal > 799){
                            $('.shipping-fee').text(0);
                        }else{
                            if(time.getHours() >= 14 && time.getHours() <= 18){
                               $('.shipping-fee').text(99);
                            }else{
                               $('.shipping-fee').text(49); 
                            }
                        }
                    }else{
                        $('.today').hide();
                        $('.tomorrow').show();
                        if(subTotal > 799){
                           $('.shipping-fee').text(0);
                        }else{
                           $('.shipping-fee').text(49); 
                        }
                    }
                     var cuppon = $('.cuppon-dis').text();
                     var shippingFee = $('.shipping-fee').text();
                     var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
                     if(subTotal >= 10000){
                         var totalDis = (parseFloat(subTotal)*2)/100;
                     }else{
                         var totalDis = 0;
                     }
                     //            alert(totalDis);
                     var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2);
                     //            var total = (((subTotal + shippingFee) - cuppon) - totalDis);
                     $('.grand-total').text(total);
                });
            });
            
            $("#shipping_same_as_billing").on('change', function () {
                $("#ship_address_block").slideToggle();
            });
            $("#billing_register_account").on('change', function () {
                $("#register-customer-password").slideToggle();
            });


            $('form').on('click', '#place-order', function (e) {
                e.preventDefault();

                $('#review-please-wait').show();
                var form = $(this).closest('form');
                var formData = form.serializeArray();

                var shippingFee = $('.shipping-fee').text();
                var cuppon = $('.cuppon-dis').text();
                var amnt_total = $('.amnt_total').text();
                var bank_dis = $('.bank-dis').text();
                formData.push({name: 'shippingfee', value: shippingFee});
                formData.push({name: 'cuppon', value: cuppon});
                formData.push({name: 'amnt_total', value: amnt_total});
                formData.push({name: 'bank_dis', value: bank_dis});
                $.ajax({
                    url: '/checkout',
                    type: 'POST',
                    data: formData,
                    success: function (res) {
                        if (res.success == 1) {
                            var orId = res.order_id;
                            var return_url = "{{ url('order-info') }}/"+orId+"";
//                            swal('Good job!', 'You have created the order successfully!', 'success');
                            if (res.auth == 1) {
                                window.location.replace(return_url);
                            } else {
                                window.location.replace(return_url);
                            }
                        }else if(res.success == 2){
                            window.location.replace(res.url);
                        }

                    },
                    error: function (jqXHR, exception) {
                        var firstError = jqXHR.responseJSON[Object.keys(jqXHR.responseJSON)[0]][0];
                        swal('Someting Worng!', firstError, 'error');
                        $('#review-please-wait').hide();
                    }
                })

            });
            
            
            $('#p_method_cashondelivery').on('click', function(){
               $('#cod-msg').show();
               $('#bcash-msg').hide();
               $('#all-card-msg').hide();
               $('#amex-msg').hide();
               $('#dbbl-msg').hide();
            });
            $('#payment_method_bacs').on('click', function(){
               $('#cod-msg').hide();
               $('#bcash-msg').show();
               $('#all-card-msg').hide();
               $('#amex-msg').hide();
               $('#dbbl-msg').hide();
            });
            $('#payment_method_foster').on('click', function(){
               $('#cod-msg').hide();
               $('#bcash-msg').hide();
               $('#all-card-msg').show();
               $('#amex-msg').hide();
               $('#dbbl-msg').hide();
            });
            $('#payment_method_foster2').on('click', function(){
               $('#cod-msg').hide();
               $('#bcash-msg').hide();
               $('#all-card-msg').hide();
               $('#amex-msg').show();
               $('#dbbl-msg').hide();
            });
            $('#payment_method_foster_dbbl').on('click', function(){
               $('#cod-msg').hide();
               $('#bcash-msg').hide();
               $('#all-card-msg').hide();
               $('#amex-msg').hide();
               $('#dbbl-msg').show();
            });
            
            $('input[name=payment_method]').on('change', function(){
                var g_total = $('.grand-total').text();
                var checked = $('input[name=payment_method]:checked').val()
                var amnt_total = $('.amnt_total').text();
                var tot_dis_per = $('input[name = dis_per]').val();
                if(checked == 'foster_dbbl'){
                   var bank_dis = 7;
                }else if(checked == 'foster2'){
                   var bank_dis = 6;
                }else{
                    var bank_dis = 0;
                }
                var dis_change = bank_dis - tot_dis_per;
                if(bank_dis > tot_dis_per){
                   var dis_for_bank = ((amnt_total*dis_change)/100).toFixed(2);
    //                   alert(dis_for_dbbl);
                   $('.bank-dis').text(dis_for_bank);
                   $('#dbbl').show();
                   var subTotal = $('.sub-total').text();
                   var cuppon = $('.cuppon-dis').text();
                   var shippingFee = $('.shipping-fee').text();
                   var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
                   if(subTotal >= 10000){
                       var totalDis = (parseFloat(subTotal)*2)/100;
                   }else{
                       var totalDis = 0;
                   }
                   var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2) - dis_for_bank;
                   $('.grand-total').text(total);
                }else{
                    var dis_for_bank = 0;
                    $('.bank-dis').text(0);
                    $('#dbbl').hide();
                    var subTotal = $('.sub-total').text();
                    var cuppon = $('.cuppon-dis').text();
                    var shippingFee = $('.shipping-fee').text();
                    var totalWship = parseFloat(subTotal) + parseFloat(shippingFee);
                    if(subTotal >= 10000){
                        var totalDis = (parseFloat(subTotal)*2)/100;
                    }else{
                        var totalDis = 0;
                    }
                    var total = ((totalWship - parseFloat(cuppon)) - totalDis).toFixed(2) - dis_for_bank;
                    $('.grand-total').text(total);
                }
            });
            
//            $('#payment_method_foster_dbbl').on('click', function(){
//               var amnt_total = $('.amnt_total').text();
////               alert(amnt_total);
//               var tot_dis_per = $('input[name = dis_per]').val();
//               var dbbl_dis = 7;
//               var dis_change = dbbl_dis - tot_dis_per;
//               if(dbbl_dis > tot_dis_per){
//                   var dis_for_dbbl = (amnt_total*dis_change)/100;
////                   alert(dis_for_dbbl);
//                   $('.bank-dis').text(dis_for_dbbl);
//                   $('#dbbl').show();
//               }else{
//                   $('.bank-dis').text(0);
//                   $('#dbbl').hide();
//               }
//            });
        });
    </script>

</body>
</html>
