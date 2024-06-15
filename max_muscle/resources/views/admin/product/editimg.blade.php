@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateimg', $img->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input class="form-control" type="text" name="color" value="{{ $img->color }}"
                                placeholder="color Code">
                        </div>
                        <div class="form-group">
                            <label for="color">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $img->name }}"
                                placeholder="color Code">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>

                            @php $imags = json_decode( $img->images); @endphp
                            <div class="row">
                                @foreach ($imags as $imag)
                                    <div class="col-2">
                                        <a href="{{ route('deleteimg', [$imag, $img->id]) }}">Delete</a>
                                        <img src="{{ asset('images/products/' . $imag) }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <input type="hidden" name="product_id" value="{{ $img->product_id }}">
                            <div class="form-group">
                                <label for="image" style="color: black">Images <a href="javascript:void(0);"
                                        class="add_button" style="background-color: black;color:white;padding:4px;"
                                        title="Add field">+</a></label>
                                <div class="field_wrapper">
                                    <div><input type="file" class="form-control-file" name="images[]" id="image"></div>
                                </div>
                            </div>


                        </div>



                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 20; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<div><input type="file" class="form-control-file"  required="" name="images[]" id="image" required=""><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a> </div>'; //New input field html 
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection
