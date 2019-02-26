@include('Theme::header')

<div role="main" class="main">

    @include('Theme::ajax_search')
<!--    <section class="page-header mb-lg">

        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </section>-->

    <div class="container" style="padding-top: 30px;">
        <div class="row">
            <div class="col-md-9 col-md-push-3 my-account">
                <h1 class="h2 heading-primary font-weight-normal">{{ $userInfo->name }} - Dashboard</h1>

                <h2 class="h3 mb-sm"><strong>Account Information</strong></h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel-box">
                            <div class="panel-box-title">
                                <h3>Contact Information</h3>
                                <a href="{{ url('customer/account/edit') }}" class="panel-box-edit">Edit</a>
                            </div>

                            <div class="panel-box-content">
                                <p>Name - {{ $userInfo->first_name }} {{ $userInfo->last_name }} <br>
                                    Email - {{ $userInfo->email }}<br>
                                    Mobile - {{ $userInfo->mobile }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="panel-box">
                            <div class="panel-box-title">
                                <h3>Delivery Address</h3>
                                <a href="{{ url('customer/address/new') }}" class="panel-box-edit">Edit</a>
                            </div>

                            <div class="panel-box-content">
                                @if($address == NULL)
                                <p class="text-danger">You have not set a default billing address.</p>
                                @else
                                <p class="text-success">You have set a default billing address.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('Theme::user_sidebar')
        </div>
    </div>

</div>

@include('Theme::footer')
