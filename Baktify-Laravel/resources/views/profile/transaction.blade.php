@extends('homepage.home-layout')
@section('home-title', 'Transaction')
@section('content-home')
    <div class="container">
        @include('partials.flash')

        @if (count($transaction) == 0)
            <h3>Your transaction is empty</h3>
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
                    @forelse ($transaction as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->User->name }}</td>
                            <td>{{ $data->Product->name }}</td>
                            <td>{{ $data->qty }}</td>
                            <td>Rp. {{ number_format($data->total) }}</td>
                            <td> <button class="btn btn-info">{{ $data->status }} </button> </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @endif

        <hr>

    </div>
@endsection
