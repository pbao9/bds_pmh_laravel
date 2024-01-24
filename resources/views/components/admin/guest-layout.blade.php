<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-admin.partials.guest.head />

</head>
<body class="hold-transition login-page">

    {{ $slot }}
    
    <x-admin.partials.guest.footer />

    <x-alert />

</body>
</html>