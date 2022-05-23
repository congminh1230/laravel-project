@extends('frontend.layouts.master')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">Trang Chủ</a></li>
                            <li>Chi Tiết Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <div class="product_page_bg">
        <div class="container">
            <!--product details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1">
                                    <img id="lol"  src="@if(!empty($product->image))
                                      {{$product->image->path}}
                                      @endif">
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    @foreach($images as $image)
                                        <li>
                                            <a class="dataImage">
                                                <img src="{{ $image->path }}" alt="zo-th-1"/>
                                            </a>

                                        </li>
                                    @endforeach
                                   
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                           <form action="#">

                                <h3><a href=" @if(auth()->check())
                                                                    {{ route('frontend.carts.add',[ 'id' => $product->id ]) }}
                                                            @else
                                                                    {{ route('auth.login') }}
                                                            @endif">{{$product->name}}</a></h3>
                                                            
                               <div class="product_rating">
                                  <ul>
                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                       <li class="review"><a href="#"></a></li>
                                   </ul>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{number_format($product->price_origin,0,'.',',')}}vnd</span>
                                </div>
                                <!-- <div class="product_desc">
                                    <p>eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in </p>
                                </div> -->
                                
                                <div class="product_variant quantity">
                                    <label>quantity</label>
                                    <input min="1" max="100" value="1" type="number">
                                    <a class="button" href="{{ route('frontend.carts.add',[ 'id' => $product->id ]) }}"  >Thêm Vào Giỏ Hàng</a>  

                                </div>
                                <div class=" product_d_action">
                                   <ul>
                                       <li><a href="#" title="Add to wishlist">+ Thêm Vào Danh Sách Yêu Thích</a></li>
                                   </ul>
                                </div>
                                <div class="product_meta">
                                    <span>Danh Mục <a href="#">{{ $product->category->name }}</a></span>
                                </div>

                            </form>
                            <div class="priduct_social">
                                <ul>
                                    <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                    <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                    <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                    <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                                </ul>      
                            </div>

                        </div>
                    </div>
                </div>   
            </div>
            <!--product details end-->

            <!--product info start-->
            <div class="product_d_info"> 
                <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">   
                                <div class="product_info_button">    
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li >
                                            <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Giới Thiệu</a>
                                        </li>
                                        <li>
                                           <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                        <div class="product_info_content">
                                            <p>{{ $product->description }}</p>
                                        </div>    
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                        <div class="reviews_wrapper">
                                            
                                            
                                        </div>     
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>   
            </div>  
            <!--product info end-->

            <!--product area start-->
            <section class="product_area related_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title title_style2">
                           <div class="title_content">
                               <h2><span>Sản phẩm liên quan</span></h2>
                            </div>                 
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="product_carousel product_details_column5 owl-carousel">
                    @foreach($products as $product) 

                       <div class="col-lg-3">
                            <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html">
                                            <img src="@if(!empty($product->image))
                                                    {{$product->image->path}}
                                                @endif" alt="">
                                            </a>
                                            <a class="secondary_img" href="product-details.html">
                                            <img src="@if(!empty($product->image))
                                                    {{$product->image->path}}
                                                @endif" alt="">
                                            </a>
                                            <div class="label_product">
                                                <span class="label_sale">{{ $product->price_sale }}%</span>
                                            </div>
                                            <div class="quick_button">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_content_inner">
                                                <p class="manufacture_product"><a href=" {{ route('frontend.product.show',[ 'product' => $product->id  ,'slug' => $product->id]) }}">{{ $product->name }}</a></p>
                                                <h4 class="product_name"><a href="product-details.html">Nunc Neque Eros</a></h4>
                                                <div class="product_rating">
                                                   <ul>
                                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                       <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                   </ul>
                                                </div>
                                                <div class="price_box"> 
                                                    <span class="old_price">{{ $product->price }}</span> 
                                                </div>
                                            </div> 
                                            <div class="action_links">
                                                 <ul>
                                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html"  title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                    <li class="compare"><a href="compare.html" title="Add to Compare"><i class="icon-rotate-cw"></i></a></li>  
                                                </ul>
                                            </div>  
                                        </div>
                                    </figure>
                            
                           
                            </article>
                       </div>
                       @endforeach
                       
                    </div> 
                </div>  
            </section>
            <!--product area end-->

            <!--product area start-->
          
            <!--product area end-->
        </div>
    </div>
    
     <!--brand area start-->
   
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
@section('js')
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script>
    // console.log('dsdsd');
    $('.dataImage >img').on('click', function() {
        // alert('jjk');
        var img = $(this).attr('src')
        // console.log(img);
        $('#lol').attr('src', img)
    })
</script>

@endsection
