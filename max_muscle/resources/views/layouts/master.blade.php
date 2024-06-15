<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Max Muscle - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/futura-std-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>

    <!-- header area start -->
    <header class="header-area">

        <div class="gota_bottom position-relative">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-1 col-lg-2 col-md-4 col-sm-4 d-none d-sm-block">
                        <div class="gota_search">
                            <form class="search_form">
                                <button class="search_action"><i
                                        class="fal fa-search d-sm-none d-md-block"></i></button>
                                <input type="text" placeholder="" />
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8 col-md-4 col-sm-4">
                        <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
                            <a class="open" href="#"><i class="fal fa-bars"></i></a>
                        </div>
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home </a>
                                    </li>
                                    <li><a href="{{ route('about') }}">About us</a></li>
                                    <li class="position-static menu-item-has-children"><a
                                            href="#" class="d-lg-none d-md-block">Products</a>
                                        <ul class="mega_menu" 
                                            data-background="{{ asset('assets/img/mega-menu/Drop-Down-Image.png') }}">
											@php $cats = \App\Models\Category::all()->sortBy('sequence'); @endphp
                                            @foreach($cats as $cat)
												<li>
													<a href="{{route('category',$cat->slug) }}">
														<h4 class="mega_title">{{ $cat->name }}</h4>
													</a>
													<ul class="mega_item">
														@php $subcategory = \App\Models\Subcategory::where('category_id',$cat->id)->get()->sortBy('sequence') @endphp
                                                    	@foreach($subcategory as $subcat)
															<li><a href="{{ route('subcategory',[$cat->slug ,$subcat->slug]) }}">{{ $subcat->name }}</a></li>
														@endforeach
													</ul>
												</li>
											@endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children d-lg-none d-md-block"><a href="#">Products</a>
                                        <ul class="sub-menu">
                                            @php $cats = \App\Models\Category::all()->sortBy('sequence'); @endphp
                                            @foreach($cats as $cat)
                                                <li><a href="{{route('category',$cat->slug) }}">{{ $cat->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <a class="d-none d-xl-block" href="{{ route('home') }}">
                                            <img class="pl-50 pr-50" src="{{ asset('assets/images/logo (2).png') }}" alt="">
                                        </a>
                                    </li>
                                    <li><a href="{{ route('resources') }}">Catalogues</a></li>
                                    <li><a href="{{ route('events') }}">News & Events</a></li>
                                    
                                    <li><a href="{{ route('contact') }}">contact us </a></li>
                                   
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="col-xl-1 col-lg-2 col-md-4 col-sm-4">
                        <div class="gota_cart gotat_cart_1 text-end">
                            <a href="#"><i class=""></i></a>
                            <a href="https://www.instagram.com/maxmuscle.pk/" target="_blank">
                                <img src="{{ asset('assets/img/insta.png') }}" class="img-fluid" style="height:30px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <div class="search_area">
        <div class="search_close">
            <span><i class="fal fa-times"></i></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="search-wrapper text-center">
                        <h2>search</h2>
                        <div class="search-filtering pt-30">
                            <div class="search_tab">
                                <ul class="nav nav-tabs justify-content-center mb-55" id="myTab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab2" data-bs-toggle="tab"
                                            data-bs-target="#home2" type="button" role="tab"
                                            aria-selected="true">All categories</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab2" data-bs-toggle="tab"
                                            data-bs-target="#profile2" type="button" role="tab"
                                            aria-selected="false">Basketball</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#search2"
                                            type="button" role="tab" aria-selected="false">Handbag</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sportswear-tab" data-bs-toggle="tab"
                                            data-bs-target="#sportswear" type="button" role="tab"
                                            aria-selected="false">Sportswear</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="profile2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="search2" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="sportswear" role="tabpanel">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_search">
                            <form action="#">
                                <input type="text" name="search" placeholder="search products">
                                <button class="m-search"><i class="fal fa-search d-sm-none d-md-block"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fix">
        <div class="side-info">
            <button class="side-info-close"><i class="fal fa-times"></i></button>
            <div class="side-info-content">
                <div class="mobile-menu"></div>
                <div class="contact-infos mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>Toor Abad Daska Road, Sialkot 51310 Pakistan</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+92-52-3550465</p>
                        <p>+92-310-7777511</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@maxmuscle.pk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-overlay"></div>

    <!-- cart area start  -->
    <div class="cart__sidebar">
        <div class="container">
            <div class="cart__content">
                <div class="cart-text">
                    <h3 class="mb-40">Shopping cart</h3>
                    <div class="add_cart_product">
                        <div class="add_cart_product__thumb">
                            <img src="assets/img/product/29-3.jpg" alt="">
                        </div>
                        <div class="add_cart_product__content">
                            <h5><a href="products.html">Running 3-Stripes</a></h5>
                            <p>1 × $66.00</p>
                            <button class="cart_close"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                    <div class="add_cart_product">
                        <div class="add_cart_product__thumb">
                            <img src="assets/img/product/17.jpg" alt="">
                        </div>
                        <div class="add_cart_product__content">
                            <h5><a href="products.html">Buddy non Stripes</a></h5>
                            <p>1 × $40.00</p>
                            <button class="cart_close"><i class="fal fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="cart-icon">
                    <i class="fal fa-times"></i>
                </div>
                <div class="cart-bottom">
                    <div class="cart-bottom__text">
                        <span>Subtotal:</span>
                        <span class="end">$121.00</span>
                        <a href="cart.html">view cart</a>
                        <a href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-offcanvas-overlay"></div>
    <!-- cart area end  -->

	@yield('content')
    

    <!-- footer area start -->
    <footer class="footer_area fix">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="company__info  wow fadeInUp " data-wow-duration=".s" data-wow-delay=".3s">
                        <h3 class="f-title">contact info</h3>
                        <ul>
                            <li>Toor Abad Daska Road, Sialkot 51310 Pakistan </li>
                            <li>Email: info@maxmuscle.pk</li>
                            <li>Phone: +92-52-3550465 - +92-310-7777511</li>
                        </ul>
                        <div class="social__media mb-30">
                            <h3 class="f-title">FOLLOW US ON</h3>
                            <a class="justify-content-center align-items-center"  href="https://www.instagram.com/maxmuscle.pk/" target="_blank">
                                <img src="{{ asset('assets/img/insta.png') }}" class="img-fluid" style="height:30px">
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                    <div class="company__info wow fadeInUp " data-wow-duration=".7s" data-wow-delay=".4s">
                        <h3 class="f-title">Get Help</h3>
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('resources') }}">Catalogues</a></li>
                            <li><a href="{{ route('events') }}">News & Events</a></li>
                            <li><a href="{{ route('contact') }}">contact us </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                    <div class="company__info wow fadeInUp " data-wow-duration=".8s" data-wow-delay=".5s">
                        <h3 class="f-title">Popular categories</h3>
                        <ul>
                            @php $cats = \App\Models\Category::all()->sortBy('sequence'); @endphp
                            @foreach($cats as $cat)
                                <li><a href="{{route('category',$cat->slug) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-1 col-lg-6 col-md-6 col-sm-12">
                    <div class="company__info wow fadeInUp " data-wow-duration=".9s" data-wow-delay=".6s">
                        <h3 class="f-title">get in touch</h3>
                        <iframe class="w-100" height="200"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3367.2924082561753!2d74.48133101521628!3d32.438107081075636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391ec21f3a3df223%3A0x67af8c28c5a6cbcd!2sDaska%20Rd%2C%20Sialkot%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1672060290001!5m2!1sen!2s"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom pb-10 mt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 ">
                            <p>Copyright © <span>Max Muscle</span> All Rights Reserved. Powered by <span><a
                                        href="https://graficano.com/" target="_blank">Graficano</a></span>
                            </p>
                        </div>   
                    </div>
                </div>   
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- JS here -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/one-page-nav-min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
