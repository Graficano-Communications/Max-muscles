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
    <li class="breadcrumb-item"><a href="{{route('catlogs.index')}}">Catalogues</a>
    - <small style="color: #eb252a;">count( {{$catlogs->count()}} )</small></li>
      </ol>
</nav>

 <div class="container">

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
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">File</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="catlogSortable">
    @foreach($catlogs as $key => $catlog)
    <tr id="{{$catlog->id}}">
    <td class="handle"><a class="btn" style="cursor:move"><i class="fa fa-align-justify"></i></a></td>
      <td>{{$catlog->name}}</td>
      <td><img src="{{ asset('images/pdf/' . $catlog->image)}}"  class="img-resposive"  width="100px" height="100px" ></td> 
      <td>{{$catlog->file}}</td>
      <td style="display: flex">
        <a href="{{route('catlogs.edit',$catlog->id)}}"><button class="btn btn-success" type="button"><i class="fa fa-pencil" ></i></button></a>
                <form action="{{route('catlogs.destroy',$catlog->id)}}" method="post">
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
       </div>
    </div>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
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

  $( "#catlogSortable" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('#catlogSortable>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    }); 
});

function updateOrder(data) {
      var token = document.getElementById('csrf-token').value;
      var ajaxurl = '{{route('sort_catlog')}}';
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
