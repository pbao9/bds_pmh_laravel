<!DOCTYPE html>
<html lang="en">
<head>
    <x-home.head></x-home.head>
</head>

<body>
    <header id="header">
        <x-menu-home />
        <x-menu-home-mobi></x-menu-home-mobi>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <x-home.footer></x-home.footer>
</body>
    <x-home.scripts></x-home.scripts>
</html>