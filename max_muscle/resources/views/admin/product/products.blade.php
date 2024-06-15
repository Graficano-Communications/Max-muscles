@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Products -
                                @php $prod_count = \App\Models\Product::all(); @endphp
                                <small style="color: #eb252a;">count( {{ $prod_count->count() }} )</small></a></li>
                    </ol>

                </nav>
              </div>
              <div class="col-md-2">
                  <div class="text-right">
                     <a href="{{ route('products.create') }}">
                        <button style="float:right;width:100%" type="button" class="btn bg-gradient-info  mb-0">Add New</button>
                     </a>
                    </div>
              </div>
              <div class="col-md-12">

                <div class="container-fluid">
                    <div class="row ">
                        @foreach ($categories as $cat)
                            <div class="col-md-3" style="padding: 1%">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ $cat->name }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @php
                                            $subcategory = \App\Models\Subcategory::where('category_id', $cat->id)
                                                ->get()
                                                ->sortBy('sequence');
                                        @endphp
                                        @foreach ($subcategory as $subcat)
                                            <a class="dropdown-item"
                                                href="{{ route('product_by_subcategory', $subcat->id) }}">{{ $subcat->name }}</a>
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
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th>URL</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th scope="row">{{ $key++ }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('products_images', $product->id) }}"><button
                                                class="btn btn-info" type="button" style="color: white"><i
                                                    class="fa fa-image"></i></button></a>
                                        <a href="{{ route('products.edit', $product->id) }}"><button
                                                class="btn btn-success" type="button"><i
                                                    class="fa fa-pencil"></i></button></a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <?php echo $products->render(); ?>
            </div>
        </div>
    </div>
@endsection
