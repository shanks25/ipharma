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
                    <h1>My Product Reviews</h1>
                </div>
                <p>You have submitted no reviews.</p>
                <div class="buttons-set">
                    <p class="back-link"><a href="{{ url('customer/account/index') }}"><small>&laquo; </small>Back</a></p>
                </div>
            </div>
        </div>
    </div>

</div>

@include('Theme::footer')
