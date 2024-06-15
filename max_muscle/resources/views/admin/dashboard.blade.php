@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-9">
                <h1>Welcome to dashboard !</h1>
                <div class="row text-center">
                    <div class="col-md-3 tab-menu"> <a href="{{ route('categories.index') }}"> Categories</a> </div>
                    <div class="col-md-3 tab-menu"><a href="{{ route('products.index') }}"> Products </a></div>
                    <div class="col-md-3 tab-menu"> <a href="{{ route('events.index') }}"> Events</a> </div>
                </div>

            </div>
        </div>
    </div>
@endsection
