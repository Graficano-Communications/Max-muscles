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
                        <form action="{{ route('ourteam.store') }}" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="caption">Name</label>
                                <input type="text" class="form-control" id="caption" name="name" required=""
                                    aria-describedby="emailHelp" placeholder="employer name...">
                                <small id="emailHelp" class="form-text text-muted">Write name of employer</small>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="caption">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required=""
                                    aria-describedby="emailHelp" placeholder="employer designation...">
                                <small id="emailHelp" class="form-text text-muted">Write designaiton of employer</small>
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
