@extends('layout')
@section('page-title', 'Show Product')
@section('content')

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}" readonly>
    </div>
    <div class="mb-3">
        <label>Category</label>
        <input type="text" name="name" class="form-control" value="{{$product->Category->name}}" readonly>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{$product->price}}" readonly>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" class="form-control" value="{{$product->description}}" readonly>
    </div>
    <div class="mb-3">
        <label>Picture</label>
        <img class="img-thumbnail d-block" style="max-width: 35vh;" src="{{asset('product_image/'.$product->image)}}" alt="">
    </div>
    <a href="{{route('product.index')}}" class="btn btn-info">Back</a>


@endsection
