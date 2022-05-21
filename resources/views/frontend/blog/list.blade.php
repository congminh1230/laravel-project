@section('css')
<style type="text/css">
    .fa {
        padding-top:10px;
    }
    .mini_cart_wrapper >a>i {
        margin-top: 14px !important;
    }
    .mini_cart_wrapper >a {
       display:flex !important;
    }
    .categori_toggle {
     margin-top: 12px;
    }
</style>
@endsection
@extends('frontend.layouts.master')
@section('content')
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <div class="blog_bg_area">
       <div class="container">
            <!--blog area start-->
            <div class="blog_page_section">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper mb-30">
                            <div class="blog_header">
                                <h1>Blog</h1>
                            </div>
                            <div class="blog_wrapper_inner">
                                @foreach($posts as $post)
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            
                                            <a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}">
                                            @if(!empty($post->image))
                                                <img style="width: 100%;"  src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}"
                                                width="100px">
                                            @endif
                                            </a>
                                        </div>
                                        <figcaption class="blog_content">
                                           <h4 class="post_title"><a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}"></a>{{$post->title}}</h4>
                                           <div class="blog_meta">                                        
                                                <span class="author">Tác Giả : <a href="#"> {{ $post->user->name }}</a> / </span>
                                                <span class="meta_date">Posted on :  <a href="#"> {{ $post->created_at }}</a></span>
                                                <span class="meta_date">Update :  <a href="#"> {{ $post->updated_at }}</a></span>
                                            </div>
                                            <div class="blog_desc">
                                                <p>{{$post->content}}</p>
                                            </div>
                                            <footer class="btn_more">
                                                   <a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}">Chi Tiết</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                @endforeach
                            </div>
                        </div>
                         <!--blog pagination area start-->
                        <div class="blog_pagination">
                            <!-- <div class="pagination">
                                <ul>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">next</a></li>
                                    <li><a href="#">>></a></li>
                                </ul>
                            </div> -->
                            {{ $posts->links() }}
                        </div>
                        <!--blog pagination area end-->
                    </div>  
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget">
                            <div class="widget_list widget_search">
                                <div class="widget_title">
                                    <h3>Search</h3>
                                </div>
                                <form method="GET" action="{{ route('frontend.blog.searchPosts')}}">
                                    <input name="title" value="{{ request()->get('title')}}" placeholder="Search..." type="text">
                                    <button type="submit">search</button>
                                </form>
                            </div>
                            <div class="widget_list widget_post">
                                <div class="widget_title">
                                    <h3>Bài Viết Nổi Bật</h3>
                                </div>
                                @foreach($posts as $post)
                                <div class="post_wrapper">
                                    <div class="post_thumb" style="width: 251px !important;" >
                                        <a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}"><img src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}" alt=""></a>
                                    </div>
                                    <div class="post_info">
                                        <h4>{{$post->title}}</h4><a href="{{ route('frontend.blogs.detail',['id' => $post->id])}}">{{$post->name}}</a></h4>
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
            <!--blog area end-->

           
        </div>
    </div>
    
     <!--brand area start-->
    <div class="brand_area brand_padding">
        <div class="container">
            <div class="col-12">
                <div class="brand_container owl-carousel ">
                @foreach($logos as $logo)
                    <div class="brand_list">
                        <div class="single_brand">
                           <a href="#"><img src="{{ Illuminate\Support\Facades\Storage::disk($logo->disk)->url($logo->path)}}" alt=""></a>
                        </div>
                    </div>
                    @endforeach
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
<script src="../../Jquery/prettify.js"></script>