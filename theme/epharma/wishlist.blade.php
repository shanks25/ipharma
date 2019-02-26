@include('Theme::header')

<style>
    .buttons-set a{
        display: inline-block;
        padding: 0 12px 0;
        border: none;
        background: #000;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        white-space: nowrap;
        font-size: 12px;
        line-height: 28px;
        cursor: pointer;
        -webkit-transition-timing-function: ease;
        -webkit-transition-duration: .2s;
        -webkit-transition-property: background, border-color;
    }
</style>

<div class="container main-container col2-left-layout">

    <div class="row main">

        @include('Theme::user_sidebar')

        <div class="span12 col-main with-sidebar">

            <div class="my-account"><div class="page-title">
                    <h1>My Wishlist</h1>
                </div>
                
                <table class="table">         
                    @forelse($wishlist as $product)
                        <tr>
                            <td class="product-thumbnail" width="30%">
                                <a href="{{ url('product/'.$product->product->id) }}" title="" class="product-image">
                                    <img src="{{ asset('/storage/'.$product->product->media[0]->src) }}" alt="" height="125" width="85">
                                </a>
                            </td>

                            <td class="td-product-name" width="30%">
                                <h2 class="product-name">
                                    <a href="{{ url('product/'.$product->product->id) }}">
                                        {{ $product->product->name }}
                                    </a>
                                </h2>
                            </td>

                            <td class="product-unit-price a-center" width="30%">
                                <span class="cart-price">
                                    <span class="price">{{ $product->product->price }} BDT</span>
                                </span>
                            </td>

                            <td class="wishlist-product-delete a-center" width="10%">
                                <a title="Remove item" class="btn-remove btn-remove2" data-id="{{ $product->product->id }}">Remove item</a>
                            </td>
                        </tr>
                    @empty
                        <p>You have no items in your wishlist.</p>
                    @endforelse

                </table>


                <div class="buttons-set">
                    <p class="back-link"><a href="{{ url('customer/account/index') }}"><small>&laquo; </small>Back</a></p>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    (function ($) {
    $(document).ready(function () {
        $('.wishlist-product-delete a').on('click', function (e) {
            e.defaultPrevented;
            var token = '{{ csrf_token() }}',
            rowId = $(this).data('id'),
            parent = $(this).parents('tr');
            $.ajax({
                url: '/remove-from-wishlist',
                type: 'post',
                data: {_token: token, rowId: rowId},
                success: function (res) {
                    parent.remove();
                }
            });
        })
    });
    })(jQuery);
</script>

@include('Theme::footer')
