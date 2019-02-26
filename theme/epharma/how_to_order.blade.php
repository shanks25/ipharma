@include('Theme::header')
<style>
    p{
        font-family: Open sans;
        font-size: 14px;
        font-weight: 400;
    }
</style>

<div role="main" class="main">
    @include('Theme::ajax_search')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-content" style="padding: 20px 0 40px 0;">
                    <blockquote><p><strong>Step-1 Select Product: </strong></p></blockquote>
                    <p>Search what you are looking for in the search box.</p>
                    <p>Also you can request for any product by clicking ‘Request Product’ link in top right header.</p>
                    <p>Or you can upload your prescription by clicking ‘Upload Prescription’ Link in top right corner.</p>
                    <hr>
                    <blockquote><p><strong>Step-2 Place Order(for searched items):</strong></p></blockquote>
                    <p>After you’ve added all the items in the bag, Input your delivery information and place your order.</p>
                    <hr>
                    <blockquote><p><strong>Step-3 Order Confirmation:</strong></p></blockquote>
                    <p>Our representative will contact you to confirm your order details.</p>
                    <hr>
                    <blockquote><p><strong>Step-4 Receive your order and make the payment:</strong></p></blockquote>
                    <p>Receive your order from our delivery representative and make the payment.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Theme::footer')

</body>
</html>
