<nav class="navbar top-navbar">
    <div class="container">
        <div class="navbar-content">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            
            <ul class="navbar-nav">

            @guest
                <li class="nav-item">
                    <a class=" btn  btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @include('partials.projectSelector')
                @include('partials.messages')
                @include('partials.notifications')
                @include('partials.profile')
            </ul>
            @endguest
        </div>
    </div>
</nav>