@extends('layouts.master')

@section('title', $blog->title)


@section('content')

<div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">

	<div class="slide kenburns" style="background-image:url('{{ asset('images/blog/' . $blog->banner_image) }}');">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="slide-captions text-center text-light">
				<h1>{{ $blog->title }}</h1>

			</div>
		</div>
	</div>

</div>


	<section id="page-content" class="sidebar-right">
		<div class="container">
			<div class="row">

				<div class="content col-lg-9">

					<div id="blog" class="single-post">

						<div class="post-item">
							<div class="post-item-wrap">
								
								<div class="post-item-description">
									<h2>{{ $blog->title }}</h2>

									{!! $blog->content !!}
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>
@endsection
