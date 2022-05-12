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
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--blog body area start-->
    <div class="blog_bg_area blog_details_bg">
        <div class="container">
            <div class="blog_page_section">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <!--blog grid area start-->
                        <div class="blog_wrapper blog_details">
                            <article class="single_blog">
                                <figure>
                                   <div class="post_header">
                                       <h3 class="post_title">{{ $post->title }}</h3>
                                        <div class="blog_meta">                                        
                                        <span class="author">Posted by : <a href="#"> {{ $post->user->name }}</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#"> {{ $post->created_at }}</a></span>
                                                <span class="meta_date">Update :  <a href="#"> {{ $post->updated_at }}</a></span>
                                        </div>
                                    </div>
                                    <div class="blog_thumb">
                                       <img src="assets/img/blog/blog-big1.jpg" alt="">
                                   </div>
                                   <figcaption class="blog_content">
                                        <div class="post_content">
                                            <p>{{ $post->content }}</p>
                                        </div>
                                        <div class="entry_content">
                                            <div class="post_meta">
                                                <span>Tags: </span>
                                                <span><a href="#">, fashion</a></span>
                                                <span><a href="#">, t-shirt</a></span>
                                                <span><a href="#">, white</a></span>
                                            </div>

                                            <div class="social_sharing">
                                                <p>share this post:</p>
                                                <ul>
                                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                   </figcaption>
                                </figure>
                            </article>
                           <div class="related_posts">
                               <h3>Related posts</h3>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <article class="single_related">
                                            <figure>
                                                <div class="related_thumb">
                                                    <img src="assets/img/blog/blog7.jpg" alt="">
                                                </div>
                                                <figcaption class="related_content">
                                                   <h4><a href="#">Post with Gallery</a></h4>
                                                   <div class="blog_meta">                                        
                                                        <span class="author">By : <a href="#">admin</a> / </span>
                                                        <span class="meta_date"> July 05, 2022	</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <article class="single_related">
                                            <figure>
                                                <div class="related_thumb">
                                                    <img src="assets/img/blog/blog8.jpg" alt="">
                                                </div>
                                                <figcaption class="related_content">
                                                   <h4><a href="#">Post with Audio</a></h4>
                                                   <div class="blog_meta">                                        
                                                        <span class="author">By : <a href="#">admin</a> / </span>
                                                        <span class="meta_date"> July 05, 2022	</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <article class="single_related">
                                            <figure>
                                                <div class="related_thumb">
                                                    <img src="assets/img/blog/blog9.jpg" alt="">
                                                </div>
                                                <figcaption class="related_content">
                                                   <h4><a href="#">Maecenas ultricies</a></h4>
                                                   <div class="blog_meta">                                        
                                                        <span class="author">By : <a href="#">admin</a> / </span>
                                                        <span class="meta_date"> July 05, 2022	</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                           </div> 
                           
                            <div class="comments_box">
                                <h3>3 Comments	</h3>
                                <!-- <div class="comment_list">
                                    <div class="comment_thumb">
                                        <img src="assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Admin</a></h5>
                                            <span>July 05, 2022 at 1:38 am</span> 
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div> -->
                                    <div class="card">
                                    <div class="card-body">
                                        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                                        <hr />
                                        <h4>Add comment</h4>
                                        <form method="post" action="{{ route('comment.add') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="comment_body" class="form-control" />
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                            </div>
                                            <div class="form-group">
                                                @if(auth()->check())
                                                <input type="submit" class="btn btn-warning" value="Add Comment" />
                                                @endif 
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                <!-- <div class="comment_list">
                                    <div class="comment_thumb">
                                        <img src="assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Admin</a></h5>
                                            <span>July 05, 2022 at 1:38 am</span> 
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment_list list_two">
                                    <div class="comment_thumb">
                                        <img src="assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Demo</a></h5>
                                            <span>July 05, 2022 at 1:38 am</span> 
                                        </div>
                                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_list">
                                    <div class="comment_thumb">
                                        <img src="assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">Admin</a></h5>
                                            <span>July 05, 2022 at 1:38 am</span> 
                                        </div>
                                        <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                                        <div class="comment_reply">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="comments_form">
                                <h3>Leave a Reply </h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Comment </label>
                                            <textarea name="comment" id="review_comment" ></textarea>
                                        </div> 
                                        <div class="col-lg-4 col-md-4">
                                            <label for="author">Name</label>
                                            <input id="author"  type="text">

                                        </div> 
                                        <div class="col-lg-4 col-md-4">
                                            <label for="email">Email </label>
                                            <input id="email"  type="text">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="website">Website </label>
                                            <input id="website"  type="text">
                                        </div>   
                                    </div>
                                    <button class="button" type="submit">Post Comment</button>
                                 </form>    
                            </div> -->

                        </div>
                        <!--blog grid area start-->
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
    
    <!--blog section area end-->

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
