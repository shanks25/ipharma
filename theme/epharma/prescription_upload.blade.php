@include('Theme::header')


<div role="main" class="main">
    @include('Theme::ajax_search')
    <section class="form-section">
        <div class="container">
            <div class="col-sm-9 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div class="col-xs-12" style="border-bottom: 1px solid #eee; margin-bottom: 10px;">
                            <div class="form-group">
                                <span style="font-size: 16px; line-height: 35px; color: #0088cc" class="pull-left">Prescription Upload</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form role="form" method="POST" action="{{ url('store-prescription') }}" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    @if(Session::has('success'))
                                    <div class="col-xs-12">
                                        <div class="alert alert-success text-center">
                                            <p class="form_error"><?php echo Session::get('success'); ?></p>
                                        </div>
                                    </div>
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="col-xs-12">
                                        <div class="alert alert-danger text-center">
                                            <p class="form_error"><?php echo Session::get('error'); ?></p>
                                        </div>
                                    </div>
                                    @endif
                                    {{ csrf_field() }}
                                    <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">User Info</h3>
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
                                        <div class="col-sm-6 col-xs-12">
                                            <label class="font-weight-normal">Name <span class="required">*</span></label>
                                            <input type="text" name="full_name" class="form-control">
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <label class="font-weight-normal">Mobile <span class="required">*</span></label>
                                            <input type="text" name="mobile" class="form-control">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-xs-12">
                                            <label class="font-weight-normal">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <label class="font-weight-normal">Doctor Prescription </label>
                                            <input type="file" name="file" class="form-control" style="padding: 0;"/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label class="font-weight-normal">If Any Query </label>
                                            <textarea class="form-control" name="product_inquiry" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <p class="required">* Required Fields</p>
                                    </div>
                                </div>

                                <div class="form-action clearfix">
                                    <div class="col-xs-12">
                                        <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                                    </div>
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
