@extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')

@include('frontendlayout.slider')


<!--special-products-->
@foreach ($collections as $collection)
<div class="container">
  <div class="special-products">
    <div class="page-header">
      <h2>{{ $collection->name}}</h2>
    </div>

    <div class="special-products-pro">
      <div class="slider-items-products">
        <div id="special-products-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4">
            @foreach($collection->products->take(10) as $product)
            <?php
            if ($product->brandattrOptions != NULL) {
              $brandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
            } else {
              $brandDiscount = 0;
            }
            ?>
            @if($product->media->isNotEmpty())
            <div class="product-item">
              <div class="item-inner">  
                <div class="product-thumbnail">
                  <div class="icon-sale-label sale-left">5 %</div>
                  <div class="icon-new-label new-right">New</div>
                  <div class="pr-img-area"> <a title="{{ $product->name }}" href="{{ url('product/'.$product->id) }}">
                    <figure> <img class="first-img" src="{{ asset('newdesign/images/gluco.jpg') }}" alt=""> <img class="hover-img" src="{{ asset('newdesign/images/gluco.jpg') }}" alt=""></figure>
                  </a> </div>
                  <div class="pr-info-area">
                    <div class="pr-button">
                      <div class="mt-button add_to_wishlist"> <a> <i class="fa fa-heart"></i> </a> </div>
                      <div class="mt-button add_to_compare"> <a> <i class="fa fa-signal"></i> </a> </div>
                      <div class="mt-button quick-view"> <a> <i class="fa fa-search"></i> </a> </div>
                    </div>
                  </div>
                </div>
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title"> <a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}">{{ $product->name }}</a> </div>
                    <div class="item-content">
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <div class="item-price">
                        <div class="price-box"> <span class="regular-price"> <span class="price">৳{{$product->price}}</span> </span> </div>
                      </div>
                      <div class="product-actions">
                        <a href="#" class="addtocart related-btn-cart" title="Add to Bag" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $collection->discount_percentage, $brandDiscount); ?>" rel_id="{{ $product->id }}" rel_token="{{ csrf_token() }}" rel_qty="{{ $product->min_quantity }}">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Add to Bag</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endforeach

  {{-- live chat --}}
<br><br>
 <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bea7e0d70ff5a5a3a71e792/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

@endsection

