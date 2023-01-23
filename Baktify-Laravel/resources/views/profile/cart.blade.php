@extends('homepage.home-layout')
@section('home-title', 'Your cart')
@section('content-home')
    <div class="container">
        @include('partials.flash')

        @if (count($cart) == 0)
            <h3>Your cart is empty</h3>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Buyer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                        <th scope="col">Pending</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->User->name }}</td>
                            <td>{{ $data->Product->name }}</td>
                            <td>{{ $data->qty }}</td>
                            <td>Rp. {{ number_format($data->total) }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @endif
        <div class="d-flex justify-content-between">
            <a href="{{route('homepage.checkout')}}" class="btn btn-primary">Checkout</a>
            Grand total : Rp. {{number_format($cart->sum('total'))}}
        </div>
        <hr>

    </div>
@endsection
