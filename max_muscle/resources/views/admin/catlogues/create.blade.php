@extends('admin.layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3 bg-white" >
            @include('admin.layouts.sidemenu')
            </div>
        </div> 
        <div class="col-md-9"> 
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('catlogs.index')}}">Catalogues</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<div class="panel panel-default">
  <div class="panel-body">
       <form enctype="multipart/form-data" action="{{route('catlogs.store')}}"  method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" required="" id="name" name="name" placeholder="Enter Catlogue Name">  
  </div>
  
  
    <div class="form-group">
    <label for="pdf">Pdf</label>
    <input type="file" class="form-control" required="" id="pdf" name="pdf" accept="application/pdf">  
  </div>
   <div class="form-group">
          <label for="size">Image</label>
          <div> <input class="form-control" type="file" name="image"> 
       </div>
      </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" required="" id="password" name="password" placeholder="Enter Password ">  
  </div>
  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" required="" id="confirm_password" name="confirm_password" placeholder="Confrim Password ">  
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
<script>
    var password = document.getElementById("password");
    var confirmpassowrd = document.getElementById("confirm_password");
    function validatePassword(){
        if(password.value != confirmpassowrd.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;



</script>

	
@endsection