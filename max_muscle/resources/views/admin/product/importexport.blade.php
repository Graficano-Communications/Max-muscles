@extends('admin.layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 bg-white">
            @include('admin.layouts.sidemenu')
            </div>
        </div>
        <div class="col-md-9">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Export Products</li>
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
      <form  action="exportprodcucts" enctype="multipart/form-data" method="post">

  <div class="form-group">
    <label for="copyfrom">Copy From</label>
    <select class="form-control" id="copyfrom" required="" name="copyfrom" onchange="validateCategory()">
      <option selected="" disabled="">Select</option>
      @foreach($subcats as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="copyto">Copy To</label>
    <select class="form-control" id="copyto" required="" name="copyto" onchange="validateCategory()">
      <option selected="" disabled="">Select</option>
      @foreach($subcats as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach
    </select>
    <span style="color:red;font-size: 12px;" id="error"> </span>
  </div>
  <div class="form-group">
    <label for="products">Products</label>
    <div id="products">
      
    </div>
    
  </div> 
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
          
       </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
  function validateCategory(){
    var copyfrom = document.getElementById("copyfrom");
    var copyto = document.getElementById("copyto");
    console.log(copyfrom.value);
    console.log(copyto.value);
    if(copyfrom.value != copyto.value) {
      console.log("condition true");
      copyto.setCustomValidity('');
      document.getElementById("error").innerHTML='';
      copyto.style.border = "2px solid green";
      copyfrom.style.border = "2px solid green";
      document.getElementById("products").style.display="block";
    } else {
      console.log("condition false");
      document.getElementById("products").style.display="none";
      copyto.setCustomValidity("You can't copy from same category!");
      document.getElementById("error").innerHTML="You can't copy from same category!";
       copyto.style.border = "2px solid red"; 
    }
  }
  
</script>
<script type="text/javascript">
$(document).ready(function () {

    $("#copyfrom").change(function () {
        var id = $(this).val();
        var ajaxurl = '{{route('producttocopy', ':id')}}';
        $('#products').empty(); 
        ajaxurl = ajaxurl.replace(':id', id);
        
        $.ajax({
        url: ajaxurl,
        type: "GET",
        success: function(data){
            $data = $(data); 
            console.log($data);
            if (!$.trim(data)){   
                 $('<p style="color:red;">No Products Found with this category</p>').appendTo('#products');}
            else{    
              
            for(var i=0 ; i< data.length ; i++) {
              $('<label><input name="products[]"  checked type="checkbox" value="'+data[i]['id'] +'">'+ '<img src="images/products/'+ data[i]['image']+'" style="height:80px">'
                +data[i]['name'] + ' | '+data[i]['prod_code']+' | '+data[i]['description']+'</label><br>').appendTo('#products');
            } }
            
        }   
    });
 });

});
</script>
@endsection