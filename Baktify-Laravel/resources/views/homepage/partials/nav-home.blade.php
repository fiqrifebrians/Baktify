<nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-light">
    <div class="container py-2">
        <a class="navbar-brand" href="{{route('homepage')}}">Backtify</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarScroll">
            <div class="d-flex">
                <a href="{{route('homepage.about')}}" class="nav-link text-light">About Us</a>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{route('homepage.profile')}}" class="dropdown-item">Profile</a>
                                <a href="{{route('dashboard')}}" class="dropdown-item {{Auth::user()->role == 'Admin' ? '' : 'd-none' }}">Dashboard (Admin only)</a>
                                <a href="{{route('homepage.cart')}}" class="dropdown-item">Cart</a>
                                <a href="{{route('homepage.transaction')}}" class="dropdown-item">Transaction</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
