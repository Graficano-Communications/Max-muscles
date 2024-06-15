@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('banners.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" class="form-control" id="caption" name="caption"
                                    aria-describedby="emailHelp" placeholder="baner caption.." required>
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    banner.</small>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Mobile Image</label>
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
