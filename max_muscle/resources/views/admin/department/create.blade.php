@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Category</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required=""
                                placeholder="Category Name..">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="texteditor" name="description" rows="5"
                                placeholder="">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Home Page Image <strong style="color: red">(800px * 524px)</strong></label>
                            <input type="file" class="form-control" name="home_page_icon" id="image">
                        </div>
                        <div class="form-group">
                            <label for="image">Banner Image <strong style="color: red">(484px * 329px)</strong></label>
                            <input type="file" class="form-control" name="banner_image" id="banner_image">
                        </div>
                        <div class="form-group">
                            <label for="image">Other Images <a href="javascript:void(0);" class="add_button2"
                                    title="Add field">+</a></label>
                            <div class="field_wrapper2">
                                <div><input class="form-control" type="file" name="images[]" required=""
                                        placeholder="Image"></div>
                            </div>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    var maxField2 = 20; 
        var addButton2 = $('.add_button2'); 
        var wrapper2 = $('.field_wrapper2'); 


        var fieldHTML2 = '<div class="field_wrapper2"> <div><input class="form-control" type="file" name="images[]" required="" placeholder="Image" ></div><a href="javascript:void(0);" class="remove_image"><i class="fa fa-minus-square"></i></a></div>';
        
        var y = 1; 
        
        $(addButton2).click(function(){
            if(y < maxField2){ 
                y++; 
                $(wrapper2).append(fieldHTML2); 
            }
        });
        
        $(wrapper2).on('click', '.remove_image', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            y--; 
        });
    });
    </script>
@endsection
