@extends('layouts.master')

@section('title', 'Blogs')


@section('content')
    <section id="page-title" class="text-light" data-bg-parallax="{{ asset('assets/images/banners/Blog.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>Blogs</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active"><a href="#">Blogs</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

            <section id="page-content" class="sidebar-right">
                <div class="container"> 
                    <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item" data-stagger="10">
                        @php $blogs = \App\Models\Blog::all()->sortby('sequence') @endphp
						@foreach($blogs as $key => $blog)
						<div class="post-item border">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a href="{{ route('blog.details',$blog->slug) }}">
                                        <img alt="" src="{{ asset('images/blog/' . $blog->thumbnail_image) }}">
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <h2><a href="{{ route('blog.details',$blog->slug) }}">{{ $blog->title }}
                                        </a></h2>
                                  
                                    <a href="{{ route('blog.details',$blog->slug) }}" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

						@endforeach
                       
                    </div>

                </div>

            </section>

      
@endsection
