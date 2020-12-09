<nav id="navbar-top" class="navbar fixed-top navbar-expand-md navbar-dark">
    <div class="container">
        <!-- Company name shown on mobile -->
        <a class="navbar-brand" href="/"><span>E</span>vents</a>
        <!-- Mobile menu toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Main navigation items -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mr-auto">
                <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
                    <a class="nav-link" href="{{url('/events')}}">Events</a>
                </li>
                <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
                    <a class="nav-link" href="{{url('/users')}}">Users</a>
                </li>
                <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
                    <a class="nav-link" href="{{url('/organisers')}}">Organisers</a>
                </li>
                <a class="nav-link" class="active" href="/home">Profile</a>
                @if (Route::has('login'))
                    <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
                        @auth
                            <a class="nav-link" class="active" href="/home">Profile</a>
                        @else
                            <a class="nav-link" class="active" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <li data-toggle="collapse" data-target=".navbar-collapse.show" class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                        </li>
                    @endif
            </ul>

        </div>
    </div>
</nav>
