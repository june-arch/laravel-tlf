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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container fluid">
            <a class="navbar-brand" href="/">Laravel TLF</a>
            <div class="d-flex">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <button id="logoutBtn" class="btn btn-link nav-link"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header, Navigation, Sidebar, etc. -->
    @yield('content')
    
    <!-- Footer, Scripts, etc. -->
    @stack('scripts')
    <script type="module">
        $(document).ready(function() {
        // Logout button click event handler
        $('#logoutBtn').click(function() {
            // Call the logout endpoint
            $.ajax({
                url: '/api/auth/logout',
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('jwtToken') // Include JWT token in headers
                },
                success: function(response) {
                    // Remove JWT token from client-side storage
                    localStorage.removeItem('jwtToken');
                    // Redirect to login page or perform other actions as needed
                    window.location.href = '/'; // Example redirect to login page
                },
                error: function(xhr, status, error) {
                    console.error('Error logging out:', error);
                }
            });
        });
    });
    </script>
</body>
</html>
