<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Receptite.bg')</title>
    @vite(['resources/assets/css/app.css', 'resources/assets/js/app.js'])
</head>
<body class="bg-gray-50">

    @include('partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>