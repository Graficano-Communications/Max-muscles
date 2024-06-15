@extends('admin.layouts.app')

@section('content')
    <div class="container">
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
                        <form action="{{ route('image.update', $image->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="caption">Name</label>
                                <input type="text" class="form-control" id="caption" value="{{ $image->name }}" name="name"
                                    required="" aria-describedby="emailHelp" placeholder="baner caption..">
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    banner.</small>
                            </div>


                            <div class="form-group">
                                <label for="image">New Image</label><br>
                                <input type="hidden" name="old_img" value="{{ $image->image }}">
                                <img src="{{ asset('images/gallary/' . $image->image) }}" class="img-resposive"
                                   height="250px">
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="description" style="text-align: left;">Description</label>
                                <textarea type="text" class="tinymce" id="texteditor" name="description" rows="5"
                                    placeholder="">{{ $image->description }}</textarea>
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
