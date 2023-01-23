@extends('homepage.home-layout')
@section('home-title', 'Homepage')
@section('content-home')
    <div class="container py-5">
        @include('partials.flash')
        <form class="d-flex" id="search_form">
            <div class="input-group mb-3">
                <input type="text" id="search_input" class="form-control " name="search"
                    placeholder="Click button or enter to search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
        <div class="row mb-4">
            @foreach ($product as $data)
                <div class="col-lg-3">
                    <div class="card shadow" style="min-height: 10vh;">
                        <div class="card-body">

                            <span class="badge bg-secondary p-2">{{ $data->Category->name }}</span>
                            <img class="img-fluid d-block py-3" style="margin: 0 auto;min-height:30vh; max-height:30vh;"
                                src="{{ asset('product_image/' . $data->image) }}" alt="">
                            <hr>
                            <div>
                                <div class="mb-3">Stock : {{ $data->stock }}</div>
                                <h5> {{ $data->name }}</h5>
                                <h6>Rp. {{ number_format($data->price) }}</h6>
                                <p>{{ $data->description }}</p>
                            </div>

                        </div>
                        <div class="card-footer bg-dark d-flex justify-content-start">
                            {{-- Add to chart --}}
                            <a href="{{route('homepage.add-to-cart',['product'=>$data->id])}}"
                                class="btn btn-outline-warning me-2 {{ $data->stock <= 0 ? 'disabled' : '' }}">
                                {{ $data->stock <= 0 ? 'Out of stock' : 'Add to chart' }}</a>
                            {{-- Detail  --}}
                            <a href="{{route('homepage.detail',$data->id)}}" class="btn btn-light">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        {{ $product->links() }}


    </div>

@endsection
