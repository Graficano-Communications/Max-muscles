@extends('layouts.master')
@section('title', 'home')

@section('content')

<section id="page-title" data-bg-parallax="{{ asset('assets/images/parallax/5.jpg') }}">
    <div class="parallax-container img-loaded" data-bg="{{ asset('assets/images/parallax/5.jpg') }}" data-velocity="-.140"
        style="background: rgba(0, 0, 0, 0) url(&quot;{{ asset('assets/images/parallax/5.jpg') }}&quot;) repeat scroll 0% 0%;"
        data-ll-status="loaded"></div>
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="page-title">
            <h1 class="text-uppercase text-medium">OUR DEPARTMENTS</h1>
        </div>
    </div>
</section>

	
	<section>
       
        <div class="container">
            <div class="row">
                @foreach($departments as $key => $department)
                <div class="col-md-4">
                    <div class="grid-layout grid-1-columns grid-loaded" data-margin="20" data-item="grid-item"
                        data-lightbox="gallery" style="margin: 0px -20px -20px 0px; position: relative; height: 838.2px;">
                        @foreach(json_decode($department->images) as $key => $value)
                        <div class="grid-item" style="padding: 0px 20px 20px 0px; position: absolute; left: 0px; top: 0px;">
                            <a class="image-hover-zoom" href="{{ asset('images/department/' . $value) }}" data-lightbox="gallery-image"><img
                                    src="{{ asset('images/department/' . $value) }}"></a>
                        </div>
                        @endforeach
                      
                    </div>
                    <div class="heading-text heading-line text-center">
                        <h5 style="text-transform:uppercase;font-weight:bold;">{{ $department->name }}</h5>  
                    </div> 
                </div>
                @endforeach
            </div>
			

        </div>
    </section>
	
	
@endsection
