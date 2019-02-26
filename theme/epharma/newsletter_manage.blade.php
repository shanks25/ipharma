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

            <div class="my-account">
                <div class="page-title">
                    <h1>Newsletter Subscription</h1>
                </div>
                <form action="#" method="post" id="form-validate">
                    <div class="fieldset">
                        <input name="form_key" type="hidden" value="x9l0C5T0BtUHYvO5" />
                        <h2 class="legend">Newsletter Subscription</h2>
                        <ul class="form-list">
                            <li class="control"><input type="checkbox" name="is_subscribed" id="subscription" value="1" title="General Subscription" class="checkbox" /><label for="subscription">General Subscription</label></li>
                        </ul>
                    </div>
                    <div class="buttons-set">
                        <p class="back-link"><a href="{{ url('customer/account/index') }}"><small>&laquo; </small>Back</a></p>
                        <button type="submit" title="Save" class="button"><span><span>Save</span></span></button>
                    </div>
                </form>
                <script type="text/javascript">
                //<![CDATA[
                    var dataForm = new VarienForm('form-validate', true);
                //]]>
                </script>
            </div>
        </div>
    </div>

</div>

@include('Theme::footer')
