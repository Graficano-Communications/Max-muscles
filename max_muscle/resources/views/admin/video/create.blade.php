@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required=""
                                    aria-describedby="emailHelp" placeholder="Video name..">
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on videos
                                    name.</small>
                            </div>

                            <div class="form-group">
                                <label for="caption">Video Url</label>
                                <input type="text" class="form-control" id="video_url" name="video_url" required=""
                                    aria-describedby="emailHelp" placeholder="Video Url..">
                                <small id="emailHelp" class="form-text text-muted">Url of your videos place in youtube
                                    etc..</small>
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
