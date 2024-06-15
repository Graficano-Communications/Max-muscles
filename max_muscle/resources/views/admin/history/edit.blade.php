@extends('admin.layouts.app')



@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">



            <div class="col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('history.index') }}">history</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Edit</li>

                    </ol>

                </nav>

                <div class="panel panel-default">

                    <div class="panel-body">

                        <form action="{{ route('history.update', $historys->id) }}" method="post"
                            enctype="multipart/form-data">

                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Year</label>
                                <input type="text" class="form-control" value="{{ $historys->year }}" id="title" name="year"
                                    placeholder="Enter History year">
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" required="" id="title" name="title"
                                    value="{{ $historys->title }}" placeholder="Enter History title">
                            </div>

                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="editor1">{!! $historys->description !!}</textarea>
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
