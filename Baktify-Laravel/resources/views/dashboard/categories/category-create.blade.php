@extends('layout')
@section('page-title', 'Add Category')
@section('content')

    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary"> Submit</button>
    </form>
@endsection
