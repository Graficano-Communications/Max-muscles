@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('image.index') }}">Images</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" class="form-control" id="caption" name="name" required=""
                                    aria-describedby="emailHelp" placeholder="Image name..">
                                <small id="emailHelp" class="form-text text-muted">Text that you want to apear on
                                    banner.</small>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="description" style="text-align: left;">Description</label>
                                <textarea type="text" class="form-control"  name="description" rows="5"
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
