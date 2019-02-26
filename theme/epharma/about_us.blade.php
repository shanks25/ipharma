@include('Theme::header')

<style>
    ul.history li .featured-box{
        margin-left: 0px;
    }
    ul.history li p{
        font-size: 14px;
        line-height: 25px;
        margin-left: 0;
    }
</style>

<div role="main" class="main">
    @include('Theme::ajax_search')
    <div class="container about-container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="word-rotator-title text-center">
                    The Digital Way to <strong>
                        <span class="word-rotate" data-plugin-options="{'delay': 2000}">
                            <span class="word-rotate-items">
                                <span>PROGRESS</span>
                                <span>ADVANCE</span>
                                <span>SUCCESS</span>
                            </span>
                        </span>
                    </strong>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr class="medium">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="h1 heading-primary mt-xl">ABOUT <strong>US</strong></h3>

                <ul class="history">
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p><strong>IPharma24.com</strong> – Your Online Healthcare Solution</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>Bangladesh based online healthcare solution.</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>We are a ONE-STOP ONLINE Healthcare Solutions where we not only provide a wide range of medicines, we also offer a wide choice of healthcare products including wellness products, vitamins, diet/fitness supplements, herbal products, pain relievers, diabetic care kits, baby/mother care products, beauty care products and surgical supplies.</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>Considering prevailing busy city life where traffic, lack of parking, non-availability of medicines, we want to ensure Convenience to our valued customers. With easy access to reliable drug information, our customers will get to know all about medicine both locally produced and imported from abroad. Being a client of Ipharma24.com, customer will get regular refill reminders, alternative medicine options staying at home to Make Your Life Easier.</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>Our Aim is to provide you with best & convenient healthcare, convenient and safe and secure online shopping experience. We endeavor to provide products at a very competitive price coupled with highest standards of delivery to customers.</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>We have our own drug license(license no: DC-1785) by Bangladesh Drug Authority, under the Bengal drugs rules, 1946 and we are active member of e-commerce association of Bangladesh(e-Cab, member no: 370).  We have registered & reliable pharmacy stores and shops nation-wide so you can order from us with confidence.</p>
                            </div>
                        </div>
                    </li>
                    <li class="appear-animation" data-appear-animation="fadeInUp">
                        <div class="featured-box">
                            <div class="box-content">
                                <p>IPharma24.com is a brand of Limitless Solutions Limited.</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

    </div>

</div>


@include('Theme::footer')

</body>
</html>
