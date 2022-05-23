@extends('frontend.layouts.master')
@section('content')
<!--top tags area start-->
<!-- <div class="top_tags_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tags_content">
                        <ul>
                            <li><span>Top Tags:</span></li>
                            <li><a href="#">Wheels & Tires</a></li>
                            <li><a href="#">Lighting & lamp</a></li>
                            <li><a href="#">Body Parts</a></li>
                            <li><a href="#">Smart Devices</a></li>
                            <li><a href="#">Devices</a></li>
                            <li><a href="#">Repair Parts</a></li>
                            <li><a href="#">Car Engine</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--top tags area end-->

    <!--slider area start-->
    <section class="slider_section mb-80">
        <div class="slider_area slider_carousel owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider1.jpg">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content">
                                <h1>Chương Trình Sale <span></span></h1>
                                <p>GIảm đến 10%</p>  
                                <a class="button" href="{{ route('frontend.product.shop') }}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div> 
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider2.jpg">
                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content center">
                                <h1>Chương Trình Sale  <span></span></h1>
                                <p>GIảm đến 10%</p>  
                                <a class="button" href="{{ route('frontend.product.shop') }}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
                <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <div class="slider_content">
                                <h1>Chương Trình Sale <span>New car interior</span> </h1>
                                <p>GIảm đến 10%</p>  
                                <a class="button" href="{{ route('frontend.product.shop') }}">shopping now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
    <!--slider area end-->
    
  <!--banner area start-->
    <div class="banner_area mb-80">
        <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="welcome_title">
                       <h3>Chào Mừng Đến Với MAZLAY</h3>
                       <h2><span>Cửa Hàng Online</span></h2>
                       <p></p>
                   </div>
               </div>
           </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="assets/img/bg/banner1.jpg" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="assets/img/bg/banner2.jpg" alt=""></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-4 col-md-4">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="assets/img/bg/banner3.jpg" alt=""></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--Categories product area start-->
    <div class="categories_product_area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="categories_product_inner categories_column7 owl-carousel">
                        @foreach($danh_muc_san_pham as $category) 
                            <div class="single_categories_product">
                                <div class="categories_product_content" >
                                    <h4><a href="{{ route('frontend.product.searchCategory',[ 'id' => $category->id,'name' => $category->name,]) }}">{{$category->name}}</a></h4>
                                </div>
                            </div>
                        
                        @endforeach
                       
                       
            </div>
                </div>
            </div>
        </div>
    </div>
    <!--Categories product area end-->

    <!--home section bg area start-->
    <div class="home_section_bg">
        <!--product area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                           <h2><span>Những Sản Phẩm Mới Nhất Của Cửa Hàng</span> </h2>
                            <p> </p>                    
                        </div>
                        <div class="product_tab_btn">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#Sellers" role="tab" aria-controls="Sellers" aria-selected="true"> 
                                        Xe Mercedes
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#Featured" role="tab" aria-controls="Featured" aria-selected="false">
                                        Phụ Tùng Xe
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#Arrivals" role="tab" aria-controls="Arrivals" aria-selected="false">
                                       Độ Xe
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Sellers" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column5 owl-carousel">

                                        @foreach($product_best_sellers as $product) 
                                            @include('frontend.home.compoments.list_products',[
                                                'product' => $product    
                                            ])
                                        @endforeach
                                        
                            </div> 
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="Featured" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column5 owl-carousel">
                                        @foreach($product__featured as $product) 
                                            @include('frontend.home.compoments.list_products',[
                                                'product' => $product    
                                            ])
                                        @endforeach
                            </div> 
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="Arrivals" role="tabpanel">
                        <div class="row">
                            <div class="product_carousel product_column5 owl-carousel">
                                        @foreach($product_new_arrivals as $product) 
                                            @include('frontend.home.compoments.list_products',[
                                                'product' => $product    
                                            ])
                                        @endforeach
                            </div> 
                        </div> 
                    </div>
                </div> 

            </div>
        </div>
        <!--product area end-->
        
        <!--banner area start-->
      
        <!--banner area end-->
        
        <!--product area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title title_style2">
                           <div class="title_content">
                               <h2><span>Sản Phẩm Giảm Giá</span> </h2>
                                <p></p>   
                            </div>                 
                        </div>
                    </div>
                </div> 
                <div class="product_container">
                   <div class="row">
                        <div class="col-lg-6 col-md-12">
                          <div class="product_style_left">
                                <article class="single_product">
                                    @foreach($san_pham_gioi_han as $product) 
                                        <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{ route('frontend.product.show',[ 'product' => $product->id  ,'slug' => $product->id]) }}"> <img src="@if(!empty($product->image))
                                      {{$product->image->path}}
                                      @endif" alt=""></a>
                                            <a class="secondary_img" href="{{ route('frontend.product.show',[ 'product' => $product->id  ,'slug' => $product->id]) }}"> <img src="@if(!empty($product->image))
                                      {{$product->image->path}}
                                      @endif" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">{{number_format($product->price_sale,0,'.',',')}}%</span>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <p class="manufacture_product"><a href="#">{{ $product->name }}</a></p>
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
                                                <p>{{ $product->content}}</p>
                                            </div>
                                            <div class="action_links">
                                                 <ul>
                                                    <li class="add_to_cart"><a href=" @if(auth()->check())
                                                                    {{ route('frontend.carts.add',[ 'id' => $product->id ]) }}
                                                            @else
                                                                    {{ route('auth.login') }}
                                                            @endif" title="Add to cart">Add to cart</a></li>
                                                    <li class="quick_view"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-search"></i></a></li>
                                                    <li class="wishlist"><a href="wishlist.html"  title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                    <li class="compare"><a href="compare.html" title="Add to Compare"><i class="icon-rotate-cw"></i></a></li>  
                                                </ul>
                                            </div> 
                                        </div>
                                    </figure>
                                    
                                    @endforeach
                                   
                                </article>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="product_style_right">
                                <div class="row">
                                    <div class="product_carousel product_column3 owl-carousel">
                                        
                                                @foreach($product_on_sale as $product) 
                                                    @include('frontend.home.compoments.list_products',[
                                                        'product' => $product    
                                                    ])
                                                @endforeach
                                      
                                    </div> 
                                </div>
                            </div>
                        </div>
                   </div>
                     
                </div>
            </div>
        </div>
        <!--product area end-->

        <!--blog area start-->
        <div class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       <div class="section_title title_style2">
                           <div class="title_content">
                               <h2><span>Bài Viết Nổi Bật</span></h2>
                                <!-- <p>The highest discount products of Mazlay </p>    -->
                            </div>                 
                        </div>
                      </div>
                </div>   
                <div class="row">
                    <div class="blog_container blog_column4 owl-carousel">
                        @foreach($posts as $post)
                        <div class="col-lg-3">
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="{{ route('frontend.blogs.detail',['id' => $post->id]) }}"><img style="height:200px" src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}" alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h4><a href="{{ route('frontend.blogs.detail',['id' => $post->id]) }}">{{ $post->title}}</a></h4> 
                                        <div class="post_meta">
                                            <p>Tác Giả: {{$post->user->name}}</p>
                                            <p> {{ $post->created_at }}</p>
                                        </div>
                                        <div class="post_desc">
                                        </div>
                                        <footer class="post_readmore">
                                            <a href="{{ route('frontend.blogs.detail',['id' => $post->id]) }}">Chi Tiết Bài Viết</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>          
            </div>
        </div>
        <!--blog area end-->
    </div>
    <!--home section bg area end-->
    
    <!--brand area start-->
    <div class="brand_area">
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
 
    <!--newsletter area end-->
@endsection