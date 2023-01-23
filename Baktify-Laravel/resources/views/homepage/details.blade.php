@extends('homepage.home-layout')
@section('home-title', 'Details product')
@section('content-home')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Details Product
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="img-thumbnail shadow d-block" src="{{ asset('product_image/' . $product->image) }}" style="max-width: 40vh; margin:auto auto;" alt="">
                    </div>
                    <div class="col">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <span class="badge bg-secondary">{{ $product->Category->name }}</span>
                        <p>Stock : {{ $product->stock }}</p>
                        <h6>Product description :</h6>
                        <textarea rows="2" class="form-control" disabled>{{ $product->description }}
                        </textarea>
                        <div class="pt-3">
                            <h4>Rp. {{ number_format($product->price) }}</h4>
                        </div>
                        <div class="d-grid">
                            <a href="{{route('homepage.add-to-cart',['product'=>$product->id])}}"
                                class="btn btn-warning me-2 {{ $product->stock <= 0 ? 'disabled' : '' }}">
                                {{ $product->stock <= 0 ? 'Out of stock' : 'Add to chart' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
