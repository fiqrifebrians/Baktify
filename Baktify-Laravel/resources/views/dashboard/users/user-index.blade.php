@extends('layout')
@section('page-title', 'User')
@section('content')
    <a href="{{ route('user.create') }}" class="btn btn-primary mt-4"> <i class="fa fa-plus"></i> Add User</a>

    <div class="py-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $data)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td>
                            <a href="{{route('user.show',$data->id)}}" class="btn btn-info">Detail</a>
                            <a href="{{ route('user.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('user.delete', $data->id) }}" class="btn btn-danger">Hapus</a>
                        </td>



                    </tr>
                @empty
                    <td colspan="100%" class="text-center"> No data provided</td>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
