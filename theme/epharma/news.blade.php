@include('Theme::header')
<style>
    article .post-video{
        padding-bottom: 0;
    }
    article.post-large{
        margin-left: 0;
    }
    .post-content{
        margin-top: 15px;
    }
    article.post-large img{
        margin: 0 auto;
        display: block;
    }
</style>

<div role="main" class="main">
    @include('Theme::ajax_search')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="blog-posts">
                    <article class="post post-large">
                        <a href="http://epharma.com.bd/wp-content/uploads/2017/02/women_health_fb_boost_150217.png">
                            <img class="aligncenter size-large wp-image-25374" src="http://epharma.com.bd/wp-content/uploads/2017/02/women_health_fb_boost_150217-1024x536.png" alt="">
                        </a>

                        <div class="post-content">

                            <h2><strong>Women Healthcare Awareness Campaign</strong></h2>
                            <p>Our campaign going on. &nbsp;And its true, some of the issues of women’s hygiene products for them are still taboo. We do our best to make life of girls and women more comfortable. Today’s campaign at Dhaka University Campus.</p>

                            <a href="demo-shop-4-blog-post.html" class="btn btn-link">Read more</a>

                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Feb 16, 2016</span>
                                <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                            </div>

                        </div>
                    </article>
                    <article class="post post-large">
                        <a href="http://epharma.com.bd/wp-content/uploads/2016/05/women_health_fb_boost_130217-1024x536.png">
                            <img src="http://epharma.com.bd/wp-content/uploads/2016/05/women_health_fb_boost_130217-1024x536.png" alt="">
                        </a>

                        <div class="post-content">

                            <h2><strong>Women Healthcare Awareness Campaign</strong></h2>
                            <p>More and more girls in Bangladesh continue their studies in high school. &nbsp;At the same time, some of the issues of women’s hygiene products for them are still taboo. We do our best to make life of girls and women more comfortable. Today’s campaign at Holy Cross Girls College.</p>

                            <a href="demo-shop-4-blog-post.html" class="btn btn-link">Read more</a>

                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i> Feb 14, 2016</span>
                                <span><i class="fa fa-user"></i> By <a href="#">Admin</a> </span>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>

    </div>


    @include('Theme::footer')

</body>
</html>
