@include('Theme::header')


<div role="main" class="main">
    @include('Theme::ajax_search')
    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
                            <div class="form-group">
                                <span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">New Customer</span>
                                <a href="{{ url('registration') }}">
                                    <button class="btn btn-info pull-lg-right">Register</button>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form role="form" method="POST" action="{{ URL::to('post-login') }}">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    {{ csrf_field() }}
                                    <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">LOGIN</h3>
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
                                        <label class="font-weight-normal">Mobile <span class="required">*</span></label>
                                        <input type="text" name="mobile" placeholder="0191XXXXXXX" class="form-control" required>
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


@include('Theme::footer')

</body>
</html>
