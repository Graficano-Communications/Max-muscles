@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <div class="panel panel-default">
            <div class="panel-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('products.update',$product->id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name"
                            required="" placeholder="Product Name..">
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" name="feature" @if($product->feature == 1) checked @endif >Feature
                            Product</label>
                    </div>
                    <div class="form-group">
                        <label for="slug">URL</label>
                        <input type="text" class="form-control" value="{{ $product->slug }}" id="slug" name="slug"
                            required="" placeholder="">
                        <small id="slug-help" class="form-text text-muted">It must be unique.</small>
                    </div>

                    @php
                        $category = \App\Models\Category::all()
                    @endphp

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" required="" name="category">
                            @if(\App\Models\Category::find($product->category_id))
                                <option selected="" value="{{ $product->category_id }}">
                                    {{ \App\Models\Category::findOrFail($product->category_id)->name }}</option>
                            @endif
                            <option value="select">Select</option>
                            @foreach($category as $cat)
                              
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sub_category">Sub Category</label>
                        <select class="form-control" id="sub_category" required="" name="sub_category">
                            @if(\App\Models\Subcategory::find($product->subcategory_id))
                                <option selected="" value="{{ $product->subcategory_id }}">
                                    {{ \App\Models\Subcategory::findOrFail($product->subcategory_id)->name }}
                                </option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="tinymce" id="texteditor" name="description" rows="5"
                            placeholder="">{{ $product->description }}</textarea>
                    </div>
                    
                    <div class="form-group">
                     <label for="sizes">Size Image</label><br>
                     @if($product->size_image)
                     <img src="{{ asset('images/products/size_charts/' . $product->size_image)}}"  class="img-resposive"  height="300px" >
                     <input type="hidden" name="old_size_chart" value="{{$product->size_image}}">
                     @endif

                     <div><input type="file" class="form-control" name="size_image" id="size_image"></div>
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
    $(document).ready(function () {

        $("#slug").focusout(function () {
            console.log('focusout');
            var slug = $(this).val();
            var ajaxurl1 =
                '{{ route('check_product_url', ':slug') }}';
            ajaxurl1 = ajaxurl1.replace(':slug', slug);
            $.ajax({
                url: ajaxurl1,
                type: "GET",
                success: function (data) {
                    $data = $(data);
                    console.log(data);
                    if (data == "true") {
                        console.log('Condition true');
                        document.getElementById("slug").style.borderColor = "red";
                        document.getElementById("slug").setCustomValidity(
                            'URL must be unique.. try another..');
                        alert("URL must be unique.. try another..");
                    } else {
                        console.log('Condition false');
                        document.getElementById("slug").style.borderColor = "grey";
                        document.getElementById("slug").setCustomValidity('');
                    }

                }
            });


        });


        $("#category").change(function () {
            var id = $(this).val();
            var ajaxurl =
                '{{ route('sub_category', ':id') }}';
            $('#sub_category').empty();
            ajaxurl = ajaxurl.replace(':id', id);

            $.ajax({
                url: ajaxurl,
                type: "GET",
                success: function (data) {
                    $data = $(data);

                    for (var i = 0; i < data.length; i++) {
                        $('<option value="' + data[i]['id'] + '">' + data[i]['name'] +
                            '</option>').appendTo('#sub_category');
                    }

                }
            });
        });

    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 20; //Input fields increment limitation
        var addButton = $('.add_button2'); //Add button selector
        var wrapper = $('.field_wrapper2'); //Input field wrapper
        var fieldHTML =
            '<div class="field_wrapper2"><div><input type="text" class="form-control" name="sizes[]" id="size"></div><a href="javascript:void(0);" class="remove_button2"><i class="fa fa-minus-square"></i></a></div></div>';

        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button2', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

</script>



@endsection
