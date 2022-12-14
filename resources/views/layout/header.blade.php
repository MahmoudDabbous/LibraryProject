<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">{{ __('site.home') }}</a>
                </li>
                <x-navbar></x-navbar>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Auth.login') }}">{{ __('site.login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Auth.register') }}">{{ __('site.register') }}</a>
                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link">Welcome, {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Auth.logout') }}">{{ __('site.logout') }}</a>
                </li>
            @endauth

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('site.changelang') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('lang.en') }}">en</a></li>
                    <li><a class="dropdown-item" href="{{ route('lang.ar') }}">ar</a></li>
                </ul>
            </li>



        </ul>

    </div>
</nav>
