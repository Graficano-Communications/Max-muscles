@extends('layouts.master')
@section('title', 'home')

@section('content')
    <section class="fullscreen background-image main-banner">
        <div id="particles-dots" class="particles"></div>
        <div class="container-fluid">
            <div class="container-fullscreen">
                <div class="text-middle text-center text-light">

                    <h3 class="m-b-0">Elite Impex</h3>
                    <h2 class="text-lg m-t-0">Sports Wear</h2>
                    <p class="lead">Beyond The Possibilities</p>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h4 class="m-b-10">Know More</h4>
                    <h2 class="m-b-10">About Us</h2>
                    <p><b>ELITE IMPEX was established in 2013.</b>
                        <br>After so many years of experience and success; we are confidently
                        inviting your esteemed organization to be our business partner. We are giving you an opportunity to
                        check the quality of our products in every aspect and you will certainly believe in what we say, for
                        our slogan is "TEST AND TRUST US”
                    </p>
                    <a href="{{ route('about') }}" class="btn btn-info"><span class="btn-label"><i
                                class="fa fa-check"></i></span>Read  more</a>
                </div>
                <div class="col-lg-6 offset-1 m-t-50">
                    <img src="{{ asset('assets/images/About-Us-Image.jpg') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-line text-center">
                <h4>Compliances</h4>
            </div>
            <div class="row icon-boxes">
                <div class="icon-boxx col-md-3 col-6 text-center">
                    <img src="{{ asset('assets/icons/compliances/iso-9001.png') }}" class="img-fluid">
                </div>
                <div class="icon-boxx col-md-3 col-6 text-center">
                    <img src="{{ asset('assets/icons/compliances/iso-9002.png') }}" class="img-fluid">
                </div>
                <div class="icon-boxx col-md-3 col-6 text-center">
                    <img src="{{ asset('assets/icons/compliances/oeko-tex.png') }}" class="img-fluid">
                </div>
                <div class="icon-boxx col-md-3 col-6 text-center">
                    <img src="{{ asset('assets/icons/compliances/scci.png') }}" class="img-fluid">
                </div>

            </div>
            <div class="space"></div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-line text-center">
                <h4>FEATURED PRODUCTS</h4>
            </div>
            <div class="carousel shop-products" data-items="3" data-margin="20" data-dots="false">
                @php
                    $products = \App\Models\Product::where('feature', 1)
                        ->take(8)->get()
                        ->sortBy('sequence');
                @endphp
                @foreach ($products as $product)
                    <div class="product">
                        <div class="product-image">
                            @php $image = \App\Models\Image::where('product_id', $product->id)->first();@endphp
                            @if ($image)
                                @php $imags = json_decode($image->images);  @endphp

                                @foreach ($imags as $key => $img)
                                    @if ($loop->first)
                                        <a href="{{ route('product', $product->slug) }}"><img alt="{{ $product->name }}"
                                                src="{{ asset('images/products/' . $img) }}">
                                        </a>
                                    @endif

                                    @if ($key == 1)
                                        <a href="{{ route('product', $product->slug) }}"><img alt="{{ $product->name }}"
                                                src="{{ asset('images/products/' . $img) }}">
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                <p>No Image Found</p>
                            @endif

                        </div>
                        <div class="product-description">

                            <div class="product-title">
                                <h3><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="heading-text heading-section">
                <h2>WORK FLOW</h2>
            </div> 
            <div class="row">
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/designing1.png') }}" class="img-fluid">
                        </div>
                        <h3>Designing</h3>
                        <p>We offer customized design services and designing experts bring your ideas to life. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/Mockup.png') }}" class="img-fluid">
                        </div>
                        <h3>Mockup</h3>
                        <p>Our designers create mockup samples of your brand and create them close to reality. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/Approval.png') }}" class="img-fluid">
                        </div>
                        <h3>Alteration and approval</h3>
                        <p>Alterations are done on order to keep your preferences in mind. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/raw.png') }}" class="img-fluid">
                        </div>
                        <h3>Raw material</h3>
                        <p>Quality raw material and local trusted providers are kept in mind. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/cutting.png') }}" class="img-fluid">
                        </div>
                        <h3>Pattern making and cutting</h3>
                        <p>Our team with the deep knowledge of pattern making performs design and cutting through digital
                            and manual procedure. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/stitching.png') }}" class="img-fluid">
                        </div>
                        <h3>Stitching</h3>
                        <p>Automatic, semi-automatic and manual stitching is all done using state of the art machinery. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/embellishement.png') }}" class="img-fluid">
                        </div>
                        <h3>Embellishment</h3>
                        <p>In house sublimation services are done through plotters and transferring beds. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/Packing.png') }}" class="img-fluid">
                        </div>
                        <h3>Checking and packing </h3>
                        <p>High handed inspection is done in multiple disciplines before of tagging and packing. </p>
                    </div>
                </div>
                <div class="col-lg-4" data-animate="flipInY" data-animate-delay="0">
                    <div class="icon-box effect large">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/workflow/dispatching.png') }}" class="img-fluid">
                        </div>
                        <h3>Dispatching </h3>
                        <p>We dispatch all of the valuable products in compact volume through world leading brand of
                            logistics.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="text-light parallax-section" data-bg-parallax="{{ asset('assets/images/Paralax-Banner.png') }}">
        <div class="parallax-container scrolly-invisible img-loaded" data-bg="{{ asset('assets/images/Paralax-Banner.png') }}"
            data-velocity="-.140"
            style="background: rgba(0, 0, 0, 0) url(&quot;{{ asset('assets/images/Paralax-Banner.png') }}&quot;) no-repeat scroll 0% 0px;"
            data-ll-status="loaded"></div>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><img src="{{ asset('images/icons/Daily-Sublimation.png') }}"
                                class="img-fluid"></div>
                        <div class="counter"> <span data-speed="3000" data-refresh-interval="50" data-to="12416"
                                data-from="600" data-seperator="true">8785</span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>DAILY SUBLIMATION</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><img src="{{ asset('images/icons/daily-production.png') }}"
                                class="img-fluid"></div>
                        <div class="counter"> <span data-speed="4500" data-refresh-interval="23" data-to="365"
                                data-from="100" data-seperator="true">222</span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>DAILY PRODUCTION</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><img src="{{ asset('images/icons/Daily-Designs.png') }}" class="img-fluid">
                        </div>
                        <div class="counter"> <span data-speed="3000" data-refresh-interval="12" data-to="114"
                                data-from="50" data-seperator="true">94</span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>DAILY DESIGNS</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="icon"><img src="{{ asset('images/icons/Maximum-Capacity.png') }}"
                                class="img-fluid"></div>
                        <div class="counter"> <span data-speed="4550" data-refresh-interval="50" data-to="14825"
                                data-from="48" data-seperator="true">6797</span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>MAXIMUM CAPACITY</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="p-t-150 p-b-200 footer-banner" style="background-position:71% 22%;">
        <div class="container">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="m-b-10">Get in Touch with Us</h2>
                        </div>
                        <div class="col-lg-6 m-b-30">
                            <address>
                                <strong>12/325 hamza ghouse,
                                </strong><br>Pasror Road,
                                Sialkot, Pakistan<br>
                            </address>
                            <strong>Phone:</strong> 03315015757
                            <br>

                            <strong>Email:</strong>  sales@eliteimpex.net <br> eliteimpex01@gmail.com
                        </div>
                        <div class="col-lg-6 m-b-30">

                        </div>
                        <div class="col-lg-12 m-b-30">
                            <h4>We are social</h4>
                            <div class="social-icons social-icons-light social-icons-colored-hover">
                                <ul>

                                    <li class="social-facebook"><a href="https://www.facebook.com/eliteimpexpk"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social-instagram"><a href="https://www.instagram.com/eliteimpex"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="social-linkedin"><a href="https://www.linkedin.com/company/elite-impex/"><i
                                        class="fab fa-linkedin"></i></a>
                                  </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-1">
                    <form action="{{ route('SendMail') }}" role="form" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" aria-required="true" name="name" required
                                    class="form-control required name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" aria-required="true" name="email" required
                                    class="form-control required email" placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea type="text" name="message" required rows="5" class="form-control required"
                                placeholder="Enter your Message"></textarea>
                        </div>
                        
                        <br />
                        @csrf


                        <button class="btn btn-info" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send
                            message</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

   

@endsection
