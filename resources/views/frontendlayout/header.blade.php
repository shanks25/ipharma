 <header>
  <div class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6 col-md-6 hidden-xs"> 
            <!-- Default Welcome Message -->
            <div class="welcome-msg ">Your Online Healthcare Solution </div>
            <span class="phone hidden-sm">Call Us: 0123456789 / 0876543210 </span> </div>
            
            <!-- top links -->
            <div class="headerlinkmenu col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="links">


                @if(!Auth::check())
                <div class="login"><a href="{{ url('user-login') }}"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Log In</span></a></div>
                <div class="login"><a href="{{ url('registration') }}"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Register</span></a></div>

              </div>

              @else
              <div class="login"><a href="{{ url('logout') }}"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Logout</span></a></div>

              <div class="login"><a href="{{ url('customer/account/index') }}"><i class="fa fa-user-circle"></i><span class="hidden-xs">My Account</span></a></div>


            </div>

            @endif

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-12"> 
          <!-- Header Logo -->
          <div class="logo"><a title="e-commerce" href="{{ url('/') }}"><img alt="e-commerce" src="{{ asset('newdesign/images/Logo.png') }}"></a> </div>
          <!-- End Header Logo --> 
        </div>
        <div class="col-xs-9 col-sm-6 col-md-6 col-lg-7"> 
          <!-- Search -->

          <div class="top-search">
            <div id="search">
                         @include('frontendlayout.ajax_search')
            </div>
          </div>

          <!-- End Search --> 
        </div>
        <!-- top cart -->

          <!-- <div class="col-lg-2 col-xs-3 top-cart">
            <div class="top-cart-contain">
              <div class="mini-cart">
                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#">
                  <div class="cart-icon"><i class="fa fa-shopping-basket"></i></div>
                  <div class="shoppingcart-inner hidden-xs"><span class="cart-title">Basket</span> <span class="cart-total">4 Item(s)</span></div>
                  </a></div>
                <div>
                  <div class="top-cart-content">
                    <div class="block-subtitle hidden-xs">Recently added item(s)</div>
                    <ul id="cart-sidebar" class="mini-products-list">
                      <li class="item odd"> <a href="#" title="Ipsums Dolors Untra" class="product-image"><img src="images/gaviscon.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="#">Sebium Foaming Gel moussant 200ml</a> </p>
                          <strong>1</strong> x <span class="price">Rs.1330</span> </div>
                      </li>
                      <li class="item even"> <a href="#" title="Ipsums Dolors Untra" class="product-image"><img src="images/gluco.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="#">Durex Thin Feel Condom</a> </p>
                          <strong>1</strong> x <span class="price">Rs.230.00</span> </div>
                      </li>
                      <li class="item last odd"> <a href="#" title="Ipsums Dolors Untra" class="product-image"><img src="images/products/img10.jpg" alt="Lorem ipsum dolor" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="#">Durex Thin Feel Condom</a> </p>
                          <strong>2</strong> x <span class="price">Rs.420.00</span> </div>
                      </li>
                    </ul>
                    <div class="top-subtotal">Subtotal: <span class="price">Rs.520.00</span></div>
                    <div class="actions">
                      <button class="btn-checkout" type="button"><i class="fa fa-check"></i><span>Checkout</span></button>
                      <button class="view-cart" type="button"><i class="fa fa-shopping-basket"></i> <span>View Cart</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </header>
