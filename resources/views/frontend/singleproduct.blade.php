@extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')

<div class="main-container col1-layout">
<div class="container">
<div class="row">
<div class="col-main">
	<div class="product-view-area">
		<div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
			<div class="icon-sale-label sale-left">Sale</div>
			<div class="large-image"> <a href="images/first_aid.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="{{ asset('newdesign/images/first_aid.jpg') }}" alt="products"> </a> </div>
			<div class="flexslider flexslider-thumb">
			 
			</div>

			<!-- end: more-images --> 

		</div>
		<div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
			<div class="product-name">
				<h1>  {{ $product->name or '' }} </h1>
			</div>
			<div class="price-box">
				<p class="special-price"> <span class="price-label">Special Price</span> <span class="price">৳ {{$product->price}}</span> </p>
		 
			</div>
			<div class="ratings">
				<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
				<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
				<p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
			</div>
			<div class="short-description">
				<h2>Quick Overview</h2>
			<p>   {!!html_entity_decode($product->short_description)!!}
				</div>
				<div class="product-color-size-area">
					<div class="color-area">
						<h2 class="saider-bar-title">Size</h2>

					</div>
				</div>
				<?php
                                if ($product->brandattrOptions != NULL) {
                                    $brandDiscountSingle = $product->brandattrOptions->attributeValue->discount_percentage;
                                } else {
                                    $brandDiscountSingle = 0;
                                }
                                ?>

                                <div class="product-detail-info">
                                    <div class="product-price-box">
                                        @if($product->discount_percentage != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($product->discount_amount != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($product->terms[0]->discount_percentage != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @elseif($brandDiscountSingle != 0)
                                        <span class="old-price">৳{{$product->price}}</span>
                                        @endif
                                        <span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscountSingle); ?><b style="font-weight: normal; font-size: 12px; color: #777;">&nbsp;&nbsp;(Per Unit)</b></span>
                                    </div>
                                    <p class="availability">
                                        <!--<span class="font-weight-semibold">Qty / Box Details:</span>-->
                                        {!!html_entity_decode($product->short_description)!!}
                                    </p>
                                </div>

                                <div class="product-actions">
                                    <div class="product-detail-qty">
                                        <input type="hidden" id="minQty" value="{{ $product->min_quantity }}"/>
                                        <input type="text" name="qty" maxlength="12" value="{{ $product->min_quantity }}" class="vertical-spinner" id="product-vqty">
                                        {{ Form::hidden('id', $product->id) }}
                                        <input type="hidden" name="price" value="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscountSingle); ?>"/>
                                        {{ Form::hidden('_token', csrf_token()) }}
                                    </div>
                                    <a href="#" class="addtocart button btn-cart" title="Add to Bag">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add to Bag</span>
                                    </a>
                                </div>
				<div class="product-variation">
					<form action="#" method="post">
						<div class="cart-plus-minus">
							<label for="qty">Quantity:</label>
							<div class="numbers-row">
								<div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
								<input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
								<div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
							</div>
						</div>
						<button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-basket"></i> Order Now</span></button>
					</form>
				</div>
				<div class="product-cart-option">
					<ul>
						<li><a href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
						<li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="product-overview-tab">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="product-tab-inner">
						<ul id="product-detail-tab" class="nav nav-tabs product-tabs">
							<li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
							<li> <a href="#reviews" data-toggle="tab">Dosage</a> </li>

						</ul>
						<div id="productTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="description">
								<div class="std">
									<p>Components:- Alfalfa, Avena Sativa, Hydrastis Canadensis, Damianna, Cina, Calcararea, Phosphorium, kali phosphoicum, Natrum Phosphoricum, Withamia Somnifea in flavoured Syrup base.</p>
								</div>
							</div>
							<div id="reviews" class="tab-pane fade">
								<p>Components:- Alfalfa, Avena Sativa, Hydrastis Canadensis, Damianna, Cina, Calcararea, Phosphorium, kali phosphoicum, Natrum Phosphoricum, Withamia Somnifea in flavoured Syrup base.</p>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Main Container End --> 
 
 
 


@endsection 
@section('head')
<style>
.nextprev {
	background-color: green;
	border-color: rgba(0, 0, 0, 0.3);
	border-radius: 4px;
	color: #fff;
	font-size: 15px;
	margin-right: 10px;
	padding: 6px 15px;
	text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
}
.nextprev:hover {
	background-color: #4F87A2;
	border-color: rgba(0,0,0,0.5);
}
.nextprev2 {
	background-color: #00aeef;
	border-color: rgba(0, 0, 0, 0.3);
	border-radius: 4px;
	color: #fff;
	font-size: 15px;
	margin-right: 10px;
	padding: 6px 15px;
	text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
}
.nextprev2:hover {
	background-color: #216a94;
	border-color: rgba(0,0,0,0.5);
}
</style>

@endsection

@section('footer')

<script type="text/javascript" src="{{ asset('newdesign/js/jquery.flexslider.js') }}"></script> 
<script type="text/javascript" src="{{ asset('newdesign/js/cloud-zoom.js') }}"></script>
<script>
$(document).ready(function () {
	$(".my-rating").starRating({
		starSize: 25,
		disableAfterRate: false,
		callback: function (currentRating, $el) {
			var prodId = $('input[name = product_id]').val();
			var token = '{{ csrf_token() }}';
			$.ajax({
				type: "POST",
				url: "{{URL::to('add-reviews')}}",
				data: {rating: currentRating, p_id: prodId, _token: token},
				success: function (res) {

				}
			});
		}
	});

	$("#share").jsSocials({
		shares: ["facebook", "email", "twitter"]
	});

	$(".view-mode #list").click(function () {
		$("#grid-list-view .products-grid").hide();
		$("#grid-list-view .products-list").show();
	});

	$(".view-mode #grid").click(function () {
		$("#grid-list-view .products-grid").show();
		$("#grid-list-view .products-list").hide();
	});

	$("#button_lastdiv").click(function(){
		$('html, body').animate({
			scrollTop: $("#lastdiv").offset().top
		}, 1000);               
	});

	$("#button_lastdiv2").click(function(){
		var AuthUser = "{{{ (Auth::user()) ? Auth::user() : 0 }}}";
		var checkLink = "{{URL::to('user-login')}}";
		if(AuthUser != 0){
			$('html, body').animate({
				scrollTop: $("#lastdiv").offset().top
			}, 1000); 
		}else{
			swal({
				title: 'Sorry!',
				text: "For Ratings & Review you have to login first!",
				type: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'OK',
				cancelButtonText: 'Cancel',
				confirmButtonClass: 'btn nextprev',
				cancelButtonClass: 'btn nextprev2',
				buttonsStyling: false
			}).then(function () {

				window.location.href = checkLink;

			});
		}
		return false;
	});
})
</script>

@endsection