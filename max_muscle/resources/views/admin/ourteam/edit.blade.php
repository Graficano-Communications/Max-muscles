@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ourteam.index') }}">Our Team</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('ourteam.update', $ourteam->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="caption">Name</label>
                                <input type="text" class="form-control" id="caption" value="{{ $ourteam->name }}"
                                    name="name" required="" aria-describedby="emailHelp" placeholder="baner caption..">
                                <small id="emailHelp" class="form-text text-muted">Write employer name...</small>
                            </div>


                            <div class="form-group">
                                <label for="image">New Image</label>
                                <input type="hidden" name="old_img" value="{{ $ourteam->image }}"><br>
                                <img src="{{ asset('images/ourteam/' . $ourteam->image) }}" class="img-resposive"
                                    height="150px"><br>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="caption" value="{{ $ourteam->designation }}"
                                    name="designation" aria-describedby="emailHelp" placeholder="baner caption..">
                                <small id="emailHelp" class="form-text text-muted">Write employer designation...</small>
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
