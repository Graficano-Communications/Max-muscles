@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories
                                - <small style="color: #eb252a;">count( {{ $categories->count() }} )</small></a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2">
                <div class="text-right">
                    <a href="{{ route('categories.create') }}">
                        <button style="float:right;width:100%" type="button" class="btn bg-gradient-info  mb-0">Add New</button>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <table class="table table-striped bg-white">
                    <thead>
                        <tr>
                            <th scope="col">Sort</th>
                            <th scope="col">Name</th>
                            <th scope="col">Product Page Banner</th>
                            <th scope="col">Home Page Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="CategorySortable"> 

                        @foreach ($categories as $key => $category)
                            <tr id="{{ $category->id }}">
                                <td class="handle"><a class="btn" style="cursor:move"><i
                                            class="fa fa-align-justify"></i></a></td>
                                <td>{{ $category->name }}</td>
                                <td><img src="{{ asset('images/category/' . $category->image) }}" class="img-resposive"
                                         height="50px"></td>
                                <td><img
                                        src="{{ asset('images/category/banner_image/' . $category->banner_image) }}"
                                        class="img-resposive"  height="50px"></td>
                                <td style="display: flex;">
                                    <a href="{{ route('view_sub_category', $category->id) }}"
                                        title="View Subcategories"><button class="btn btn-primary" type="button"><i
                                                class="fa fa-eye"></i></button></a>
                                    <a href="{{ route('categories.edit', $category->id) }}" title="Edit"><button
                                            class="btn btn-success" type="button"><i class="fa fa-pencil"></i></button></a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <button title="Delete" class="btn btn-danger" type="submit"
                                            onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('specificscripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#CategorySortable").sortable({
                delay: 150,
                stop: function() {
                    var selectedData = new Array();
                    $('#CategorySortable>tr').each(function() {
                        selectedData.push($(this).attr("id"));
                    });
                    updateOrder(selectedData);
                }
            });
        });

        function updateOrder(data) {
            var token = document.getElementById('csrf-token').value;
            var ajaxurl = '{{ route('sort_category') }}';
            var data = {
                'data': data,
                '_token': token
            };
            // console.log(data);
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: data,
                success: function(data) {
                    // console.log(data);
                    // alert('your change successfully saved');
                }
            })
        }
    </script>
@stop
