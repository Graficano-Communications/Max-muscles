@extends('admin.layouts.app')



@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">
        <div class="col-md-10">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>

                    <li class="breadcrumb-item"><a href="{{ route('history.index') }}">history</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Create</li>

                </ol>

            </nav>
          </div>
          <div class="col-md-2">
              <div class="text-right">
                  <a href="{{ route('blog.create') }}">
                      <button style="float:right;width:100%" type="button" class="btn bg-gradient-info  mb-0">Add New</button>
                  </a>
              </div>
          </div>
          <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <form action="{{ route('history.store') }}" method="post" enctype="multipart/form-data">

                        <div class="form-group">


                            <div class="form-group">
                                <label for="title">Year</label>
                                <input type="text" class="form-control" required="" id="title" name="year"
                                    placeholder="Enter History year">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" required="" id="title" name="title"
                                    placeholder="Enter History title">
                            </div>

                            

                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="editor1"></textarea>
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
