@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('image.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('blog.update', $image->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="caption">Blog Name</label>
                                <input type="text" class="form-control" id="caption" value="{{ $image->title }}" name="name"
                                    required="" aria-describedby="emailHelp" placeholder="baner caption..">
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    banner.</small>
                            </div>


                            <div class="form-group">
                                <label for="image">Banner Image</label>
                                <input type="hidden" name="old_img" value="{{ $image->banner_image }}">
                                <img src="{{ asset('images/blog/' . $image->banner_image) }}" class="img-resposive"
                                     height="150px">
                                <input type="file" class="form-control" name="banner_image" id="banner_image">
                            </div>

                            <div class="form-group">
                                <label for="image">Thumbnail Image</label>
                                <input type="hidden" name="old_img2" value="{{ $image->thumbnail_image }}">
                                <img src="{{ asset('images/blog/' . $image->thumbnail_image) }}" class="img-resposive"
                                   height="150px">
                                <input type="file" class="form-control" name="thumbnail_image" id="thumbnail_image">
                            </div>

                            <div class="form-group">
                                <label for="description" style="text-align: left;">Description</label>
                                <textarea type="text" class="tinymce" id="texteditor" name="description" rows="5"
                                    placeholder="">{{ $image->content }}</textarea>
                            </div>


                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
