<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>@yield('title', 'Receptite.bg')</title>
    @vite(['resources/assets/css/app.css', 'resources/assets/js/app.js'])
</head>
<body class="bg-gray-50">
=======
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="app-layout">
    {{-- Flash Messages --}}
    @if (session('status') || session('success') || session('error') || session('warning'))
        <div class="flash-messages">
            @if (session('status'))
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif
>>>>>>> 214a354adb3deaf6ca76d2026310a47809063d24

            @if (session('success'))
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif
        </div>
    @endif

    {{-- Header / Navigation --}}
    @include('partials.header')

<<<<<<< HEAD
    <main class="min-h-screen">
        @yield('content')
    </main>

=======
    {{-- Main Content --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
>>>>>>> 214a354adb3deaf6ca76d2026310a47809063d24
    @include('partials.footer')

    {{-- Scripts --}}
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
