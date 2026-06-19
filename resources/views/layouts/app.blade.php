<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel WireSpy Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    @livewireStyles
</head>

<body class="h-full bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-300">

    <nav class="bg-white dark:bg-slate-800 shadow-md p-4 flex justify-between items-center transition-colors">
        <h1 class="text-xl font-bold text-blue-600 dark:text-blue-400">🚀 WireSpy Dashboard</h1>

        <div class="flex items-center gap-2">
            <button onclick="toggleWireSpy()"
                    class="p-2 rounded-lg bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 transition text-sm font-semibold">
                🔍 Inspector
            </button>

            <button onclick="toggleDarkMode()"
                    class="p-2 rounded-lg bg-slate-200 dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 transition">
                🌓 Mode
            </button>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 transition-colors">
            @yield('content')
        </div>
    </main>

    <footer class="text-center text-slate-500 py-8 text-sm">
        © {{ date('Y') }} Laravel WireSpy Project - Real-time Monitoring Active
    </footer>

    <div id="wirespy-modal" class="hidden fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-800 w-full max-w-2xl rounded-2xl shadow-2xl border dark:border-slate-700 max-h-[80vh] flex flex-col">
            <div class="flex justify-between items-center p-4 border-b dark:border-slate-700">
                <h2 class="text-lg font-bold text-slate-800 dark:text-white">🔍 WireSpy Inspector</h2>
                <button onclick="toggleWireSpy()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 text-2xl leading-none">&times;</button>
            </div>
            <div id="wirespy-log" class="overflow-y-auto p-4 space-y-2 text-sm font-mono flex-1">
                <p class="text-slate-400 text-center py-8">No Livewire activity yet. Interact with a component...</p>
            </div>
            <div class="p-3 border-t dark:border-slate-700 text-center">
                <button onclick="clearWireSpy()" class="text-xs text-red-500 hover:text-red-600 font-semibold">Clear Log</button>
            </div>
        </div>
    </div>

    <script>
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        let wireSpyLog = [];

        function toggleWireSpy() {
            document.getElementById('wirespy-modal').classList.toggle('hidden');
        }

        function clearWireSpy() {
            wireSpyLog = [];
            renderWireSpyLog();
        }

        function renderWireSpyLog() {
            const container = document.getElementById('wirespy-log');

            if (wireSpyLog.length === 0) {
                container.innerHTML = '<p class="text-slate-400 text-center py-8">No Livewire activity yet. Interact with a component...</p>';
                return;
            }

            container.innerHTML = wireSpyLog.map(entry => `
                <div class="p-3 rounded-lg bg-slate-50 dark:bg-slate-700 border dark:border-slate-600">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-blue-600 dark:text-blue-400">${entry.component}</span>
                        <span class="text-xs text-slate-400">${entry.time}</span>
                    </div>
                    <div class="text-slate-600 dark:text-slate-300">Calls: ${entry.calls}</div>
                    <div class="text-slate-600 dark:text-slate-300">Updates: ${entry.updates}</div>
                </div>
            `).join('');
        }

        document.addEventListener('keydown', function (e) {
            if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'i') {
                e.preventDefault();
                toggleWireSpy();
            }
        });

        document.addEventListener('livewire:init', () => {
            Livewire.hook('commit', ({ component, commit, succeed }) => {
                succeed(() => {
                    wireSpyLog.unshift({
                        component: component.name,
                        calls: (commit.calls || []).map(c => c.method).join(', ') || '-',
                        updates: Object.keys(commit.updates || {}).join(', ') || '-',
                        time: new Date().toLocaleTimeString()
                    });

                    if (wireSpyLog.length > 20) wireSpyLog.pop();

                    renderWireSpyLog();
                });
            });
        });
    </script>

    @livewireScripts
</body>
</html>