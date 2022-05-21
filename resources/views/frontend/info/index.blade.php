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
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <div class="contact_page_bg">
        <!--contact map start-->
        <div class="contact_map">
           <div class="map-area">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.08725358696!2d105.82145781396598!3d21.029194493141546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7473c41a81%3A0xfa30bdcbfb6a914c!2zMTE1IFBo4buRIE7DumkgVHLDumMsIEdp4bqjbmcgVsO1LCBCYSDEkMOsbmgsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1652967969992!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
        </div>
        <!--contact map end-->
        <div class="container">
            <!--contact area start-->
            <div class="contact_area">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                       <div class="contact_message content">
                            <ul>
                                <li><i class="fa fa-fax"></i>  Địa chỉ: 115 Núi Trúc Ba Đình Hà Nội</li>
                                <li><i class="fa fa-phone"></i> <a href="#">congminh2012002@gmail.com</a></li>
                                <li><i class="fa fa-envelope-o"></i>0814332325</li>
                            </ul>             
                        </div> 
                    </div>
                    <div class="col-lg-6 col-md-12">
                       <div class="contact_message form">
                           
                        </div> 
                    </div>
                </div>   
            </div>
            <!--contact area end-->
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
    <!--newsletter area end-->
@endsection