@extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')
 


<div class="container" style="padding-top: 30px;">
	<div class="row">
		
		<div class="col-md-9 col-md-push-3">
			<div class="toolbar mb-none">
				<div class="sorter">
					<div class="sort-by">
						<label>Sort by:</label>
						<select name="short_by">
							<option value="id" selected>Position</option>
							<option value="name">Name</option>
							<option value="price">Price</option>
						</select>
<!--                            <a href="#" title="Set Desc Direction">
                                <img src="{{ Theme::asset('img/i_asc_arrow.gif') }}" alt="Set Desc Direction">
                            </a>-->
                        </div>

                        <div class="view-mode">
                        	<ul>
                        		<li class="act">
                        			<span href="#" id="list" title="List">
                        				<i class="fa fa-list-ul"></i>
                        			</span>
                        		</li>
                        		<li>
                        			<span id="grid" title="Grid">
                        				<i class="fa fa-th"></i>
                        			</span>
                        		</li>
                        	</ul>
<!--                            <span class="act" href="#" id="list" title="List">
                                <i class="fa fa-list-ul"></i>
                            </span>
                            <span id="grid" title="Grid">
                                <i class="fa fa-th"></i>
                            </span>-->
<!--                            <a href="#" id="list" title="List">
                                <i class="fa fa-list-ul"></i>
                            </a>-->
                        </div>

                        <ul class="pagination">
                        	<li class="pagination active">{{ $catProduct->links() }}</li>
                        </ul>

                        <div class="limiter">
                        	<label>Show:</label>
                        	<?php
                        	$limit = [
                        		12 => 12,
                        		24 => 24,
                        		36 => 36,
                        	];
                        	?>

                        	{{ Form::select('limit', $limit, $catProduct->perPage(), ['id'=>'billing:region_id', 'class' => 'validate-select']) }}
                        </div>
                    </div>
                </div>
                <!--<h3 class="h1 heading-primary mt-xl">{{ $category->name }}</h3>-->
                <div id="grid-list-view">
                	<ul class="products-list">
                		@if($catProduct->count() == 0)
                		<div class="category-products">
                			<p>No Product found!</p>
                		</div>
                		@else
                		@foreach($catProduct as $product)
                		<?php
                		if ($product->brandattrOptions != NULL) {
                			$brandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
                		} else {
                			$brandDiscount = 0;
                		}
                		?>
                		<li>
                			<div class="product product-sm">
                				<figure class="product-image-area">
                					<a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}" class="product-image">
                						@if($product->media->isNotEmpty())
                						@foreach($product->media->take(2) as $i=>$media)

                						@if($i == 0)
                						<img src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{ $product->name }}"/>
                						@else
                						<img  alt="{{ $product->name }}" class="product-hover-image" src="{{ Theme::publicImg('tb_' . $media->src) }}"/>
                						@endif

                						@endforeach
                						@endif
                					</a>
                				</figure>
                				<div class="product-details-area">
                					<h2 class="product-name"><a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}">{{ $product->name }}</a></h2>

                					<div class="product-short-desc">
                						@if(isset($product->genericAttrOptions))
                						<p style="margin: 0 0 13px;">Generic : {{ $product->genericAttrOptions->attributeValue->title or '' }}</p>
                						@endif
                						@if(isset($product->brandattrOptions))
                						<p style="margin: 0 0 13px;">Company : {{ $product->brandattrOptions->attributeValue->title or '' }}</p>
                						@endif
                					</div>

                					<div class="product-price-box">
                						@if($product->discount_percentage != 0)
                						<span class="old-price">৳{{$product->price}}</span>
                						@elseif($product->discount_amount != 0)
                						<span class="old-price">৳{{$product->price}}</span>
                						@elseif($category->discount_percentage != 0)
                						<span class="old-price">৳{{$product->price}}</span>
                						@elseif($brandDiscount != 0)
                						<span class="old-price">৳{{$product->price}}</span>
                						@endif
                						<span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $category->discount_percentage, $brandDiscount); ?></span>
                					</div>

                					<div class="product-actions">
                						<a href="#" class="addtocart feature-btn-cart" title="Add to Bag" fet_id="{{ $product->id }}" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $category->discount_percentage, $brandDiscount); ?>" fet_token="{{ csrf_token() }}" fet_qty="{{ $product->min_quantity }}">
                							<i class="fa fa-shopping-cart"></i>
                							<span>Add to Bag</span>
                						</a>
                					</div>
                				</div>
                			</div>
                		</li>
                		@endforeach
                		@endif
                	</ul>
                	<ul class="products-grid columns4" style="display: none;">
                		@if($catProduct->count() == 0)
                		<div class="category-products">
                			<p>No Product found!</p>
                		</div>
                		@else
                		@foreach($catProduct as $product)
                		<?php
                		if ($product->brandattrOptions != NULL) {
                			$brandDiscount = $product->brandattrOptions->attributeValue->discount_percentage;
                		} else {
                			$brandDiscount = 0;
                		}
                		?>
                		<li>
                			<div class="product">
                				<figure class="product-image-area">
                					<a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}" class="product-image">
                						@if($product->media->isNotEmpty())
                						@foreach($product->media->take(2) as $i=>$media)

                						@if($i == 0)
                						<img src="{{ Theme::publicImg('tb_' . $media->src) }}" alt="{{ $product->name }}"/>
                						@else
                						<img  alt="{{ $product->name }}" class="product-hover-image" src="{{ Theme::publicImg('tb_' . $media->src) }}"/>
                						@endif

                						@endforeach
                						@endif
                					</a>
                					@if($product->discount_percentage || $product->discount_amount || $product->terms[0]->discount_percentage || $brandDiscount)
                					<div class="product-label">
                						<span class="new"><?php echo disPercentage($product->price, $product->discount_percentage, $product->discount_amount, $product->terms[0]->discount_percentage, $brandDiscount); ?>%</span>
                					</div>
                					@endif
                				</figure>
                				<div class="product-details-area">
                					<h2 class="product-name"><a href="{{ url('product/'.$product->id) }}" title="{{ $product->name }}">{{ $product->name }}</a></h2>
                                    <!--                                    <div class="product-ratings">
                                                                            <div class="ratings-box">
                                                                                <div class="rating" style="width:60%"></div>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="product-price-box">
                                                                        	@if($product->discount_percentage != 0)
                                                                        	<span class="old-price">৳{{$product->price}}</span>
                                                                        	@elseif($product->discount_amount != 0)
                                                                        	<span class="old-price">৳{{$product->price}}</span>
                                                                        	@elseif($category->discount_percentage != 0)
                                                                        	<span class="old-price">৳{{$product->price}}</span>
                                                                        	@elseif($brandDiscount != 0)
                                                                        	<span class="old-price">৳{{$product->price}}</span>
                                                                        	@endif
                                                                        	<span class="product-price">৳<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $category->discount_percentage, $brandDiscount); ?></span>
                                                                        </div>

                                                                        <div class="product-actions">
                                                                        	<a href="#" class="addtocart related-btn-cart" title="Add to Bag" rel_id="{{ $product->id }}" price="<?php echo cat_product_price($product->price, $product->discount_percentage, $product->discount_amount, $category->discount_percentage, $brandDiscount); ?>" rel_token="{{ csrf_token() }}" rel_qty="{{ $product->min_quantity }}">
                                                                        		<i class="fa fa-shopping-cart"></i>
                                                                        		<span>Add to Bag</span>
                                                                        	</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                        
                                                    </div>
                                                    <div class="toolbar-bottom">
                                                    	<div class="toolbar">
                                                    		<div class="sorter">
                                                    			<ul class="pagination">
                                                    				<li class="pagination active">{{ $catProduct->links() }}</li>
                                                    			</ul>

                                                    			<div class="limiter">
                                                    				<label>Show:</label>
                                                    				<?php
                                                    				$limit = [
                                                    					12 => 12,
                                                    					24 => 24,
                                                    					36 => 36,
                                                    				];
                                                    				?>

                                                    				{{ Form::select('limit', $limit, $catProduct->perPage(), ['id'=>'billing:region_id', 'class' => 'validate-select']) }}
                                                    			</div>
                                                    		</div>
                                                    	</div>
                                                    </div>
                                                </div>

                                                <aside class="col-md-3 col-md-pull-9 sidebar shop-sidebar">
                                                	<div class="panel-group">
                                                		<div class="panel panel-default">
                                                			<div class="panel-heading">
                                                				<h4 class="panel-title">
                                                					<a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-category">
                                                						Categories
                                                					</a>
                                                				</h4>
                                                			</div>
                                                			<div id="panel-filter-category" class="accordion-body collapse in">
                                                				<div class="panel-body">
                                                					<ul>
                                                						@if(count($subCategory) > 0)
                                                						@foreach($subCategory as $val)
                                                						<li><a href="{{ url('category/' . $val->id) }}">{{ $val->name }}</a></li>
                                                						@endforeach
                                                						@else
                                                						<p>No Child Category</p>
                                                						@endif
                                                					</ul>
                                                				</div>
                                                			</div>
                                                		</div>
                    <!--                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-price">
                                                        Price
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="panel-filter-price" class="accordion-body collapse in">
                                                <div class="panel-body">
                                                    <div class="filter-price">
                                                        <div id="price-slider"></div>
                                                        <div class="filter-price-details">
                                                            <span>from</span>
                                                            <input type="text" id="price-range-low" class="form-control" placeholder="Min">
                                                            <span>to</span>
                                                            <input type="text" id="price-range-high" class="form-control" placeholder="Max">
                                                            <a href="#" class="btn btn-primary">FILTER</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </aside>
                                </div>
                            </div>

                        </div>

                        

                        @endsection