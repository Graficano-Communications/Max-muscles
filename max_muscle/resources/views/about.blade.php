@extends('layouts.master')
@section('title', 'About us')

@section('content')
    <!-- breadcrumb area start -->
    <div class="page-layout about" data-background="{{ asset('assets/img/about/about-us.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumb-area text-center">
                        <h2 class="page-title">about us</h2>
                        <div class="breadcrumb-menu">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="about.html">about</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- history area start -->
    <div class="history__area pt-115 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="g_history mb-100">
                        <h4 class="pl-130">About Max Muscle</h4>
                        <h2 class="title-3 pl-130 pt-20 mb-70">WE, AT A GLANCE</h2>
                        <p>
                            Max Muscle is a well-known reputable company, dedicated to
                            boxing and fitness gear, operating in Sialkot, Pakistan for the
                            past ten years. We understand that people who exercise and box,
                            want their gear to reflect their passion. At Max Muscle, we make
                            sure to help you improve your game while maintaining comfort and
                            style.<br />
                            THE PRESENT CEO, AHMED MUJTABA, IS GIVING HIS ALL IN TERMS OF
                            SERVICES, EFFORTS, DEDICATION, AND TIME. AND NOW, AS THE
                            SUCCESSORS OF OUR GREAT FOREBEARS, WE ARE LEADING THE WAY WITH A
                            WIDE VARIETY OF PRODUCTS FALLING UNDER SEVERAL CATEGORIES.<br />
                            Our clothing line includes Compression clothing, gym fitness
                            clothing, protective clothing, a variety of combat sports
                            equipment, and protective gear specially made for boxing, MMA,
                            and martial arts. Our commitment to paving the way for growth
                            and advancement in the corporate world and your confidence in us
                            helps drive us forward. we're dedicated to making sure you have
                            everything you need for your training regimen. Along with an
                            extensive range of products available, we also offer custom-made
                            gear.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="history__thumb mb-30">
                        <img src="{{ asset('assets/img/about/1.jpg') }}" alt="" />
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="thumb mb-30">
                                <img src="{{ asset('assets/img/about/2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="thumb mb-30">
                                <img src="{{ asset('assets/img/about/4.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="thumb mb-30">
                        <img src="{{ asset('assets/img/about/3.jpg') }}" alt="" />
                    </div>
                    <div class="thumb mb-30">
                        <img src="{{ asset('assets/img/about/5.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- history area end -->

    <!-- award area start -->
    <div class="award__area mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="singleaward text-center mb-50">
                        <div class="singleaward__thumb">
                            <!-- <img src="" alt=""> -->
                            <span><img src="{{ asset('assets/img/1.png') }}" /></span>
                        </div>
                        <div class="singleaward__content pb-50">
                            <h3 class="title-4">Global Logistic Supply</h3>
                            <p>
                                Proud to be a global combat sports equipment supplier,
                                offering efficient and cost-effective logistics services, and
                                dealing with customers worldwide.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="singleaward singleaward_2 text-center mb-50">
                        <div class="singleaward__thumb">
                            <!-- <img src="" alt=""> -->
                            <span><img src="{{ asset('assets/img/Private-Policy.png') }}" /></span>
                        </div>
                        <div class="singleaward__content">
                            <h3 class="title-4">Strict Privacy Policy</h3>
                            <p>
                                We respect your privacy and the protection of your information
                                is vital. You can count on us to keep your data safe and
                                confidential.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="singleaward text-center mb-50">
                        <div class="singleaward__thumb">
                            <!-- <img src="" alt=""> -->
                            <span><img src="{{ asset('assets/img/Quality-Guarantee.png') }}" /></span>
                        </div>
                        <div class="singleaward__content pb-50">
                            <h3 class="title-4">Quality Guarantee</h3>
                            <p>
                                you deserve only the best from us, and we promise to always
                                uphold our reputation as a brand by delivering on our promises
                                to you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- award area end -->

    <!-- free shiping area start -->
    <div class="free__shiping" data-background="{{ asset('assets/img/about/Parallax-Banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="shiping text-center">
                        <div class="shiping__thumb">
                            <!-- <img src="" alt=""> -->
                            <span></span>
                        </div>
                        <div class="shiping__content">
                            <h2 class="title-6 pb-30">Invest In Gear To Fight In Style</h2>
                            <p>
                                We're Max Muscle. Our products are designed with you in mind:
                                from boxing gloves and gym wear to apparel for both men and
                                women. <br />Our high-quality MMA equipment helps you perform
                                at your best while protecting your body and health. <br />
                                You may find something you love here at Max Muscle, so start
                                exploring now!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- free shiping area end -->

    <!-- team area start -->
    <div class="history__area pt-115 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="g_history mb-110">
                        <h4 class="pl-130">Our Team</h4>
                        <h2 class="title-3 pl-130 pt-20">Team Members</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @php $teams = \App\Models\Team::all()->sortBy('sequence') @endphp
                @foreach($teams as $key => $team)
                <div class="col-xl-3 col-lg-3 col-md-3" >
                    <div class="team_members text-center mb-50">
                        <div class="team_members__thumb">
                            <img src="{{ asset('images/ourteam/' . $team->image) }}" alt="" />
                        </div>
                        <div class="team_members__content pt-30">
                            <h4 class="sub-title">{{ $team->name }}</h4>
                            <span>{!! $team->designation !!}</span>
                        </div>
                    </div>
                </div>   
                @endforeach
            </div>
        </div>
    </div>
    <!-- team area end -->
    <!-- expert area start  -->
    <div class="expert__area mb-130">
        <div class="container">
            <div class="service__wrapper text-center mb-50">
                <h2>Milestones & Achievements</h2>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 offset-xl-1">
                    <div class="expert__thumb">
                        <img src="{{ asset('assets/img/service/MILESTONES-&-ACHIEVEMENTS.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 pl-50">
                    <div class="expertsingle mb-60 pt-30">
                        <div class="expertsingle__thumb">
                            <span><img src="{{ asset('assets/img/service/launch.png') }}" alt=""></i></span>
                        </div>
                        <div class="expertsingle__content">
                            <h5>2011 </h5>
                            <p style="font-size: large;">
                                Max Muscle was launched in 2011 by Ahmed Mujtaba, <br>
                                who has been the main person behind the success <br> of the business.
                            </p>
                        </div>
                    </div>
                    <div class="expertsingle mb-60">
                        <div class="expertsingle__content expertsingle__thumb">
                            <span><img src="{{ asset('assets/img/service/inhouse-manufacturing.png') }}" alt=""></span>
                        </div>
                        <div class="expertsingle__thumb expertsingle__content">

                            <h5>2014 </h5>
                            <p style="font-size: large;">
                                In 2014, Max Muscle began in-house manufacturing, expanding <br> the company's product line.
                                Which allowed it to diversify <br> its offerings into other markets.
                            </p>
                        </div>
                        
                    </div>
                    <div class="expertsingle mb-60">
                        <div class="expertsingle__thumb">
                            <span><img src="{{ asset('assets/img/service/worldwide-recognition.png') }}" alt=""></span>
                        </div>
                        <div class="expertsingle__content">
                            <h5>2018 </h5>
                            <p style="font-size: large;">
                                In 2018, Tayab Mustafa joined Max Muscle as the Marketing <br> Director to help grow the
                                company's brand recognition worldwide.
                            </p>
                        </div>
                    </div>

                    <div class="expertsingle mb-60">
                        <div class="expertsingle__content expertsingle__thumb">
                            <span><img src="{{ asset('assets/img/service/global-presence.png') }}" alt=""></span>
                        </div>
                        <div class="expertsingle__thumb expertsingle__content">
                            <h5>Global Presence </h5>
                            <p style="font-size: large;">
                                Since its inception, Max Muscle has been able to expand its global <br> presence and reach
                                new markets in Asia, Europe and Australia.
                            </p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert area end  -->

    <!-- testimonial area start -->
    <div class="testimonial__area">
        <div class="container">
            <div class="testimonial-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial text-center">
                            <div class="testimonial__thumb mb-20">
                                <p class="fix mb-30"><i class="fal fa-quote-left"></i></p>
                                <img src="" alt="" />
                            </div>
                            <div class="testimonial__content">
                                <p class="text-white mb-20">
                                    “We know that finding the right gear can be a challenge,
                                    especially when you're just getting started. That's why
                                    we're so excited to find protective equipment at Max Muscle.
                                    They're great quality.”
                                </p>
                                <span class="author text-white">Eren Christopher</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial text-center">
                            <div class="testimonial__thumb mb-20">
                                <p class="fix mb-30"><i class="fal fa-quote-left"></i></p>
                                <img src="" alt="" />
                            </div>
                            <div class="testimonial__content">
                                <p class="text-white mb-20">
                                    "I love these gloves. They're just the right mix of quality
                                    and price. they look like something you'd see in a movie
                                    about fighters.”
                                </p>
                                <span class="author text-white">Eren Christopher</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial text-center">
                            <div class="testimonial__thumb mb-20">
                                <p class="fix mb-30"><i class="fal fa-quote-left"></i></p>
                                <img src="" alt="" />
                            </div>
                            <div class="testimonial__content">
                                <p class="text-white mb-20">
                                    “Max Muscle has helped me become more confident on the mat,
                                    which is always helpful when you're trying to score a win!”
                                </p>
                                <span class="author text-white">Eren Christopher</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!-- brand area start -->
    <div class="brand-area">
        <div class="container">
            <div class="brand-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/CE.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/ISO.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/PGMEA.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/SCCI.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/Sedex.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/asset13.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/asset11.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('assets/img/brand/asset12.png') }}" alt="brand_logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->
@endsection
