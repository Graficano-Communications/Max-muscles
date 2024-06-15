@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required=""
                                    aria-describedby="emailHelp" placeholder="Blog name..">
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    blog.</small>
                            </div>

                            <div class="form-group">
                                <label for="image">Banner Image</label>
                                <input type="file" class="form-control" name="banner_image" id="banner_image">
                            </div>

                            <div class="form-group">
                                <label for="image">Thumbnail Image</label>
                                <input type="file" class="form-control" name="thumbnail_image" id="thumbnail_image">
                            </div>

                            <div class="form-group">
                                <label for="description" style="text-align: left;">Description</label>
                                <textarea type="text" class="tinymce" id="texteditor" name="description" rows="5"
                                    placeholder="">{{ old('description') }}</textarea>
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
