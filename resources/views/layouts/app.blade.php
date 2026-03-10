<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel WireSpy Demo</title>

    @livewireStyles
    <!-- @wireSpyStyles -->

    <!-- Add AlpineJS for WireSpy keybinding -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @yield('content')

    @livewireScripts
    <!-- @wireSpyScripts -->
</body>
</html>