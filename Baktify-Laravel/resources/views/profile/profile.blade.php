@extends('homepage.home-layout')
@section('home-title', 'Profile Setting')
@section('content-home')
    @include('partials.flash')
    <div class="container py-5">
        <section>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <p class="card-text mb-0">{{ Auth::user()->email }}</p>
                            <p class="card-text mb-0">{{ Auth::user()->address }}</p>
                            <p class="card-text mb-0">{{ Auth::user()->phone }}</p>
                            <span class="badge bg-secondary">{{ Auth::user()->role }}</span>
                        </div>
                        <div class="card-footer">
                            <span>Last updated at {{Auth::user()->updated_at}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Setting</h5>

                            <form action="{{ route('homepage.profile_update') }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ Auth::user()->name }}">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger mt-1">
                                            <h6 class="text-danger">{{ $errors->first('name') }}</h6>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="mb-2">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Phone">
                                    @if ($errors->has('phone'))
                                        <div class="alert alert-danger mt-1">
                                            <h6 class="text-danger">{{ $errors->first('phone') }}</h6>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address">
                                    @if ($errors->has('address'))
                                        <div class="alert alert-danger mt-1">
                                            <h6 class="text-danger">{{ $errors->first('address') }}</h6>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="******">
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger mt-1">
                                            <h6 class="text-danger">{{ $errors->first('password') }}</h6>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label>Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="******">

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
