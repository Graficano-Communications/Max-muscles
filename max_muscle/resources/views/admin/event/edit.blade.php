@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('events.index') }}">Events </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}"
                                    required="" placeholder="Title ..">
                            </div>
                            <div class="form-group">
                              <label for="end_date">Select Type</label>
                              <select class="form-control" name="type">
                                <option value="current" @if($event->type == "current") selected @endif>Current</option>
                                <option value="previous"  @if($event->type == "previous") selected @endif>Previous </option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="Details About Cayegory">{{ $event->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" value="{{ $event->location }}" id="location"
                                    name="location" required="" placeholder="location ..">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') }}"
                                    class="form-control" id="start_date" name="start_date" required="">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') }}"
                                    class="form-control" id="end_date" name="end_date" required="">
                            </div>

                            <img src="{{ asset('images/events/' . $event->image) }}" class="img-resposive" height="100px">
                            <div class="form-group">
                                <input type="hidden" name="old_img" value="{{ $event->image }}">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
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
