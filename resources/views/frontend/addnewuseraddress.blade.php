 @extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')
<link rel="stylesheet" href="{{ asset('build/css/intlTelInput.css') }}">
<script src="{{ asset('build/js/intlTelInput.js') }}"></script>
<div role="main" class="main">
 

<!--    <section class="page-header mb-lg">

        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">User Address</a></li>
            </ul>
        </div>
      </section>-->
      @include('includes.messages')
      <div class="container" style="padding-top: 30px;">
        <div class="row">
          <div class="col-md-9 col-md-push-3 my-account">
            <h1 class="h2 heading-primary font-weight-normal">{{ $userInfo->name }} - Add Address</h1>
            
            

            <div class="row">
              <div class="col-sm-12">
                <form action="{{ route('addnewuseraddress') }}" method="post" id="form-validate">
                  <div class="panel-box-content">
                    {{ csrf_field() }}
                    <h2 class="legend">Add Address</h2>
                    <div class="form-group">
                      <label for="name">Type<em class="text-danger">*</em></label>
                      <input type="text" id="name" name="heading"   title="Type" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label for="name">Full Name<em class="text-danger">*</em></label>
                      <input type="text" id="name" name="name"   title="Full Name" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address<em class="text-danger">*</em></label>
                      <input type="email" name="email"  title="Email" id="email" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile<em class="text-danger">*</em></label>
                      <input type="text" id="phone" name="mobile" placeholder="Mobile" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label for="address">Address 1<em class="text-danger">*</em></label>
                      <input type="text" name="address"  title="Address" id="address" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label for="address">Address2<em class="text-danger">*</em></label>
                      <input type="text" name="address2"   title="Address" id="address" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label for="address">Landmark<em class="text-danger">*</em></label>
                      <input type="text" name="landmark"  title="Address" id="address" class="form-control" required/>
                    </div>
                    <div class="form-group">
                      <label>District<span class="required">*</span></label>
                      {{ Form::select('district', $district, isset($address) ? $address->district : null, ['id'=>'district', 'class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                      <label>Area<span class="required">*</span></label>
                      {{ Form::select('area', $areas, isset($address) ? $address->area : null, ['id'=>'area', 'class' => 'form-control']) }}
                    </div>
                    
                  </div>
                  <div class="buttons-set">
                    <p class="required text-danger">* Required Fields</p>
                    <button type="submit" title="Save" class="btn btn-success btn-lg"><span><span>Save</span></span></button>
                  </div>
                </form>
              </div>
            </div>


          </div>

      @include('frontendlayout.user_sidebar')
        </div>
      </div>

    </div>

    <script>
      (function ($) {
        $(document).ready(function () {
          $('form').on('submit', function (e) {
            console.log('sdfg');
            e.preventDefault();

            $('#review-please-wait').show();
            var form = $(this).closest('form');
            var formData = form.serializeArray();
            $.ajax({
              url: '/add-address',
              type: 'POST',
              data: formData,
              success: function (res) {
                if (res.success == 1) {
                  swal('Great!', 'You have updated your address successfully!', 'success')
                  .then(function () {
                    window.location.replace("{{ url('customer/address/new') }}");
                  })
                }
              }
            });

          });
        });
      })(jQuery);
    </script>
    <script>
//Select Country Jquery Kunal
var input = document.querySelector("#phone");
window.intlTelInput(input, {

      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      initialCountry: "bd",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      preferredCountries: ['bd'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
 
 @endsection
