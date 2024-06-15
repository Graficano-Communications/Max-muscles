@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $product->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Color Views</li>
                    </ol>
                </nav>

                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- ==============FORM ==================== -->
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('add_img') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="color" style="color: black">Color</label>
                                    <small class="form-text text-muted"> You can add multiple colors comma separated such as
                                        "red , black , green"</small>
                                    <input class="form-control" type="text" name="color" placeholder="color Code" required>
                                </div>
                                <div class="form-group">
                                    <label for="image" style="color: black">Images <a href="javascript:void(0);"
                                            class="add_button" style="background-color: black;color:white;padding:4px;"
                                            title="Add field">+</a></label>
                                    <div class="field_wrapper">
                                        <div><input type="file" class="form-control-file" name="images[]" id="image"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </form>
                        </div>
                    </div>
                    <!-- ===============Form End -->
                    <div class="row" style="margin-top: 4%">
                        @foreach ($imgs as $key => $img)
                            <div class="col-md-12">
                                @php $imags = json_decode($img->images); @endphp
                                <div class="row">
                                    @foreach ($imags as $imag)
                                        <div class="col-4">
                                            <img src="{{ asset('images/products/' . $imag) }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>

                                <p>{{ $img->color }}</p>
                                <div style="display: flex">
                                    <a href="{{ route('editimg', $img->id) }}" title="Edit"><button
                                            class="btn btn-success" type="button"><i class="fa fa-pencil"></i></button></a>
                                    <form action="{{ route('delimg', [$img->id, $img->product_id]) }}" method="post">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <button class="btn btn-danger" type="submit" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
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
