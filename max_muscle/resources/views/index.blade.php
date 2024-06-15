@extends('layouts.master')
@section('title', 'home')

@section('content')
    <!-- slider start -->
    <div class="slider-active slider-2 swiper-container height hight2 d-none d-md-block">
        <div class="swiper-wrapper">
            <div class="swiper-slide slider-item bgclr2 pt-200 pb-200">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 offset-xl-1 col-lg-5 col-md-5 ">
                            <div class="left_text text-right">
                                <img class="changevalu3" src="{{ asset('assets/img/slider/slider-shape1.png') }}"
                                    alt="">
                                <img class="changevalu2" src="{{ asset('assets/img/slider/slider-dot-shape1.png') }}"
                                    alt="">
                                <img class="" src="{{ asset('assets/img/slider/slider-circle-1.png') }}"
                                    alt="">
                                <img class="common-absoulute changevalue" src="assets/img/slider/slider-text1 (2).png"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5">
                            <div class="righ-images">
                                <img class="common-absoulute ab-2 d-none d-sm-block"
                                    src="{{ asset('assets/img/slider/slider-shoe-1 (2).png') }}" alt="">
                                <img class="common-absoulute ab-3" src="{{ asset('assets/img/slider/slider-shape2.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-4" src="{{ asset('assets/img/slider/slider-shape5.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-5" src="{{ asset('assets/img/slider/slider-shape3.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-6" src="{{ asset('assets/img/slider/slider-shape1.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slider-item slider-animation pt-200 pb-200"
                data-background="assets/img/slider/main-slider-Recovered.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 offset-xl-1 col-lg-5 col-md-5">
                            <div class="left_text text-right">
                                <img class="changevalu3" src="{{ asset('assets/img/slider/slider-shape1.png') }}"
                                    alt="">
                                <img class="changevalu2 bottomleft"
                                    src="{{ asset('assets/img/slider/slider-dot-shape1.png') }}" alt="">
                                <img class="common-absoulute changevalue" data-wow-delay=".3s"
                                    src="{{ asset('assets/img/slider/slider-text2 (2).png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-md-5">
                            <div class="righ-images pt-200">
                                <img class="common-absoulute ab-3" src="{{ asset('assets/img/slider/slider-shape2.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-4" src="{{ asset('assets/img/slider/slider-shape5.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-5" src="{{ asset('assets/img/slider/slider-shape3.png') }}"
                                    alt="">
                                <img class="common-absoulute ab-6 ab-66"
                                    src="{{ asset('assets/img/slider/slider-shape1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- slider end -->

    <!-- banner area start -->
    <div class="banar_area">
        <div class="container-fluid padding-remove">
            <div class="row g-0">
                @php $cats = \App\Models\Category::all()->sortBy('sequence'); @endphp
                @foreach ($cats as $cat)
                    @if ($loop->first)
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banar wow fadeIn" data-wow-duration=".5s" data-wow-delay=".3s">
                                <div class="banar__left">
                                    <a href="{{ route('category', $cat->slug) }}"><img
                                            src="{{ asset('images/category/banner_image/' . $cat->banner_image) }}"
                                            alt=""></a>
                                    <div class="banar__content">
                                        <p class="d-none d-sm-block"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="row g-0">
                        @foreach ($cats as $cat)
                            @if (!$loop->first)
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="banarright wow fadeIn" data-wow-duration=".8s" data-wow-delay=".6s">
                                        <a href="{{ route('category', $cat->slug) }}"><img
                                                src="{{ asset('images/category/banner_image/' . $cat->banner_image) }}"
                                                alt=""></a>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- banner area end -->

    <!-- categories area start -->
    <div class="categories_area pt-85 mb-150">
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="section-wrapper text-center mb-35">
                    <h2 class="section-title">Featured Products</h2>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="categories__tab">
                        <div class="tab-content" id="myproduct">
                            <div class="tab-pane fade show active" id="tablid">
                                <div class="container">
                                    <div class="product-active h-2-product-active swiper-container">
                                        <div class="swiper-wrapper">
                                            @php
                                                $products = \App\Models\Product::where('feature', 1)
                                                    ->take(8)
                                                    ->get()
                                                    ->sortBy('sequence');
                                            @endphp
                                            @foreach ($products as $key => $product)
                                                <div class="product-item swiper-slide wow fadeInUp" data-wow-duration="1s"
                                                    data-wow-delay="0.2s">
                                                    <div class="product">
                                                        <div class="product__thumb">
                                                            @php  $image = \App\Models\Image::where('product_id', $product->id)->first(); @endphp
                                                            @if ($image)
                                                                @php $imags = json_decode($image->images);  @endphp
                                                                @foreach ($imags as $key => $img)
                                                                    <a href="{{ route('product', $product->slug) }}">
                                                                        @if ($loop->first)
                                                                            <img class="product-primary"
                                                                                alt="{{ $product->name }}"
                                                                                src="{{ asset('images/products/' . $img) }}">
                                                                        @endif

                                                                        @if ($key == 1)
                                                                            <img alt="{{ $product->name }}"
                                                                                class="product-secondary"
                                                                                src="{{ asset('images/products/' . $img) }}">
                                                                        @endif
                                                                    </a>
                                                                @endforeach
                                                            @else
                                                                <p>No Image Found</p>
                                                            @endif
                                                            <div class="product__name">
                                                                <h4><a href="{{ route('product', $product->slug) }}">{{ $product->name }}
                                                                    </a></h4>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profiles">
                                <div class="container">
                                    <div class="product-active swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="product-item swiper-slide">
                                                <div class="product ">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <div class="product__update">
                                                            <a class="#">new</a>
                                                        </div>
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">NikeCourt Air Zoom Prestige</a>
                                                            </h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item swiper-slide">
                                                <div class="product">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <!-- <div class="product__update">
                   <a class="#">new</a>
                  </div> -->
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">Fashion high heeled big silk
                                                                    belt </a></h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item swiper-slide">
                                                <div class="product">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <div class="product__update">
                                                            <a class="#">new</a>
                                                        </div>
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">Mens Running Shoes</a></h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item swiper-slide">
                                                <div class="product">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <!-- <div class="product__update">
                   <a class="#">new</a>
                  </div> -->
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">Sandal For Women</a></h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item swiper-slide">
                                                <div class="product">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <div class="product__update">
                                                            <a class="#">new</a>
                                                        </div>
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">Fly Sandal For Women</a></h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item swiper-slide">
                                                <div class="product">
                                                    <div class="product__thumb">
                                                        <a href="single.html">
                                                            <img class="product-primary" src="assets/img/product/cat1.png"
                                                                alt="product_image">
                                                            <img class="product-secondary"
                                                                src="assets/img/product/cat2.png" alt="product_image">
                                                        </a>
                                                        <div class="product__update">
                                                            <a class="#">new</a>
                                                        </div>
                                                        <div class="product-info mb-10">
                                                            <div class="product_category">
                                                                <span>Shoes, Clothing</span>
                                                            </div>
                                                            <div class="product_rating">
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i
                                                                        class="fal fa-star start-color"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                                <a href="#"><i class="fal fa-star"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product__name">
                                                            <h4><a href="products.html">Fly Sandal For Women</a></h4>
                                                            <div class="pro-price">
                                                                <p class="p-absoulute pr-1"><span>$</span>680.00 -
                                                                    <span>$</span>680.00
                                                                </p>
                                                                <a class="p-absoulute pr-2" href="#">add to
                                                                    cart</a>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <div class="inner__action">
                                                                <div class="wishlist">
                                                                    <a href="#"><i class="fal fa-heart"></i></a>
                                                                </div>
                                                                <div class="view">
                                                                    <a href="javascript:void(0)"><i
                                                                            class="fal fa-eye"></i></a>
                                                                </div>
                                                                <div class="layer">
                                                                    <a href="#"><i
                                                                            class="fal fa-layer-group"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- categories area end -->

    <!-- product offer area start -->
    <div class="product_offer" data-background="assets/img/slider/HOMEPAGE-PARALAX.jpg">
        <div class="count_down">
            <div class="inner_content">
                <h2 class="pt-35">WIN THE BATTLE! </h2>
                <h3 class="pb-40"> Be unstoppable <br> in our gear</h3>

                <a href="{{ route('contact') }}" class="btn-style-1">Contact us</a>
            </div>
        </div>
    </div>
    <!-- product offer area end -->


@endsection
