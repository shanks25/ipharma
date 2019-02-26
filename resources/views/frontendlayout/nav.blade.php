<nav>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="mm-toggle-wrap">
          <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
          <span class="mm-label">Categories</span> </div>
          <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
              <div class="mega-menu-title">
                <h3>Shop by category</h3>
              </div>
              <div class="mega-menu-category">
                <ul class="nav">
                 @if(option('menu'))
                 @foreach(option('menu') as $menu)
                 <li> <a href="{{ $menu->customSelect }}">{{ $menu->title }}</a>

                  <div class="wrap-popup">

                    <div class="popup">
                      <div class="row">
                       @if(isset($menu->children))
                       <div class="col-md-4 col-sm-6">

                         <ul class="nav">  
                          @foreach( $menu->children as$key=>$menu)
                          @if ($key<9)
                          <li><a href="{{ $menu->customSelect}}"><span>{{ $menu->title }}</span></a></li>    
                          @endif
                          @endforeach  
                        </ul>

                      </div>
                      @endif

                      <div class="col-md-4 has-sep hidden-sm">
                        <div class="custom-menu-right">
                          <div class="box-banner menu-banner">
                            <div class="add-right"><a href="#"><img src="{{ asset('newdesign/images/personal_care.jpg') }}" alt=""></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach

            </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 col-sm-8">
      <div class="mtmegamenu">
        <ul>
          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="index.html">
              <div class="title title_font"><span class="title-text">Home</span></div>
            </a></div>

          </li>
          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('about-us') }}">
              <div class="title title_font"><span class="title-text">About us</span></div>
            </a></div>

          </li>
          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('news') }}">
              <div class="title title_font"><span class="title-text">News</span></div>
            </a></div>

          </li>
          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('contact-us') }}">
              <div class="title title_font"><span class="title-text">Contact Us</span></div>
            </a></div>

          </li>
  @if(!Auth::check())
          {{-- expr --}}
    
          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('product-inquiry') }}">
              <div class="title title_font float-right"><span class="title-text">Login</span></div>
            </a></div>

          </li>
                    <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('registration') }}">
              <div class="title title_font float-right"><span class="title-text">Register</span></div>
            </a></div>

          </li>
@else

          <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('customer/account/index') }}">
              <div class="title title_font float-right"><span class="title-text">My Account</span></div>
            </a></div>

          </li>
                    <li class="mt-root demo_custom_link_cms">
            <div class="mt-root-item"><a href="{{ url('logout') }}">
              <div class="title title_font float-right"><span class="title-text">Logout</span></div>
            </a></div>

          </li>


    @endif

       

        </ul>
      </div>
    </div>
  </div>
</div>
</nav>