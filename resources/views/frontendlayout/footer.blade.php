<footer>
    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-7">
            <form id="newsletter-validate-detail" method="post" action="#">
              <h3 class="hidden-sm">Sign up for newsletter</h3>
              <div class="newsletter-inner">
                <input class="newsletter-email" name='Email' placeholder='Enter Your Email'/>
                <button class="button subscribe" type="submit" title="Subscribe">Subscribe</button>
              </div>
            </form>
          </div>
          <div class="social col-md-4 col-sm-5">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network googleplus"><a title="Connect us on Google+" target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="social-network linkedin"><a title="Connect us on Linkedin" target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li class="social-network rss"><a title="Connect us on Instagram" target="_blank" href="#"><i class="fa fa-rss"></i></a></li>
              <li class="social-network instagram"><a title="Connect us on Instagram" target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4">
          <h3 class="links-title">Contact Information
		<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
          <div class="footer-content">
            <div class="email"> <i class="fa fa-envelope"></i>
              <p>info@Ipharma24.com</p>
            </div>
            <div class="phone"> <i class="fa fa-phone"></i>
              <p>880 9617111555</p>
            </div>
            <div class="address"> <i class="fa fa-map-marker"></i>
              <p>Everyday / 09:00 AM - 09:00 PM</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Footer Menu<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
            <div class="tabBlock" id="TabBlock-1">
              <ul class="list-links list-unstyled">
                <li><a href="{{ url('how-to-order') }}">How To Order</a></li>
                <li><a href="{{ url('partners') }}">Partners</a></li>
                <li><a href="{{ url('policy') }}"> Policy</a></li>
                <li><a href="{{ url('news') }}"> News</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-12 col-lg-4 collapsed-block">
          <div class="footer-links">
            <h3 class="links-title">Mobile App<a class="expander visible-xs" href="#TabBlock-3">+</a></h3>
            <div class="tabBlock" id="TabBlock-3">
              <ul class="list-links list-unstyled">
                <li> <a href="#"> <img src="{{ asset('newdesign/images/google_play1.png') }}"> </a> </li>
               
              </ul>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2019 <a href="#"> Ipharama </a>. All Rights Reserved. </div>
          <div class="col-sm-6 col-xs-12">
            <div class="payment">
              <ul>
                <li><a href="#"><img title="Visa" alt="Visa" src="{{ asset('newdesign/images/visa.png') }}"></a></li>
                <li><a href="#"><img title="Paypal" alt="Paypal" src="{{ asset('newdesign/images/paypal.png') }}"></a></li>
                <li><a href="#"><img title="Discover" alt="Discover" src="{{ asset('newdesign/images/discover.png') }}"></a></li>
                <li><a href="#"><img title="Master Card" alt="Master Card" src="{{ asset('newdesign/images/master-card.png') }}"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> 
  
  <!-- End Footer --> 
  
<!-- jquery js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/jquery.min.js') }}"></script> 

<!-- bootstrap js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/bootstrap.min.js')}}"></script> 

<!-- owl.carousel.min js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/owl.carousel.min.js') }}"></script> 

<!-- bxslider js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/jquery.bxslider.js') }}"></script> 

<!-- Slider Js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/revolution-slider.js') }}"></script> 

<!-- megamenu js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/megamenu.js') }}"></script> 
<script type="text/javascript">
/* <![CDATA[ */   
var mega_menu = '0';

/* ]]> */
</script> 

<!-- jquery.mobile-menu js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/mobile-menu.js') }}"></script> 

<!--jquery-ui.min js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/jquery-ui.js') }}"></script> 

<!-- main js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/main.js') }}"></script> 

<!-- countdown js --> 
<script type="text/javascript" src="{{ asset('newdesign/js/countdown.js') }}"></script> 

<!-- Revolution Slider --> 
<script type="text/javascript">
	jQuery(document).ready(function() {
	jQuery('.tp-banner').revolution(
	{
	delay:9000,
	startwidth:1920,
	startheight:790,
	hideThumbs:10,
	
	navigationType:"bullet",							
	navigationStyle:"preview1",
	
	hideArrowsOnMobile:"on",
	
	touchenabled:"on",
	onHoverStop:"on",
	spinner:"spinner4"
});
});
</script> 

<!-- Hot Deals Timer 1--> 
<script type="text/javascript">
	var dthen1 = new Date("12/25/16 11:59:00 PM");
	start = "08/04/15 03:02:11 AM";
	start_date = Date.parse(start);
	var dnow1 = new Date(start_date);
	if(CountStepper>0)
	ddiff= new Date((dnow1)-(dthen1));
	else
	ddiff = new Date((dthen1)-(dnow1));
	gsecs1 = Math.floor(ddiff.valueOf()/1000);
	
	var iid1 = "countbox_1";
	CountBack_slider(gsecs1,"countbox_1", 1);
</script>
</body>

</html>
