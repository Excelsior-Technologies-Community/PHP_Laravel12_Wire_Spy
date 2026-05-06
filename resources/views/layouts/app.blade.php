<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dashboard</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Livewire -->
    @livewireStyles
</head>

<body class="bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 min-h-screen">

    <nav class="bg-white shadow-md p-4">
        <h1 class="text-xl font-bold">🚀 WireSpy Dashboard</h1>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow p-6">
            @yield('content')
        </div>
    </main>

    <footer class="text-center text-gray-500 py-4">
        © {{ date('Y') }} Laravel Demo
    </footer>

    @livewireScripts
</body>
</html>