<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5, user-scalable=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Expenses Tracker')</title>
    @include('web.layouts.includes.css')
    @stack('custom-css')
    @livewireStyles
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('web.layouts.includes.sidebar')

        <!-- Page Content -->
        <div id="content" class="flex-grow-1">
            <!-- Top Navbar -->
            @include('web.layouts.includes.navbar')
            <!-- Main Content -->
            <div class="container mt-4">
                @yield('contents')

            </div>
        </div>
    </div>

    <!-- JS -->
    @include('web.layouts.includes.js')
    @stack('custom-js')
    @livewireScripts
</body>

</html>
