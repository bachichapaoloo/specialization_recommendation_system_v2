<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            <img src="{{ asset('img/logo-v4.png')}}" alt="logo" width="250px" height="80px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Center Of Navbar -->
            <ul class="navbar-nav" style="flex-grow: 1; justify-content: center;">
                <a href="{{ route('about-us') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">About us</a>
                <a href="{{ route('how-it-works') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">How it works</a>
                <a href="{{ route('recommendations') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">Recommendations</a>
                <a href="{{ route('careers') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">Careers</a>
                <a href="{{ route('contact') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">Contact us</a>
                {{-- <a href="" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">Contact us</a> --}}
                <a href="{{ route('faqs') }}" class="nav-link mx-2 fw-bold nav-link1" style="font-size:14px">FAQs</a>
            </ul>

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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:16px" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
