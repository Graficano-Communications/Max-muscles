@extends('admin.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('department.index') }}">departments
                                - <small style="color: #eb252a;">count( {{ $departments->count() }} )</small></a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2">
                <div class="text-right">
                    <a href="{{ route('department.create') }}">
                        <button style="float:right;width:100%" type="button" class="btn bg-gradient-info  mb-0">Add New</button>
                    </a>
                </div>
            </div>
            <div class="col-md-12">

                <div class="container-fluid">
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
                                <th scope="col">Home Page Image</th>
                                <th scope="col">Banner Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="departmentSortable">

                            @foreach ($departments as $key => $department)
                                <tr id="{{ $department->id }}">
                                    <td class="handle"><a class="btn" style="cursor:move"><i
                                                class="fa fa-align-justify"></i></a></td>
                                    <td>{{ $department->name }}</td>
                                    <td><img src="{{ asset('images/department/' . $department->home_page_icon) }}"
                                            class="img-resposive" height="50px"></td>
                                    <td><img src="{{ asset('images/department/' . $department->banner_image) }}"
                                            class="img-resposive" height="50px"></td>
                                    <td style="display: flex;">
                                        <a href="{{ route('department.edit', $department->id) }}" title="Edit"><button
                                                class="btn btn-success" type="button"><i
                                                    class="fa fa-pencil"></i></button></a>&nbsp;
                                        <form action="{{ route('department.destroy', $department->id) }}" method="post">
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

            $("#departmentSortable").sortable({
                delay: 150,
                stop: function() {
                    var selectedData = new Array();
                    $('#departmentSortable>tr').each(function() {
                        selectedData.push($(this).attr("id"));
                    });
                    updateOrder(selectedData);
                }
            });
        });

        function updateOrder(data) {
            var token = document.getElementById('csrf-token').value;
            var ajaxurl = '{{ route('sort_department') }}';
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
