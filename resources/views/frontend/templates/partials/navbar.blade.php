{{-- Navigation --}}
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <a href="/" class="brand-logo">Perpus</a>
            <a href="/" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down dropdown-menu">

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
                    <a id="navbarDropdown" class="nav-link dropdown-trigger" href="#" role="button"
                            data-toggle="dropdown" data-target='signout' aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                        </a>

                        <ul id='signout' class='dropdown-content collection'>
                            <li><a class="collection-item" href="{{ route('home') }}"> Home</a></li>
                            <li><a class="collection-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"> Sign out</a>
                            </li>
                
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                @endguest

            </ul>
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-demo">
    @guest
        @if (Route::has('login'))
            <li><a href="{{ route('login') }}">Login</a></li>
        @endif

        @if (Route::has('register'))
            <li><a href="{{ route('register') }}">Register</a></li>
        @endif
    @else
    <a class="nav-link" href="#" role="button"
    aria-haspopup="true" aria-expanded="false" v-pre>
    Hi {{ Auth::user()->name }} !</a>

    <ul id='menu'>
    <li><a href="/admin"><i class="material-icons left">dashboard</i> Dashboard</a></li>
    <li><a class="collection-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="material-icons left">exit_to_app</i> Sign out</a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</ul>

    @endguest
</ul>
