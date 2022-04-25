                               <div class="col-lg-3">
                                   <div class="product_items">
                                           <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="" href="{{ route('frontend.product.show',[ 'slug' => $product->slug ]) }}"><img src="assets/img/product/product1.jpg" alt=""></a>
                                                    <a class="secondary_img" href="{{ route('frontend.product.show',[ 'slug' => $product->slug ]) }}"><img src="assets/img/product/product2.jpg" alt=""></a>
                                                    <div class="label_product">
                                                        <span class="label_sale">-56%</span>
                                                    </div>
                                                    <div class="quick_button">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_content_inner">
                                                        <p class="manufacture_product"><a href="#">{{ $product->name }}</a></p>
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
                                                            <span class="old_price">$320.00</span> 
                                                            <span class="current_price">$120.00</span>
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
                               </div>