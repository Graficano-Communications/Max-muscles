@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
             <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('view_sub_category', $subcategory->category_id) }}">Sub
                                Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $subcategory->name }}" required="" placeholder="Category Name..">
                                <input type="hidden" name="category_id" value="{{ $subcategory->category_id }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">URL</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $subcategory->slug }}" required="" placeholder="Category slug..">
                                <input type="hidden" name="category_id" value="{{ $subcategory->category_id }}">
                            </div>

                            <img src="{{ asset('images/subcategory/' . $subcategory->banner_image) }}" class="img-resposive"
                                height="100px">
                            <div class="form-group">
                                <input type="hidden" name="old_img" value="{{ $subcategory->banner_image }}">
                                <label for="image">Subcategory Image <strong style="color: red">(800px *
                                        524px)</strong></label>
                                <input type="file" class="form-control" name="subcat_image" id="image">
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
