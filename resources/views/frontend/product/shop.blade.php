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
                            <li>shop list</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_list widget_categories">
                            <h3>Categories</h3>
                            <ul>
                                @foreach($categories as $category)
                                  <li><a>{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget_list widget_filter">
                            <h3>Price</h3>
                            <form action="#"> 
                                <div id="slider-range"></div>   
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />   
                            </form> 
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop banner area start-->
                    <div class="shop_banner_area mb-30">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop_banner_thumb">
                                    <img src="assets/img/bg/banner23.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--shop banner area end-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button>
                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-bs-toggle="tooltip" title="3"></button>
                            <button data-role="grid_list" type="button"  class="active btn-list" data-bs-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option  value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper grid_list">
                        <div class="col-12 ">
                            @foreach($products as $product)
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('frontend.product.show',[ 'slug' => $product->id]) }}">
                                        <img src="@if(!empty($product->image))
                                                    {{$product->image->path}}
                                                @endif" alt="">
                                        </a>
                                        <a class="secondary_img" href="{{ route('frontend.product.show',[ 'slug' => $product->id]) }}"><img src="@if(!empty($product->image))
                                                    {{$product->image->path}}
                                                @endif" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">{{ $product->price_sale }}%</span>
                                        </div>
                                        <div class="quick_button">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_content_inner">
                                            <p class="manufacture_product"><a href="{{ route('frontend.product.show',[ 'slug' => $product->id]) }}">{{ $product->name }}</a></p>
                                            <h4 class="product_name"><a href="product-details.html">{{ $product->description }}</a></h4>
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
                                                <span class="old_price">{{$product->price_origin}}$</span> 
                                                <!-- <span class="current_price">$120.00</span> -->
                                            </div>
                                        </div>
                                        <div class="action_links">
                                             <ul>
                                                <li class="add_to_cart"><a href="{{ route('frontend.carts.add',[ 'id' => $product->id ]) }}" title="Add to cart">Add to cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html"  title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i class="icon-rotate-cw"></i></a></li> 
                                            </ul>
                                        </div> 
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="left_caption">
                                           <p class="manufacture_product"><a href="{{ route('frontend.product.show',[ 'slug' => $product->id]) }}">{{ $product->name }}</a></p>
                                            <!-- <h4 class="product_name"><a href="product-details.html">{{ $product->description }}</a></h4> -->
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
                                                <span class="current_price">{{number_format($product->price_origin,0,'.',',')}}</span>
                                            </div>
                                            <div class="product_desc">
                                               <p>{{ $product->description }}</p>
                                            </div>
                                        </div>
                                        <div class="right_caption">
                                            <p class="text_available">Trạng Thái: <span>{{$product->status_text}}</span></p>
                                            <div class="action_links">
                                                <ul> 
                                                    <li class="add_to_cart"><a href="{{ route('frontend.carts.add',[ 'id' => $product->id ]) }}" title="Add to cart">Add to cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="icon-heart"></i>  Add to Wishlist</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                            @endforeach
                           
                        </div>
                       
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                        {{ $products->links() }}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    
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