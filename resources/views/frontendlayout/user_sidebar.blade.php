<style>
    .active{
        font-weight: bold;
    }
</style>
<div class="col-md-3 col-md-pull-9">
    <aside class="sidebar">

        <h4>My Account</h4>
        <ul class="nav nav-list">
            <li {{ (Request::is('customer/account/index') ? 'class=active' : '') }}><a href="{{ url('customer/account/index') }}">Account Dashboard</a></li>
            <li {{ (Request::is('customer/account/edit') ? 'class=active' : '') }}><a href="{{ url('customer/account/edit') }}">Account Information</a></li>
            <li {{ (Request::is('customer/address/new') ? 'class=active' : '') }}><a href="{{ url('customer/address/new') }}">Delivery Address</a></li>
            <li {{ (Request::is('sales/order/history') ? 'class=active' : '') }}><a href="{{ url('sales/order/history') }}">My Orders</a></li>
        </ul>

    </aside>
</div>