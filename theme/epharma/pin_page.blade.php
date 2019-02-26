@include('Theme::header')


<div role="main" class="main">

    <section class="form-section">
        <div class="container">
            <div class="col-sm-6 col-xs-12" style="float: none; margin: 0 auto;">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <form role="form" method="POST" action="{{ URL::to('varify-pin') }}">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    {{ csrf_field() }}
                                    <h3 style="color: #0088cc !important" class="heading-text-color font-weight-normal">Mobile Varification Pin </h3>
                                    <div class="clearfix"></div>
                                    @if (count($errors) > 0)
                                    <div style="background: #FBD8DB; padding: 20px">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li style="color: #90111A; padding: 5px 0;">{{ $error }}<sup style="color: red">*</sup></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="font-weight-normal">Pin Number <span class="required">*</span></label>
                                        <input type="text" name="pin_number" placeholder="Enter your pin number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-action clearfix">
                                    <a href="{{ url('send-varification-pin') }}" class="pull-left">Request Pin Again!</a>

                                    <input type="submit" class="btn btn-primary btn-lg" value="Enter">
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
