@extends('layouts.master')

@section('title', 'Products')


@section('content')
    <!-- breadcrumb area start -->
    <div class="page-layout" data-background="{{ asset('images/category/' . $category->image) }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">{{ $category->name }} </h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                                    @isset($subcategory)
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('subcategory', [$category->slug, $subcategory->slug]) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                        @endif
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- breadcrumb area end -->
        <!-- shop page start -->
        <div class="shop-page pt-85">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="sidebar">
                            <div class="product-widget">
                                <h3 class="widget-title mb-30">Product categories</h3>
                                <ul class="product-categories">
                                    @php $subcategory = \App\Models\Subcategory::where('category_id',$category->id)->get()->sortBy('sequence') @endphp
                                    @foreach($subcategory as $subcat)
                                        <li><a href="{{ route('subcategory',[$category->slug ,$subcat->slug]) }}">{{ $subcat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-9 col-sm-12">
                        <div class="shop-top-bar position-relative">
                            <div class="showing-result">
                                <p> Showing all 21 results</p>
                            </div>
                            <div class="shop-tab">
                                <nav>
                                    <div class="nav nav-tabs shop-tabs" id="nav-tab" role="tablist">
                                        <button>
                                            <span>views</span>
                                        </button>
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab" aria-selected="true">
                                            <img src="{{ asset('assets/img/essential/i2.svg') }}" alt="">
                                        </button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab" aria-selected="false">
                                            <img src="{{ asset('assets/img/essential/i3.svg') }}" alt="">
                                        </button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab" aria-selected="false">
                                            <img src="{{ asset('assets/img/essential/i4.svg') }}" alt="">
                                        </button>
                                        <button class="nav-link" id="nav-contact-tab2" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab" aria-selected="false">
                                            <img src="{{ asset('assets/img/essential/list.svg') }}" alt="">
                                        </button>
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                        <div class="shop-page-product pt-50 pb-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                @if ($products)
                                                    @foreach ($products as $key => $product)
                                                        <div class="col-xl-6">
                                                            <div class="product product-4">
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
                                                @else
                                                    <h3>No Product Found with this category...</h3>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                @if ($products)
                                                    @foreach ($products as $key => $product)
                                                        <div class="col-xl-4">
                                                            <div class="product product-4">
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
                                                @else
                                                    <h3>No Product Found with this category...</h3>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                @if ($products)
                                                    @foreach ($products as $key => $product)
                                                        <div class="col-xl-3">
                                                            <div class="product product-4">
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
                                                @else
                                                    <h3>No Product Found with this category...</h3>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-list" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">
                                            @if ($products)
                                                @foreach ($products as $key => $product)
                                                    <div class="border-top">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                                <div class="list-product">
                                                                    <div class="list__thumb">
                                                                        <a href="single.html"><img
                                                                                src="images/products/boxing-gloves-1.jpg"
                                                                                alt="boxing-gloves-1"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-8 col-lg-8 col-md-8">
                                                                <div class="list__content">
                                                                    <div class="viewcontent">
                                                                        <div class="viewcontent__header">
                                                                            <a href="single.html">
                                                                                <h2 class="mb-10">{{ $product->name }}</h2>
                                                                            </a>
                                                                        </div>


                                                                        <div class="view__para">
                                                                            <p>{!! $product->description !!}</p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h3>No Product Found with this category...</h3>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- shop page end -->
    @endsection
