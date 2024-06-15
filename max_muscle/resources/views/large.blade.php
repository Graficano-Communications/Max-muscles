@extends('layouts.master')

@section('title', $product->name)


@section('content')
    <!-- single_breadcrumb_area start -->
    <div class="single_breadcrumb pt-25">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @php $category = \App\Models\Category::find($product->category_id)->first(); @endphp
                    <li class="breadcrumb-item"><a href="#">{{ $category->name }}</a></li>
                    @php $Subcategory = \App\Models\Subcategory::find($product->subcategory_id)->first(); @endphp
                    <li class="breadcrumb-item"><a href="#">{{ $Subcategory->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="single_product_tab">
                                <div class="single_prodct">
                                    <ul class="nav nav-tabs justify-content-center mb-55" id="dfde" role="tablist">
                                        @php
                                            $images = \App\Models\Image::where('product_id', $product->id)->get();
                                        @endphp
                                        @foreach ($images as  $image)
                                            @if ($image)
                                                @php $imags = json_decode($image->images);  @endphp
                                                @foreach ($imags as $key => $image)
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link @if($key == 0) active @endif" id="home-{{ $key }}" data-bs-toggle="tab"
                                                            data-bs-target="#homde{{ $key }}" type="button" role="tab"
                                                            aria-selected="true"><img
                                                                src="{{ asset('images/products/' . $image) }}"
                                                                alt=""></button>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="single_preview_product">
                                <div class="tab-content" id="myTabefContent">
                                    @foreach ($images as $key => $image)
                                        @if ($image)
                                            @php $imags = json_decode($image->images);  @endphp
                                            @foreach ($imags as $key => $image)
                                                <div class="tab-pane fade @if($key == 0) show active @endif" id="homde{{ $key }}" role="tabpanel">
                                                    <div class="full-view">
                                                        <img src="{{ asset('images/products/' . $image) }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="single_preview_content pl-30">
                        <h2 class="title-5 edit-title border-bottom-0">{{ $product->name }}</h2>
                      
                        <div class="s-des">
                            {!! $product->description !!}
                        </div>
                        @php $link = URL::current();  @endphp
                        <div class="viewcontent__action single_action pt-30">
                            <span><a href="mailto:sales@info@maxmuscle.pk?subject = Product Inquiry&body = Message{{ $product->name }}">+ Inquiry Via Email</a></span>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single_breadcrumb_area end -->
    <!-- categories area start -->
    <div class="categories_area pt-50 mb-100">
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="section-wrapper text-center mb-35">
                    <h2 class="section-title">Related products </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="categories__tab">
                        <div class="tab-content" id="dfmyTabContent">
                            <div class="tab-pane fade show active" id="hoeerme" role="tabpanel" >
                                <div class="container">
                                    <div class="product-active swiper-container">
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- categories area end -->



@endsection
