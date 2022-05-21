<div class="col-lg-3">
<article class="single_product">
                                                    <figure>
                                                        <div class="product_thumb">
                                                            <a class="primary_img" href="{{ route('frontend.product.show',[ 'product' => $product->id  ,'slug' => $product->id]) }}"><img src="assets/img/product/product9.jpg" alt=""></a>
                                                            <a class="secondary_img" href="{{ route('frontend.product.show',[ 'product' => $product->id  ,'slug' => $product->id]) }}"><img src="assets/img/product/product10.jpg" alt=""></a>
                                                            <div class="label_product">
                                                                <span class="label_sale">-44%</span>
                                                            </div>
                                                            <div class="quick_button">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-eye"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_content_inner">
                                                                <p class="manufacture_product"><a href="#">{{ $product->name }}</a></p>
                                                                <h4 class="product_name"><a href="product-details.html">Cas Meque Metus</a></h4>
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
                                                                    <!-- <span class="old_price">$420.00</span>  -->
                                                                    <span class="current_price">{{$product->price_origin}}$</span>
                                                                </div>
                                                            </div> 
                                                            <div class="action_links">
                                                                 <ul>
                                                                    <li class="add_to_cart"><a href=" @if(auth()->check())
                                                                    {{ route('frontend.carts.add',[ 'id' => $product->id ]) }}
                                                            @else
                                                                    {{ route('auth.login') }}
                                                            @endif" title="Add to cart">Add to cart</a></li>
                                                                    <li class="wishlist"><a href="wishlist.html"  title="Add to Wishlist"><i class="icon-heart"></i></a></li>
                                                                    <li class="compare"><a href="compare.html" title="Add to Compare"><i class="icon-rotate-cw"></i></a></li>  
                                                                </ul>
                                                            </div> 
                                                        </div>
                                                    </figure>
                                                </article>
                                        </div>
