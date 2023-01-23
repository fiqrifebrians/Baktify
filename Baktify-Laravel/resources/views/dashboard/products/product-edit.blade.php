@extends('layout')
@section('page-title', 'Edit Product')
@section('content')

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="id_category" class="form-control">
                <option>Select Category</option>
                @foreach ($category as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}">
        </div>
        <div class="mb-3">
            <label>Picture</label>
            <input type="file" name="image" accept="image/*" class="form-control">

        </div>
        <a href="{{ route('product.index') }}" class="btn btn-info">Back</a>

        <button type="submit" class="btn btn-primary"> Submit</button>
    </form>
@endsection
