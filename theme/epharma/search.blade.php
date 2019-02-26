@include('Theme::header')
<div class="breadcrumbs-wrapper">
    <div class="container">
        <div class="row breadcrumbs-wrapper_old">
            <div class="span12 breadcrumbs">
                <ul>
                    <li class="home"> <a href="{{URL::to('/')}}" title="Go to Home Page">Home</a> <span>/ </span> </li>
                    <li class="category22"> <strong>Search-product</strong> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container main-container col2-left-layout">
    <div class="row main">
        <div class="span3 col-left sidebar">
            
        </div>
        <div class="span12 col-main with-sidebar">
            @if($products->count() == 0)
            <div class="category-products" style="height: 100%">
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

                        {{ Form::select('limit', $limit, $products->perPage(), ['class' => 'validate-select']) }}
<!--                        <select name="limit">
                            <option value="10"> 10 </option>
                            <option value="20"> 20 </option>
                            <option value="30"> 30 </option>
                        </select>-->
                        per page </div>
                    <p class="view-mode">
                        <label>View as:</label>
                        <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="?mode=list" title="List" class="list">List</a>&nbsp; </p>
                    <div class="sort-by">
                        <label>Sort By</label>
                        <select onchange="setLocation(this.value)">
                            <option value=""> Position </option>
                            <option value="" selected="selected"> Product Position </option>
                            <option value=""> Name </option>
                            <option value=""> Price </option>
                            <option value=""> Cambric Sale Jan16 </option>
                            <option value=""> Kids Sale </option>
                            <option value=""> Mothers Day Sale </option>
                            <option value=""> 14 August 2015 Sale </option>
                            <option value=""> Other Than Kids </option>
                            <option value=""> Normal Sale </option>
                            <option value=""> Winter Clearance Sale </option>
                            <option value=""> Mothers Day 2016 </option>
                        </select>
                        <a href="?dir=desc&amp;order=custom_product_position" title=""><img src="assets/img/i_asc_arrow.gif" alt="Set Descending Direction" class="v-middle" /></a> </div>

                    <!--<div class="clear"></div>-->

                    <div class="pages"> <strong>Page:</strong>
                        <ol>
                            <li class="pagination active">{{ $products->links() }}</li>
                        </ol>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="products_grid row rows-count3">

                    @foreach($products as $product)
                    <div class="product-grid  span3 last">
                        <div class="imgContainer"> 
                            <a href="{{ url('product/'.$product->id) }}" title="" class="product-image">

                                <div class="test img-wrapper hideableHover">
                                    @if($product->media->isNotEmpty())
                                    @foreach($product->media->take(2) as $i=>$media)

                                    @if($i == 0)
                                    <img width="290" height="438" src="{{ Theme::publicImg($media->src) }}"/>
                                    @else
                                    <img width="290" height="438" class="back-image" src="{{ Theme::publicImg($media->src) }}"/>
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
                                <span class="regular-price" id="product-price-29232">
                                    <span class="price">BDT {{ $product->price or '' }}</span> </span> 
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
                <script type="text/javascript">decorateGeneric($$('ul.products-grid'), ['odd', 'even', 'first', 'last'])</script> 
                <script type="text/javascript">
                    jQuery.noConflict();
                    //Hover effect on image
                    jQuery('.product-image').hover(
                            function () {
                                jQuery(this).next('.pb_caption').css('display', 'block');
                                //jQuery(this).find('button').animate({top:"-85px"}, 300);			
                            }, function () {
                        /*jQuery(this).find('img').css('opacity','1.0');*/                                                        jQuery(this).next('.pb_caption').css('display', 'none');
                        //jQuery(this).find('.pb_caption').animate({top:"85px"}, 100);
                    }
                    );
                    jQuery('.pb_caption').hover(
                            function () {
                                /*jQuery(this).prev('.product-image').css('opacity','.35');*/
                                jQuery(this).css('display', 'block');
                                //jQuery(this).find('button').animate({top:"-85px"}, 300);			
                            }, function () {
                        /*jQuery(this).prev('.product-image').css('opacity','1');	*/
                        jQuery(this).css('display', 'none');
                    }

                    );
                    jQuery('.qvfancybox').fancybox({
                        hideOnContentClick: true,
                        width: 890,

                        autoDimensions: true,
                        type: 'iframe',
                        showTitle: false,
                        scrolling: 'no',
                        onComplete: function () { //Resize the iframe to correct size
                            jQuery('#fancybox-frame').load(function () { // wait for frame to load and then gets it's height
                                jQuery('#fancybox-content').height(jQuery(this).contents().find('body').height() + 30);
                                jQuery.fancybox.resize();
                            });
                        }
                    });

                    jQuery('.fancybox').fancybox({
                        hideOnContentClick: true,
                        width: 582,
                        autoDimensions: true,
                        type: 'iframe',
                        showTitle: false,
                        scrolling: 'no',
                        onComplete: function () { //Resize the iframe to correct size
                            jQuery('#fancybox-frame').load(function () { // wait for frame to load and then gets it's height
                                jQuery('#fancybox-content').height(jQuery(this).contents().find('body').height() + 30);
                                jQuery.fancybox.resize();
                            });
                        }
                    });

                </script>
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

                        {{ Form::select('limit', $limit, $products->perPage(), ['class' => 'validate-select']) }}
<!--                        <select name="limit">
                            <option value="10"> 10 </option>
                            <option value="20"> 20 </option>
                            <option value="30"> 30 </option>
                        </select>-->
                        per page </div>
                        <p class="view-mode">
                            <label>View as:</label>
                            <strong title="Grid" class="grid">Grid</strong>&nbsp; <a href="#" title="List" class="list">List</a>&nbsp; </p>
                        <div class="sort-by">
                            <label>Sort By</label>
                            <select onchange="setLocation(this.value)">
                                <option value="#"> Position </option>
                                <option value="#" selected="selected"> Product Position </option>
                                <option value="#"> Name </option>
                                <option value="#"> Price </option>
                                <option value="#"> Cambric Sale Jan16 </option>
                                <option value="#"> Kids Sale </option>
                                <option value="#"> Mothers Day Sale </option>
                                <option value="#"> 14 August 2015 Sale </option>
                                <option value="#"> Other Than Kids </option>
                                <option value="#"> Normal Sale </option>
                                <option value="#"> Winter Clearance Sale </option>
                                <option value="#"> Mothers Day 2016 </option>
                            </select>
                            <a href="#" title=""><img src="assets/img/i_asc_arrow.gif" class="v-middle" /></a> </div>
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
                        jQuery(this).children('.product-image').children('.img-wrapper').children('.back-image ').fadeIn();
                    },
                    mouseleave: function () {
                        jQuery(this).children('.product-image').children('.img-wrapper').children('.back-image ').fadeOut();
                    }
                });
            </script> </div>
    </div>
</div>
<script>

    (function($) {
        $.QueryString = (function(a) {
            if (a == "") return {};
            var b = {};
            for (var i = 0; i < a.length; ++i)
            {
                var p=a[i].split('=', 2);
                if (p.length != 2) continue;
                b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
            }
            return b;
        })(window.location.search.substr(1).split('&'))
    })(jQuery);


    function objectToUrlString(obj) {
        return Object.keys(obj).map(function(key){ 
          return encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]); 
        }).join('&');
    }


    (function ($) {
        $('select[name=limit]').on('change', function (e) {
            e.preventDefault();
            
            $.QueryString['limit'] = $(this).val();
            var queryUrl = objectToUrlString($.QueryString);

            var url = "/product-search?" + queryUrl;
            window.location = url;
        });


        $('ul.pagination li a').on('click', function(e) {
            e.preventDefault();

            $.QueryString['page'] = $(this).text();
            var queryUrl = objectToUrlString($.QueryString);

            var url = "/product-search?" + queryUrl;
            window.location = url;
        })

    })(jQuery);
</script>
@include('Theme::footer')

