@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
         
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('department.update', $department->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}"
                                required="" placeholder="department Name..">
                        </div> 
                        <div class="form-group col-11">
                            <label for="slug">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ $department->url }}"
                                required="" placeholder="department Url..">
                        </div>
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="texteditor" name="description" rows="5"
                            placeholder="">{{ $department->description }}</textarea>
                        
                        <div class="form-group">
                            <input type="hidden" name="old_img" value="{{ $department->home_page_icon }}">
                            <label for="image">Home Page Image <strong style="color: red">(800px * 524px)</strong></label><br>
                            <img src="{{ asset('images/department/' . $department->home_page_icon) }}" class="img-resposive"
                            height="100px"><br>
                            <input type="file" class="form-control" name="home_page_icon" id="home_page_icon">
                        </div>
                        
                        <div class="form-group" >
                            <input type="hidden" name="old_banner_image" value="{{ $department->banner_image }}">

                            <label for="image">Small Image <strong style="color: red">(484px * 329px)</strong></label><br>
                            <img src="{{ asset('images/department/' . $department->banner_image) }}" class="img-resposive"
                            height="100px"><br>
                            <input type="file" class="form-control" name="banner_image" id="banner_image">
                        </div>
                        <div class="row">
                            @foreach(json_decode($department->images) as $key => $value)
                                <div class="col-md-2">
                                    <a href="{{route('delimgdept',[$value,$department->id ])}}"><button style="float: right;" type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></a>
                                    <img src="{{ asset('images/department/' . $value) }}" class="img-resposive" height="100px">
                                </div>
                            @endforeach
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
                        <br><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

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
