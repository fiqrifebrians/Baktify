@extends('layout')
@section('page-title', 'User Product')
@section('content')

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}"  >
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="price" class="form-control" value="{{ $user->email }}"  >
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="description" class="form-control" value="" placeholder="********"  >
        </div>
        <a href="{{ route('user.index') }}" class="btn btn-info">Back</a>

        <button type="submit" class="btn btn-primary"> Submit</button>
    </form>
@endsection
