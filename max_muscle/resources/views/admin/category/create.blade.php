@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav> 
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required=""
                                    placeholder="Category Name..">
                            </div>
                            <div class="form-group">
                                <label for="image">Product Page Banner</label>
                                <input type="file" class="form-control" name="image" id="image" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Banner Image </label>
                                <input type="file" class="form-control" name="banner_image" id="banner_image"  required>
                            </div>
                            <div class="form-group field_wrapper">
                                <label for="subcategory">Subcategories<a href="javascript:void(0);" class="add_button"
                                        title="Add fields">&nbsp;&nbsp;<i class="fa fa-plus-square"></i></a></label>
                                <div> <input type="text" class="form-control " id="subcategory" name="subcategory[]"
                                        required="" placeholder="Enter Subcategory Name"></div>
                                <div>
                                    <label for="image">Subcategory Image <strong style="color: red">Optional (800px *
                                            524px)</strong></label>
                                    <input type="file" class="form-control" name="subcat_image" id="image">
                                </div>
                                <br>
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
            var fieldHTML ='<div><input type="text" class="form-control" name="subcategory[]" /><label for="image">Subcategory Image <strong style="color: red">Optional (800px * 524px)</strong></label><input type="file" class="form-control" name="subcat_image" id="image"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-square"></i></a></div><br> '; //New input field html  
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
