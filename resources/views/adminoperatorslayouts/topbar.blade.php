<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            
            @if( isset($message) )
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <div class="alert alert-{{ $messageType or 'success' }} alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $message }}
                    </div>
                </li>
            </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ URL::to('admin/settings/frontpage') }}">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" 
                                  action="{{ route('logout') }}" 
                                  method="POST" 
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!--<li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>-->
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->