@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-white">
            <div class="col-md-3 bg-white">
                @include('admin.layouts.sidemenu')
            </div>
        </div>
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>

            <div class="container">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <table class="table table-striped bg-white">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Color</th>
                            <th scope="col">Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imgs as $key => $img)
                            <tr>
                                <th scope="row">{{ $key++ }}</th>
                                <td>{{ $img->color }}</td>
                                <td><img src="{{ asset('images/products/' . $img->image) }}" class="img-resposive"
                                        width="100px" height="100px"></td>
                                <td>
                                    <a href="{{ route('editimg', $img->id) }}"><button class="btn btn-success"
                                            type="button">Edit</button></a>
                                    <form action="{{ route('delimg', [$img->id, $img->product_id]) }}" method="post">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
