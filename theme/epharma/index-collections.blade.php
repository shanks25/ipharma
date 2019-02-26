<div class="container mb-lg">
    <h2 class="slider-title">
        <span class="inline-title">{{ $collection->name }}</span>
        <span class="line"></span>
    </h2>

    <div class="owl-carousel owl-theme manual new-products-carousel">
        @foreach($collection->products->take(10) as $product)
        <?php
        if ($product->brandattrOptions != NULL) {
            $brandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
        } else {
            $brandDiscount = 0;
        }
        ?>
        @if($product->media->isNotEmpty())
        <div class="product">
            <figure class="product-image-area">
                <a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}" class="product-image">
                    <img src="{{ Theme::publicImg('tb_' . $product->media->first()->src) }}" alt="{{ $product->name }}">
                </a>
                @if($product->discount_percentage || $product->discount_amount || $product->terms[0]->discount_percentage || $brandDiscount)
                <div class="product-label">
                    <span class="new"><?php echo disPercentage($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?>%</span>
                </div>
                @endif
            </figure>
            <div class="product-details-area">
                <h2 class="product-name"><a href="{{ url('product/'.$product->id) }}" title="Product Name">{{ $product->name }}</a></h2>
                <div class="product-price-box">
                    @if($product->discount_percentage != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($product->discount_amount != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($collection->discount_percentage != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($brandDiscount != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @endif
                    <span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $collection->discount_percentage, $brandDiscount); ?></span>
                </div>

                <div class="product-actions">
                    <a href="#" class="addtocart related-btn-cart" title="Add to Bag" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $collection->discount_percentage, $brandDiscount); ?>" rel_id="{{ $product->id }}" rel_token="{{ csrf_token() }}" rel_qty="{{ $product->min_quantity }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add to Bag</span>
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="product">
            <figure class="product-image-area">
                <a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}" class="product-image">
                    <img src="{{ Theme::asset('img/products/shop4/product1.jpg') }}" alt="{{ $product->name }}">
                </a>
                @if($product->discount_percentage || $product->discount_amount || $product->terms[0]->discount_percentage || $brandDiscount)
                <div class="product-label">
                    <span class="new"><?php echo disPercentage($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?>%</span>
                </div>
                @endif
            </figure>
            <div class="product-details-area">
                <h2 class="product-name"><a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}">{{ $product->name }}</a></h2>
                <div class="product-price-box">
                    @if($product->discount_percentage != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($product->discount_amount != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($collection->discount_percentage != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @elseif($brandDiscount != 0)
                    <span class="old-price">৳{{$product->price}}</span>
                    @endif
                    <span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $collection->discount_percentage, $brandDiscount); ?></span>
                </div>

                <div class="product-actions">
                    <a href="#" class="addtocart related-btn-cart" title="Add to Bag" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $collection->discount_percentage, $brandDiscount); ?>" rel_id="{{ $product->id }}" rel_token="{{ csrf_token() }}" rel_qty="{{ $product->min_quantity }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Add to Bag</span>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>
<div class="clearfix">&nbsp;</div>