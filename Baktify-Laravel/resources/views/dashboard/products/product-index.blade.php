@extends('layout')
@section('page-title', 'Product')
@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-primary mt-4"> <i class="fa fa-plus"></i> Add Product</a>

    <div class="py-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $data)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->stock }}</td>
                        <td>{{ $data->description }}</td>
                        <td> <img class="img-thumbnail" src="{{asset('product_image/'.$data->image)}}" style="max-width: 15vh;" alt=""> </td>
                        <td>
                            <a href="{{route('product.show',$data->id)}}" class="btn btn-info">Detail</a>
                            <a href="{{ route('product.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('product.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
                        </td>



                    </tr>
                @empty
                    <td colspan="100%" class="text-center"> No data provided</td>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
