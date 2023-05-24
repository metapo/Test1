<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Device Scanner</a>
                </li>
            </ul>
            @if(auth()->check())
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page">Welcome {{ ucfirst(Auth::user()->name) }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link btn btn-outline-dark" aria-current="page">{{ __('Logout') }}</button>
                        </form>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
