@extends('frontend.layouts.master')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li>Chi Tiết Bài Viết</li>
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
                                        <span class="author">Tác Giả : <a href="#"> {{ $post->user->name }}</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#"> {{ $post->created_at }}</a></span>
                                                <span class="meta_date">Update :  <a href="#"> {{ $post->updated_at }}</a></span>
                                        </div>
                                    </div>
                                    <div class="blog_thumb">
                                       <img  style="width: 100%;" src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}" alt="">
                                   </div>
                                   <figcaption class="blog_content">
                                        <div class="post_content">
                                            <p>{{ $post->content }}</p>
                                        </div>
                                        <div class="entry_content">
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
                          
                           
                            <div class="comments_box">
                                <h3>Bình Luận</h3>
                                    <div class="card">
                                    <div class="card-body">
                                        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                                        <hr />
                                        <h4>Thêm Bình Luận</h4>
                                        <form method="post" action="{{ route('comment.add') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="comment_body" class="form-control" />
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                            </div>
                                            <div class="form-group">
                                                @if(auth()->check())
                                                <input style="background-color: black;color: white;margin-top: 10px;" type="submit" class="btn btn-warning" value="Thêm" />
                                                @endif 
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                            </div>
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
                            <div class="widget_list widget_post">
                                <div class="widget_title">
                                    <h3>Bài Viết Nổi Bật</h3>
                                </div>
                                @foreach($posts as $post)
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}"><img src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4><a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}">{{$post->name}}</a></h4>
                                        <span>{{$post->created_at}}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="widget_list widget_categories">
                                <div class="widget_title">
                                    <h3>Danh Mục</h3>
                                </div>
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
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
