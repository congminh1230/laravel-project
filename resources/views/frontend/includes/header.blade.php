<header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
               <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5">
                           
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="header_top_links text-right">
                                <ul>
                                  @if(auth()->check()) 
                                  @else
                                  <li><a href="{{ route('auth.login') }}" >Đăng Nhập</a></li>
                                  @endif 
                                 
                                  <li>
                                    <form method="post" action="{{ route('auth.logout')}}">
                                      @csrf
                                      <a href="#" class="nav-link"
                                        onclick="this.closest('form').submit();return false;">
                                      Đăng Xuất
                                      </a>
                                    </form>
                                  </li>
                                    <li><a href="{{ route('frontend.carts.index') }}">Giỏ Hàng</a></li>
                                    <li><a href="@if(auth()->check())
                                                            {{ route('frontend.checkout.index') }}

                                                            @else
                                                                    {{ route('auth.login') }}
                                                            @endif
                                    ">Thanh Toán</a></li>
                                    <li><a href=" @if(auth()->check())
                                                        {{ route('frontend.order.index') }}
                                                            @else
                                                                    {{ route('auth.login') }}
                                                            @endif
                                    
                                    ">Danh Sách Thanh Toán</a></li>
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->

            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-4">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-6 col-6">
                            <div class="header_right_box">
                                <div class="search_container">
                                    <form method="GET" action="{{ route('frontend.product.search')}}">
                                       <div class="hover_category">
                                            <select class="select_option" name="categories" id="categori2">
                                                <option selected >Tên Sản Phẩm</option>
                                            </select>                        
                                       </div>
                                        <div class="search_box">
                                            <input name="name" value="{{ request()->get('title')}}" placeholder="Search..." type="text">
                                            <button type="submit">Tìm Kiếm</button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="header_configure_area">
                                    <div class="mini_cart_wrapper">
                                        <a href="{{ route('frontend.carts.index') }}">
                                            <i class="icon-shopping-bag2"></i>
                                            <span class="cart_count">{{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span>
                                        </a>
                                        <!--mini cart-->
                                        <!-- <div class="mini_cart">
                                            <div class="mini_cart_inner">
                                                <div class="cart_close">
                                                    <div class="cart_text">
                                                        <h3>cart</h3>
                                                    </div>
                                                    <div class="mini_cart_close">
                                                        <a href=""><i class="icon-x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="cart_item">
                                                   <div class="cart_img">
                                                       <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                                   </div>
                                                    <div class="cart_info">
                                                        <a href="#">Fusce Aliquam</a>
                                                        <p>Qty: 1 X <span> $60.00 </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="#"><i class="ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="cart_item">
                                                   <div class="cart_img">
                                                       <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                                                   </div>
                                                    <div class="cart_info">
                                                        <a href="#">Ras Neque Metus</a>
                                                         <p>Qty: 1 X <span> $60.00 </span></p>    
                                                    </div>
                                                    <div class="cart_remove">
                                                        <a href="#"><i class="ion-android-close"></i></a>
                                                    </div>
                                                </div>
                                                
                                                <div class="mini_cart_table">
                                                    <div class="cart_total">
                                                        <span>Sub total:</span>
                                                        <span class="price">$138.00</span>
                                                    </div>
                                                    <div class="cart_total mt-10">
                                                        <span>total:</span>
                                                        <span class="price">$138.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini_cart_footer">
                                               <div class="cart_button">
                                                    <a href="cart.html">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a class="active" href="checkout.html">Checkout</a>
                                                </div>

                                            </div>
                                        </div> -->
                                        <!--mini cart end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->

            <!--header bottom satrt-->
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class=" col-lg-3">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Danh Mục</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main_menu menu_position text-left"> 
                                <nav>  
                                    <ul>
                                        <li><a class="active"  href="{{ route('home') }}">Trang Chủ</a>
                                        </li>
                                        <li class="mega_items"><a href="{{ route('frontend.product.shop') }}">Cửa Hàng<i class="fa fa-angle-down"></i></a> 
                                            <!-- <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                    <li><a href="#">Shop Layouts</a>
                                                        
                                                    </li>
                                                    <li><a href="#">other Pages</a>
                                                        <ul>
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            <li><a href="404.html">Error 404</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Product Types</a>
                                                        <ul>
                                                            <li><a href="product-details.html">product details</a></li>
                                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                                            <li><a href="product-grouped.html">product grouped</a></li>
                                                            <li><a href="variable-product.html">product variable</a></li>
                                                            <li><a href="product-countdown.html">product countdown</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </li>
                                        <li><a href="{{ route('frontend.posts.index')}}">Bài Viết<i class="fa fa-angle-down"></i></a>
                                            <!-- <ul class="sub_menu pages">
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="{{route('frontend.info.index')}}">Liên Hệ</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="call_support text-right">
                                <p><i class="icon-phone-call" aria-hidden="true"></i> <span>Call us:  <a href="tel:0123456789">0814332325</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div> 
    </header>
