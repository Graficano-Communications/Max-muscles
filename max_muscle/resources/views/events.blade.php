@extends('layouts.master')

@section('title', 'News & Events')


@section('content')
    <!-- contact area start -->
    <div class="contact__area" style="padding: 90px;background-image: url('{{ asset('assets/img/Events.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="contact__content text-center">
                        <h2 class="text-white">News & Events</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- contact area end -->
    <!-- blog area start  -->
    <div class="blog__area mb-100 pt-80">
        <div class="container">
            <div class="row">
                @if (count($events))
                    @foreach ($events as $key => $event)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="bigpost-wrapper">
                                <div class="grid_blog mb-40 text-center">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('images/events/' . $event->image) }}" alt="">
                                        <div class="grid_blog__content">
                                            <h4 class="pt-20">{{ $event->title }}</h4>
                                            <h2 class="b-title mb-20"></h2>
                                            {!! $event->description !!}
                                            <div class="post-meta pt-10">
                                                <p> Date: <span>
                                                        {{ \Carbon\Carbon::parse($event->date_time)->format('d M Y ') }}
                                                    </span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- blog area end  -->


@endsection
