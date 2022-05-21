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
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--Checkout page section-->
    <div class="checkout_page_bg">
        <div class="container">
            <div class="Checkout_section" id="accordion">
                <div class="row">
                   <div class="col-12">
                        <div class="user-actions">
                             <div id="checkout_login" class="collapse" data-parent="#accordion">
                                <div class="checkout_info">
                                    <form action="#">  
                                        <div class="form_group">
                                            <label>Username or email <span>*</span></label>
                                            <input type="text">     
                                        </div>
                                        <div class="form_group">
                                            <label>Password  <span>*</span></label>
                                            <input type="text">     
                                        </div> 
                                        <div class="form_group group_3 ">
                                            <button type="submit">Login</button>
                                            <label for="remember_box">
                                                <input id="remember_box" type="checkbox">
                                                <span> Remember me </span>
                                            </label>     
                                        </div>
                                        <a href="#">Lost your password?</a>
                                    </form>          
                                </div>
                            </div>    
                        </div>
                   </div>
                </div>
                <div class="checkout_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_left">
                                <form action="{{ route('frontend.order.add') }}" method="post" novalidate="novalidate">
                                        @csrf
                                    <h3>Thông Tin Người Đặt Hàng</h3>
                                    <div class="row">
 
                                        <div class="col-lg-6 mb-20" style="width: 100%" >
                                            <label>Họ Và Tên<span>*</span></label>
                                            <input name="name" value="{{ auth()->user()->name }}"type="text">    
                                        </div>
                                      
                                        <div class="col-12 mb-20">
                                            <label for="country">Thành Phố<span>*</span></label>
                                            <select class="niceselect_option" name="city" id="country"> 
                                                @foreach($Cites as $City) 
                                                    <option>{{$City->name_city}}</option>      
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="country">Quận-Phường<span>*</span></label>
                                            <select class="niceselect_option" name="province" id="country"> 
                                                @foreach($Provinces as $Province) 
                                                    <option>{{$Province->name_quan_huyen}}</option>      
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label for="country">Phường-Xã<span>*</span></label>
                                            <select class="niceselect_option" name="ward" id="country"> 
                                                @foreach($Wards as $Ward) 
                                                    <option>{{$Ward->name_xa_huyen}}</option>      
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Địa Chỉ Nhà<span>*</span></label>
                                            <input placeholder="Số Nhà" name="address" type="text">     
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <label>Số Điện Thoại<span>*</span></label>
                                            <input type="phone"  name="phone" > 

                                        </div> 
                                         <div class="col-lg-6 mb-20">
                                            <label>Địa chỉ Email <span>*</span></label>
                                              <input type="text" name="email" value="Nhập email"> 
                                        </div> 
                                        <div class="order_button">
                                            <button type="submit">Lưu Thông Tin</button>    	    	    	    	    	    	    
                                        </div>  
                                    </div>
                                </form> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_right">
                                <form action="#">    
                                    <h3>Your order</h3> 
                                    <div class="order_table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach($products as $product)
                                               <tr>
                                                    <td>{{ $product->name}}</td>
                                                    <td> <span>{{ $product->qty }}</span></td>
                                                    <td>${{ number_format($product->qty * $product->price , 0, '.', ',')}}</td>
                                               </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr class="order_total">
                                                    <th>thuế</th>
                                                    <td></td>
                                                    <td><strong>{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</strong></td>
                                                </tr>
                                                <tr class="order_total">
                                                    <th>Order Total</th>
                                                    <td></td>
                                                    <td><strong>{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>     
                                    </div>
                                    <div class="payment_method">
                                       <div class="panel-default">
                                            <input id="payment" name="check_method" type="radio" data-bs-target="createp_account" />
                                            <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">Create an account?</label>

                                            <div id="method" class="collapse one" data-parent="#accordion">
                                                <div class="card-body1">
                                                   <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div> 
                                       <div class="panel-default">
                                            <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                                            <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></label>

                                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                                <div class="card-body1">
                                                   <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order_button">
                                            <button  type="submit">Proceed to PayPal</button> 
                                        </div>    
                                    </div> 
                                </form> 
                            </div>        
                        </div>
                    </div> 
                </div>        
            </div>
        </div>
    </div>
    
    <!--Checkout page section end-->

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
