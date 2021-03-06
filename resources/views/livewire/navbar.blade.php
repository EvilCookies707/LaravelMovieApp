<nav class="navbar navbar-expand-md navbar-dark  shadow-sm">
    <div class="container">
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'MovieSearch:') }}
        </a>
        @else
        <a class="navbar-brand" href="{{ url('home') }}">
            {{ config('app.name', 'MovieSearch:') }}
        </a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div >
                <form class="form-inline my-2 my-lg-0" id="searchForm" wire:submit.prevent="movieSearch">
                    <input class="search form-control mr-sm-2" type="search" wire:model="search" aria-label="Search">
                </form>
            </div>
            <div>
                <button class="action-btn mx-3 " wire:click="movieRandom()">
                    <h3>RANDOM</h3>
                </button>
            </div>
            <!-- Right Side Of Navbar -->
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

                            <a class="dropdown-item" href="{{ route('favorite') }}">
                                {{ __('My favorite') }}
                            </a>
                            
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
</nav>