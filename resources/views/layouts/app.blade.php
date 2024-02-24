<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Add your CSS stylesheets, meta tags, etc. here -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <!-- Header, Navigation, Sidebar, etc. -->
    @yield('content')
    
    <!-- Footer, Scripts, etc. -->
    @stack('scripts')
</body>
</html>
