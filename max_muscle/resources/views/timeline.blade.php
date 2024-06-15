@extends('layouts.master')
@section('title', 'home') 

@section('content')
<section id="page-title">
	<div class="container">
		<div class="page-title">
			<h1>Timeline</h1>
		</div>
		<div class="breadcrumb">
			<ul>
				<li><a href="#">Home</a> </li>
				<li class="active"><a href="#">Timeline</a> </li>
			</ul>
		</div>
	</div>
</section>
<section id="page-content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="content col-lg-8">

				<ul class="timeline">
					@foreach($timelines as $key => $timeline)
					
					<li class="timeline-item">
						<div class="timeline-icon">{{ $timeline->year }}</div>
						<h4>{{ $timeline->title }}</h4>
						<div class="timeline-item-date">{{ $timeline->year }}</div>
						{!!  $timeline->description !!}
					</li>

					@endforeach
			
				</ul>

			
			</div>
		</div>
	</div>
</section>


@endsection