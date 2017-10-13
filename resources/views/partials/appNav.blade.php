@extends(layouts.app)

@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">IPA</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Analytics Platform</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Support
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Contact Us</a>
                    <a class="dropdown-item" href="#">Documentation</a>
                    <a class="dropdown-item" href="#">Forums</a>
                </div>
            </li>
        </ul>
        <div class="navbar-nav ml-auto">
        @if (Route::has('login'))
        @auth
            <a class="nav-item nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
            <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
        @endauth
        @endif
        </div>
    </div>
</nav>
@endsection
