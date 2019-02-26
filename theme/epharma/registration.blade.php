@include('Theme::header')


<div role="main" class="main">

    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
                            <div class="form-group">
                                <span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">Already Registered Customer</span>
                                <a href="{{ url('user-login') }}">
                                    <button class="btn btn-info pull-lg-right">Login</button>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form action="{{ route('register') }}" method="post" id="form-validate">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">REGISTER</h3>
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
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="font-weight-normal">First Name <span class="required">*</span></label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div>

                                      <div class="form-group">
                                        <label class="font-weight-normal">Last Name <span class="required">*</span></label>
                                        <input type="text" name="last_name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-normal">Mobile Number <span class="required">*</span></label>
                                        <input type="text" name="mobile" class="form-control" required>
                                    </div>

                                     <div class="form-group">
                                        <label class="font-weight-normal">Address<span class="required">*</span></label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-normal">Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-normal">Password <span class="required">*</span></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <p class="required">* Required Fields</p>
                                </div>

                                <div class="form-action clearfix">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Register">
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
