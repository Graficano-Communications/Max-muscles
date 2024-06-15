@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('banners.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('banners.update', $banner->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" class="form-control" id="caption" value="{{ $banner->caption }}"
                                    name="caption" aria-describedby="emailHelp" placeholder="baner caption.." required>
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    banner.</small>
                            </div>

                            <div class="form-group">
                                <label for="image">New Image</label><br>
                                <input type="hidden" name="old_img" value="{{ $banner->image }}">
                                <img src="{{ asset('images/slider/' . $banner->image) }}" class="img-resposive"
                                    height="150px"><br><br>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>

                            <div class="form-group">
                                <label for="image">New Mobile Image</label><br>
                                <input type="hidden" name="old_mobile_img" value="{{ $banner->mobile_image }}">
                                <img src="{{ asset('images/slider/' . $banner->mobile_image) }}" class="img-resposive"
                                    height="150px"><br><br>
                                <input type="file" class="form-control" name="mobile_image" id="mobile_image" required>
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
