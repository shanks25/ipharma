@if(Cart::content()->count())

	<div class="overlay" style="display: none; position: absolute; left: 0; top: 0; width: 100%; height: 100%; opacity: .5; background-color: #fff;">
		<div class="loading" style="position: absolute; left: 50%; top: 50%; width: 20px; height: 20px; background-image: url(http://www.khaadionline.com/skin/frontend/idstore/default/images/loading.gif); background-position: center center;">&nbsp;</div>
	</div>

	<p class="recently-added"><span>Recently added item(s)</span> </p><div style="clear: both;"></div><p></p>

	<ol id="cart-sidebar" class="products-small">
			@foreach(Cart::content() as  $product)

			<li class="item">
				<a href="http://www.khaadionline.com/rw/embroidered-kurta-30412.html?___SID=U" title="Asymmetrical Hemline Embroidered Kurta" class="product-image">
					<img src="{{ Theme::publicImg($product->options->img) }}" width="75" height="100" alt="Asymmetrical Hemline Embroidered Kurta"></a>

					<div class="product-details">
					<button class="cart-remove" data-row="{{ $product->rowId }}"><span>remove</span></button>
					<a href="http://www.khaadionline.com/rw/checkout/cart/?___SID=U" title="Edit item" class="btn-edit">Edit item</a>
					<p class="product-name"><a href="{{ url('product/'.$product->id) }}"> {{$product->name or ''}} </a></p>

						<div class="item-info">
							<strong>{{ $product->qty }} <button>Hide</button></strong>
							<span class="price">BDT {{ $product->price }}</span>
						</div>

						<div class="truncated">
							<div class="truncated_full_value">
								<dl class="item-options">
									<dt>Size</dt>
									<dd>10</dd>
								</dl>
							</div>
							<a href="#" onclick="return false;" class="details">Details</a>
						</div>
					</div>
				</li>
				@endforeach
			</ol>
			<div class="summary">
				Total:
				<span class="price">BDT {{ Cart::total() }}</span>
			</div>
			<button type="button" title="View Cart" style="float:left" class="button big btn-checkout" onclick="window.location='http://www.khaadionline.com/rw/checkout/cart/?___SID=U';"><span><span>View Cart</span></span></button>
			<button type="button" title="Checkout" class="button big btn-checkout" onclick="window.location='http://www.khaadionline.com/rw/onepagecheckout/?___SID=U';"><span><span>Checkout</span></span></button>
@else
	<p class="empty">You have no items in your shopping cart.</p>
@endif
