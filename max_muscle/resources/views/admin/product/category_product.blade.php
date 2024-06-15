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
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category->name}} - <small style="color: #eb252a;">count( {{$products->count()}} )</small></li>
  </ol>
</nav>

 <div class="container">
  <div class="row ">
     @foreach($categories as $cat)
     <div class="col-md-3" style="padding: 1%">
  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{$cat->name}}
  </a> 

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @php $subcategory = \App\Models\Subcategory::where('category_id',$cat->id)->get()->sortBy('sequence'); @endphp
    @foreach($subcategory as $subcat)
    <a class="dropdown-item" href="{{route('product_by_subcategory',$subcat->id)}}">{{$subcat->name}}</a>
    @endforeach
  </div>
</div>
</div>
@endforeach
</div>


  @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
</div>
@endif
  <table class="table table-striped bg-white">
  <thead>
    <tr>
      <th scope="col">Sort</th>
      <th scope="col">#</th>
      <th scope="col">Code</th>
      <th scope="col">Name</th>
      <th>URL</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="ProductSortable">
    @foreach($products as $key => $product)
    <tr id="{{$product->id}}">
      <td class="handle"><a class="btn" style="cursor:move"><i class="fa fa-align-justify"></i></a></td>
      <td>{{$product->sequence}}</td>
      <td>{{$product->code}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->slug}}</td>
       <td style="display: flex;">
         <a href="{{route('products_images',$product->id)}}" ><button class="btn btn-info" type="button" style="color: white"><i class="fa fa-image"></i></button></a>
        <a href="{{route('products.edit',$product->id)}}"><button class="btn btn-success" type="button"><i class="fa fa-pencil" ></i></button></a>
                <form action="{{route('products.destroy',$product->id)}}" method="post">
                     {{ method_field('delete') }}
                     @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o" ></i></button>
                </form>
            </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

       </div>
    </div>
</div>
@endsection
@section('specificscripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
  ui.children().each(function() {
    $(this).width($(this).width());
  });
  return ui;
};

  $( "#ProductSortable" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#ProductSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_products')}}';
      var data = {'data' : data , '_token' : token};
      // console.log(data);
        $.ajax({
            url:ajaxurl,
            type:'post',
            data:data,
            success:function(data){
               // console.log(data);
                // alert('your change successfully saved');
            }
        })
    }
</script>
@stop