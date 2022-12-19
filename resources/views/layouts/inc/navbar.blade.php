<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Timely Films Review
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">

            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/all-movies') }}">All Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Route::has('login'))
                    @auth
                    {{ Auth::user()->name }}
                    @else
                    Account
                    @endif
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if (Route::has('login'))
                    <li>@auth
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else<li>
                        <a href="{{ route('login') }}" class="dropdown-item text-decoration-none text-dark">Login</a>
                    </li>
                    @if (Route::has('register'))<li>
                        <a href="{{ route('register') }}" class="dropdown-item text-decoration-none text-dark">Register</a>
                    </li>
                    @endif
                    @endif
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</div>
</nav>