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

<div class="container main-container col1-layout">
    <div class="row main">
        <div class="span7 col-main">
            <div class="std">
                <div class="page-title">
                    <h1>Whoops, our bad...</h1>
                </div>
                <dl>
                    <dt>The page you requested was not found, and we have a fine guess why.</dt>
                    <dd>
                        <ul class="disc">
                            <li>If you typed the URL directly, please make sure the spelling is correct.</li>
                            <li>If you clicked on a link to get here, the link is outdated.</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>What can you do?</dt>
                    <dd>Have no fear, help is near! There are many ways you can get back on track with Ipharma.</dd>
                    <dd>
                        <ul class="disc">
                            <li><a onclick="history.go(-1); return false;" href="{{ url('/') }}">Home</a> to the previous page.</li>
                            <li>Use the search bar at the top of the page to search for your products.</li>
                            <li>Follow these links to get you back on track!<br><a href="{{ url('/') }}">Ipharma Homepage</a> <span class="separator">|</span> <a href="{{ url('login') }}">My Account</a></li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="span5 col-right sidebar">
            <div class="block block-list block-compare">
                <div class="block-title">
                    <strong><span>Compare Products</span></strong>
                </div>
                <div class="block-content">
                    <p class="empty">You have no items to compare.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Theme::footer')
