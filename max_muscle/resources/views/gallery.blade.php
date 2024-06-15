@extends('layouts.master')

@section('title', 'Media Gallery')


@section('content')

	<section id="page-title" data-bg-parallax="{{ asset('assets/images/banners/media.png') }}">
		<div class="container">
			<div class="page-title">
				<h1>Media Gallery</h1>
				
			</div>
			<div class="breadcrumb">
				<ul>
					<li><a href="/">Home</a>
					</li>
					<li class="active"><a href="#">Media Gallery</a>
					</li>
				</ul>
			</div>
		</div>
	</section>


	<section id="page-content">
		<div class="container-fluid">
			@php $media = App\Models\Media::all()->sortby('sequence');  @endphp
			@if(count($media))
			<div class="grid-layout grid-5-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
				
				@foreach($media as $key => $image)
					<div class="grid-item">
						<a class="image-hover-zoom" href="{{ asset('images/gallary/' . $image->image) }}" data-lightbox="gallery-image">
							<img src="{{ asset('images/gallary/' . $image->image) }}"></a>
					</div>
				@endforeach
				
			</div>
			@else
				<p>No media found..!!</p>
			@endif

		</div>
	</section>
	@php $videos = App\Models\Video::all()->sortby('sequence');  @endphp
	@if(count($videos))
	<section id="page-title" data-bg-parallax="{{ asset('assets/images/banners/media.png') }}">
		<div class="container">
			<div class="page-title">
				<h1>Video Gallery</h1>
				
			</div>
		</div>
	</section>

	<section id="page-content">
		<div class="container-fluid">
			<div class="row">
				
				@foreach($videos as $key => $video)
					<div class="col-md-6">
						<iframe src="https://www.youtube.com/embed/0rXPNkZj8Hw  {{substr($video->link, strpos($video->link, "=") + 1)}} " width="500" height="281" frameborder="0"
                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				@endforeach 
				
			</div>
			
		</div>
	</section>
	@endif
@endsection
