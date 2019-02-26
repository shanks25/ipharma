@if($products->count() == 0)
<div class="category-products">
    <p>No Product found!</p>
</div>
@else
<div class="category-products">
    <div class="toolbar">
        <p class="amount"> Items 1 to {{ $products->perPage() }} of {{ $products->total() }} total </p>
        <div class="limiter">
            <label>Show</label>
            <?php
            $limit = [
                9 => 9,
                18 => 18,
                27 => 27,
                36 => 36,
            ];
            ?>

            {{ Form::select('limit', $limit, $products->perPage(), ['id'=>'billing:region_id', 'class' => 'validate-select']) }}
<!--                        <select name="limit">
                <option value="10"> 10 </option>
                <option value="20"> 20 </option>
                <option value="30"> 30 </option>
            </select>-->
            per page </div>
        <p class="view-mode">
            <label>View as:</label>
            <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="?mode=list" title="List" class="list">List</a>&nbsp; </p>

        <!--<div class="clear"></div>-->

        <div class="pages"> <strong>Page:</strong>
            <ol>
                <li class="pagination active">{{ $products->links() }}</li>
            </ol>
        </div>
        <div class="clear"></div>
    </div>
    <div class="row rows-count3">

        @foreach($products as $product)
        <div class="product-grid  span3 last">
            <div class="imgContainer"> 
                <a href="{{ url('product/'.$product->id) }}" title="" class="product-image">

                    <div class="test img-wrapper hideableHover">
                        @if($product->media->isNotEmpty())
                        @foreach($product->media->take(2) as $i=>$media)

                        @if($i == 0)
                        <img width="290" height="438" src="{{ Theme::publicImg('tb_' . $media->src) }}"/>
                        @else
                        <img width="290" height="438" class="back-image" src="{{ Theme::publicImg('tb_' . $media->src) }}"/>
                        @endif

                        @endforeach
                        @endif
                    </div>

                </a>
                <div style="display:none" class="pb_caption">
                    <button type="button" title="Shop Now" class="pb_btn" onclick="showAjaxProductquickview('{{ $product->id }}')">
                        <span><span>Shop Now</span></span></button>
                </div>
            </div>








            <a href="{{ url('quick-view/'. $product->id) }}" style="display:none;" class='qvfancybox' id='qvfancybox{{ $product->id }}'>Shop Now</a>

            <div class="product-information">
                <h2 class="product-name">
                    <a href="{{ url('product/'.$product->id) }}" title="">{{ $product->name or '' }}</a>
                </h2>

                <div class="price-box">
                    @if($product->discount)
                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">{{number_format($product->price)}} BDT </span> </p>
                    @endif
                    <p class="special-price"> <span class="price-label">Special Price:</span> <span class="price">{{number_format($product->price - (($product->price * $product->discount)/100))}} BDT </span> </p>
                </div>

                <div class="actions btn-cont">
                    <button type="button" title="" class="button btn-cart" onclick="#"><span><span>Add to Bag</span></span></button>
                </div>
                <ul class="add-to-links hidden">
                    <li><a href="#" class="link-wishlist">Add to Wishlist</a></li>
                    <li><span class="separator">|</span> <a href="#" class="link-compare">Add to Compare</a></li>
                </ul>
            </div>
        </div>
        @endforeach


    </div>

    <div class="toolbar-bottom">
        <div class="toolbar">
            <p class="amount"> Items 1 to {{ $products->perPage() }} of {{ $products->total() }} total </p>
            <div class="limiter">
                <label>Show</label>
                <?php
                $limit = [
                    9 => 9,
                    18 => 18,
                    27 => 27,
                    36 => 36,
                ];
                ?>

                {{ Form::select('limit', $limit, $products->perPage(), ['id'=>'billing:region_id', 'class' => 'validate-select']) }}
<!--                        <select name="limit">
                    <option value="10"> 10 </option>
                    <option value="20"> 20 </option>
                    <option value="30"> 30 </option>
                </select>-->
                per page </div>
            <p class="view-mode">
                <label>View as:</label>
                <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="#" title="List" class="list">List</a>&nbsp; </p>

            <div class="pages"> <strong>Page:</strong>
                <ol>
                    <li class="pagination active">{{ $products->links() }}</li>
                </ol>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@endif
<script>
    jQuery(".imgContainer").on({
    mouseenter: function () {
    console.log('sdkjhdsf');
    jQuery(this).children('.product-image').children('.img-wrapper').children('.back-image ').fadeIn();
    },
            mouseleave: function () {
            jQuery(this).children('.product-image').children('.img-wrapper').children('.back-image ').fadeOut();
            }
    });
</script>