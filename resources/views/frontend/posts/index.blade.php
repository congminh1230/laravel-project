@extends('frontend.layouts.master')
@section('content')
  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>blog fullwidth</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--blog area start-->
    <div class="blog_bg_area">
        <div class="container">
            <div class="blog_page_section ">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper blog_fullwidth mb-30">
                            <div class="blog_header">
                                <h1>Blog</h1>
                            </div>
                            <div class="blog_wrapper_inner">
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog-big1.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Blog image post (sticky)</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris</p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog single_blog_gallery">
                                    <figure>
                                        <div class="blog_thumb blog_thumb_active owl-carousel">
                                            <div class="single_blog_thumb">
                                                <a href="#"><img src="assets/img/blog/blog-big2.jpg" alt=""></a>
                                            </div>
                                            <div class="single_blog_thumb">
                                                <a href="#"><img src="assets/img/blog/blog-big1.jpg" alt=""></a>
                                            </div>
                                            <div class="single_blog_thumb">
                                                <a href="#"><img src="assets/img/blog/blog-big3.jpg" alt=""></a>
                                            </div>
                                            <div class="single_blog_thumb">
                                                <a href="#"><img src="assets/img/blog/blog-big4.jpg" alt=""></a>
                                            </div>
                                            <div class="single_blog_thumb">
                                                <a href="#"><img src="assets/img/blog/blog-big5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Post with Gallery</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris</p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog-big3.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Post with Audio</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <div class="blog_aduio_icone">
                                                <audio controls>
                                                  <source src="https://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3?1" type="audio/mp3">
                                                </audio>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et is </p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog blog_bidio">
                                    <figure>
                                        <div class="blog_thumb">
                                            <iframe src="https://www.youtube.com/embed/2Zt8va_6HRk"  allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Post with Video</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris</p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog-big4.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Maecenas ultricies</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris</p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog-big5.jpg" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="blog-details.html">Praesent imperdiet</a></h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#">July 05, 2022</a></span>
                                            </div>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris</p>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        
                         <!--blog pagination area start-->
                        <div class="blog_pagination">
                            <div class="pagination">
                                <ul>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">next</a></li>
                                    <li><a href="#">>></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--blog pagination area end-->
                    </div>  
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget">
                            <div class="widget_list widget_search">
                                <div class="widget_title">
                                    <h3>Search</h3>
                                </div>
                                <form action="#">
                                    <input placeholder="Search..." type="text">
                                    <button type="submit">search</button>
                                </form>
                            </div>
                            <div class="widget_list comments">
                               <div class="widget_title">
                                    <h3>Recent Comments</h3>
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <span> <a href="#">demo</a> says:</span>
                                        <a href="blog-details.html">Quisque semper nunc</a>
                                    </div>
                                </div>
                                 <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <span><a href="#">admin</a> says:</span>
                                        <a href="blog-details.html">Quisque orci porta...</a>
                                    </div>
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <span><a href="#">demo</a> says:</span>
                                        <a href="blog-details.html">Quisque semper nunc</a>
                                    </div>
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <span><a href="#">admin</a> says:</span>
                                        <a href="blog-details.html">Quisque semper nunc</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget_list widget_post">
                                <div class="widget_title">
                                    <h3>Recent Posts</h3>
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog6.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4><a href="blog-details.html">Blog image post</a></h4>
                                        <span>July 05, 2022 </span>
                                    </div>
                                </div>
                                 <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog7.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4><a href="blog-details.html">Post with Gallery</a></h4>
                                        <span>July 05, 2022 </span>
                                    </div>
                                </div>
                                 <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog8.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4><a href="blog-details.html">Post with Audio</a></h4>
                                        <span>July 05, 2022 </span>
                                    </div>
                                </div>
                                 <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/blog9.jpg" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4><a href="blog-details.html">Post with Video</a></h4>
                                        <span>July 05, 2022 </span>
                                    </div>
                                </div>
                            </div>
                            <div class="widget_list widget_categories">
                                <div class="widget_title">
                                    <h3>Categories</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Audio</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Image</a></li>
                                    <li><a href="#">Other</a></li>
                                    <li><a href="#">Travel</a></li>
                                </ul>
                            </div>
                            <div class="widget_list widget_tag">
                                <div class="widget_title">
                                    <h3>Tag products</h3>
                                </div>
                                <div class="tag_widget">
                                    <ul>
                                        <li><a href="#">asian</a></li>
                                        <li><a href="#">brown</a></li>
                                        <li><a href="#">euro</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--blog area end-->

     <!--brand area start-->
    <div class="brand_area brand_padding">
        <div class="container">
            <div class="col-12">
                <div class="brand_container owl-carousel ">
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand7.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand8.jpg" alt=""></a>
                        </div>
                    </div>
                     <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="brand_list">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
    
    <!--newsletter area start-->
    <div class="newsletter_area newsletter_padding">
        <div class="container">
            <div class="newsletter_inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="newsletter_container">
                            <h3>Follow Us</h3>
                            <p>We make consolidating, marketing and tracking your social media website easy.</p>
                            <div class="footer_social">
                               <ul>
                                   <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                                   <li><a class="twitter" href="#"><i class="icon-twitter2"></i></a></li>
                                   <li><a class="rss" href="#"><i class="icon-rss"></i></a></li>
                                   <li><a class="youtube" href="#"><i class="icon-youtube"></i></a></li>
                                   <li><a class="google" href="#"><i class="icon-google"></i></a></li>
                                   <li><a class="instagram2" href="#"><i class="icon-instagram2"></i></a></li>
                               </ul>
                           </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="newsletter_container">
                            <h3>Newsletter Now</h3>
                            <p>Join 60.000+ subscribers and get a new discount coupon on every Wednesday.</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter" >
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                    <button id="mc-submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="newsletter_container col_3">
                            <h3>GET THE APP</h3>
                            <p>Mazlay App is now available on Google Play & App Store. Get it now.</p>
                            <div class="app_img">
                               <ul>
                                   <li><a href="#"><img src="assets/img/icon/icon-app.jpg" alt=""></a></li>
                                   <li><a href="#"><img src="assets/img/icon/icon1-app.jpg" alt=""></a></li>
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--newsletter area end-->
    @endsection