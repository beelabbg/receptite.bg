<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-content">
            {{-- Brand --}}
            <div class="navbar-brand">
                <a href="{{ route('home') }}" class="brand-text">
                    {{ config('app.name') }}
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <nav class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Начало
                </a>
                <a href="{{ route('recipe') }}" class="nav-link {{ request()->routeIs('recipe') ? 'active' : '' }}">
                    Рецепти
                </a>
                <a href="{{ route('section') }}" class="nav-link {{ request()->routeIs('section') ? 'active' : '' }}">
                    Категории
                </a>
            </nav>

            {{-- Auth Section --}}
            <div class="navbar-auth">
                @auth
                    <a href="{{ route('recipes.my') }}" class="nav-link {{ request()->routeIs('recipes.*') ? 'active' : '' }}">
                        Моите рецепти
                    </a>
                    <div class="dropdown">
                        <button type="button" class="nav-user" data-dropdown-trigger>
                            @if (Auth::user()->avatar_url)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->full_name }}">
                            @else
                                <span class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-medium">
                                    {{ strtoupper(substr(Auth::user()->full_name, 0, 1)) }}
                                </span>
                            @endif
                            <span class="hidden sm:inline">{{ Auth::user()->full_name }}</span>
                            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                Моят профил
                            </a>
                            <a href="{{ route('recipes.create') }}" class="dropdown-item">
                                Добави рецепта
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left text-red-600 hover:bg-red-50">
                                    Изход
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Вход</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Регистрация</a>
                @endauth

                {{-- Mobile Menu Button --}}
                <button type="button" class="mobile-menu-btn">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="mobile-menu hidden">
            <nav class="flex flex-col gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Начало
                </a>
                <a href="{{ route('recipe') }}" class="nav-link {{ request()->routeIs('recipe') ? 'active' : '' }}">
                    Рецепти
                </a>
                <a href="{{ route('section') }}" class="nav-link {{ request()->routeIs('section') ? 'active' : '' }}">
                    Категории
                </a>
            </nav>

            <div class="navbar-auth">
                @auth
                    <a href="{{ route('recipes.my') }}" class="nav-link">Моите рецепти</a>
                    <a href="{{ route('profile.show') }}" class="nav-link">Моят профил</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-ghost w-full justify-start text-red-600">
                            Изход
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost w-full">Вход</a>
                    <a href="{{ route('register') }}" class="btn btn-primary w-full">Регистрация</a>
                @endauth
            </div>
        </div>
    </div>
</header>
