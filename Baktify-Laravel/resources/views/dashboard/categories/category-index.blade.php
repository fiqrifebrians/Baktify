@extends('layout')
@section('page-title', 'Category')
@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-primary mt-4"> <i class="fa fa-plus"></i> Add Category</a>

    <div class="py-3">
        <table class="table table-striped table-hover w-75">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $data)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('category.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
                        </td>



                    </tr>
                @empty
                    <td colspan="3" class="text-center"> No data provided</td>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
