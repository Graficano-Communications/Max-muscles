<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Elite Impex" />
	<meta name="description" content="Elite Impex">
	<link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Elite Impex - @yield('title')</title>

	<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
	@yield('styles')
	<style>
		.timeline .timeline-item .timeline-icon {
			left: -16px;
			width: 60px;
			height: 47px;
			padding: 12px;
			font-size: 19px;
			font-weight: bold;
		}
		
		.heading-text.heading-section h2::before {
			background-color: #09c5e2;
		}
		.parallax-section{
			padding: 250px 0px ;
		}
		.main-banner{
			background-image:url({{ asset('assets/images/main-banner-latest.jpg') }});
		}
		.footer-banner{
			background-image:url({{ asset('images/footer-bg.png') }});
		}
		#mainMenu nav > ul > li.hover-active > a, #mainMenu nav > ul > li.hover-active > span, #mainMenu nav > ul > li.current > a, #mainMenu nav > ul > li.current > span, #mainMenu nav > ul > li:hover > a, #mainMenu nav > ul > li:hover > span, #mainMenu nav > ul > li:focus > a, #mainMenu nav > ul > li:focus > span {
			color: #4cdbf1;
		}
		a:not(.btn):not(.badge):hover, a:not(.btn):not(.badge):focus, a:not(.btn):not(.badge):active {
			color: #06c5e1;
		}
		@media(max-width:768px) {
			.parallax-section{padding: 45px 0px ;}
			.main-banner{
			background-image:url({{ asset('assets/images/main-banner-latest.jpg') }});
		}
		.footer-banner{
			background-image:url({{ asset('images/footer-bg-new.png') }});
		}
		}

	</style>
</head>

<body>

	<div class="body-inner">

		<header id="header" data-fullwidth="true" class="header-alternative">
			<div class="header-inner">
				<div class="container">

					<div id="logo">
						<a href="/">
							<img src="{{ asset('assets/images/logo-img.png') }}" class="logo-default">
							<img src="{{ asset('assets/images/logo-img.png') }}" class="logo-dark">
						</a>
					</div>


					<div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i
								class="icon-x"></i></a>
						<form class="search-form" action="#"
							method="get">
							<input class="form-control" name="q" type="text" placeholder="Type & Search..." />
							<span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
						</form>
					</div>


					<div id="mainMenu-trigger">
						<a class="lines-button x"><span class="lines"></span></a>
					</div>


					<div id="mainMenu" class="menu-center menu-lowercase">
						<div class="container">
							<nav>
								<ul>
									<li><a href="/">Home</a></li>
									<li><a href="{{ route('about') }}">About</a></li>
									<li><a href="{{ route('departments') }}">Departments</a></li>
									<li class="dropdown"><a href="#">Products</a>
										<ul class="dropdown-menu">

										   @php $cats = \App\Models\Category::all()->sortBy('sequence'); @endphp
                                            @foreach($cats as $cat)
                                            <li class="dropdown-submenu"><a href="{{route('category',$cat->slug) }}">{{ $cat->name }}</a>
                                                <ul class="dropdown-menu">
                                                    @php $subcategory = \App\Models\Subcategory::where('category_id',$cat->id)->get()->sortBy('sequence') @endphp
                                                    @foreach($subcategory as $subcat)
                                                    <li><a href="{{ route('subcategory',[$cat->slug ,$subcat->slug]) }}">{{ $subcat->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>  
                                            </li>
                                            @endforeach
											
										</ul>
									</li>
									<li><a href="{{ route('events') }}">News & Events</a></li>
									<li><a href="{{ route('resources') }}">Catalogues</a></li>
									<li><a href="{{ route('media') }}">Media Gallary</a></li>
									<li><a href="{{ route('contact') }}">Contact Us</a></li>
								</ul>
							</nav>
						</div>
					</div>

				</div>
			</div>
		</header>

		@yield('content')

		<footer id="footer">
			<div class="footer-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="widget">
								<div class="widget-title"> <img src="{{ asset('assets/images/logo-img.png') }}" class="img-fluid"
										style="height: 50px;"></div>
								<p class="mb-5">ELITE IMPEX was established in 2013.After so many years of experience and success; we are confidently
									inviting your esteemed organization to be our business partner. <br>
									<br>All rights reserved. Copyright © 2022. Elite Impex.</p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="row">
								
								<div class="col-lg-4">
									<div class="widget">
										<div class="widget-title">Products</div>
										<ul class="list">
											
                                            @foreach($cats as $cat)
                                            	<li ><a href="{{route('category',$cat->slug) }}">{{ $cat->name }}</a>
                                            @endforeach
											
										</ul>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="widget">
										<div class="widget-title">Pages</div>
										<ul class="list">
											<li><a href="{{ route('events') }}">Events</a></li>
											<li><a href="{{ route('resources') }}">Catalogues</a></li>
											<li><a href="{{ route('departments') }}">Departments</a></li>
											<li><a href="{{ route('media') }}">Media Gallary</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="widget">
										<div class="widget-title">Support</div>
										<ul class="list">
											<li><a href="{{ route('about') }}">About Us</a></li>
											<li><a href="{{ route('contact') }}">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-content">
				<div class="container">
					<div class="copyright-text text-center">&copy; 2022 Eliteimpex
						All Rights Reserved.<a href="http://graficano.com/" target="_blank" rel="noopener">
							Graficano</a> </div>
				</div>
			</div>
		</footer>

	</div>
	<a style=" position: fixed; width: 60px; height: 60px;bottom: 65px;right: 15px;border-radius: 50px;text-align: center; font-size: 30px;z-index: 100;" href="https://wa.me/923315015757?text=Hi%20I%20have%20a%20query.%20can%20you%20help%20me?" class="floaticon" target="_blank">
        <img src="{{ asset('images/whts.png') }}" class="img-fluid float-right">
    </a>

	<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

	<script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/plugins.js') }}"></script>

	<script src="{{ asset('assets/js/functions.js') }}"></script>

	<script src="{{ asset('assets/plugins/particles/particles.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/particles/particles-dots.js') }}" type="text/javascript"></script>
</body>

</html>