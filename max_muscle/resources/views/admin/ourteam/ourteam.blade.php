@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('ourteam.index') }}">Our Team
                                - <small style="color: #eb252a;">count( {{ $ourteams->count() }} )</small></a></li>
                    </ol>
                </nav>
              </div>
              <div class="col-md-2">
                  <div class="text-right">
                     <a href="{{ route('ourteam.create') }}">
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
                                <th scope="co l">Image</th>
                                <th scope="col">designation</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ourteamsortable">
                            @foreach ($ourteams as $key => $ourteam)
                                <tr id="{{ $ourteam->id }}">
                                    <td class="handle"><a class="btn" style="cursor:move"><i
                                                class="fa fa-align-justify"></i></a></td>
                                    <td>{{ $ourteam->name }} </td>
                                    <td><img src="{{ asset('images/ourteam/' . $ourteam->image) }}" class="img-resposive"
                                            height="50px"></td>
                                    <td>{!! $ourteam->designation !!}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('ourteam.edit', $ourteam->id) }}"><button class="btn btn-success"
                                                type="button"><i class="fa fa-pencil"></i></button></a>
                                        <form action="{{ route('ourteam.destroy', $ourteam->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
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

            $("#ourteamsortable").sortable({

                delay: 150,
                stop: function() {
                    var selectedData = new Array();
                    $('#ourteamsortable>tr').each(function() {
                        selectedData.push($(this).attr("id"));
                    });
                    updateOrder(selectedData);
                }
            });
        });

        function updateOrder(data) {
            var token = document.getElementById('csrf-token').value;
            var ajaxurl = '{{ route('sort_ourteam') }}';
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
