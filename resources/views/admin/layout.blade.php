<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-admin.partials.head />
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <x-admin.partials.nav-top />

        <x-admin-sidebar />

        @yield('content')

        <x-admin.partials.footer />

    </div>
    <!-- ./wrapper -->

    <x-admin.partials.scripts />

    <x-alert />
    
</body>
</html>