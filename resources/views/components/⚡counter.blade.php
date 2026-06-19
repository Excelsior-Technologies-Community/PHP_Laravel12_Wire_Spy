<?php

use Livewire\Volt\Component;
use App\Models\Todo;

new class extends Component {
    public function with(): array
    {
        $total = Todo::count();
        $completed = Todo::where('completed', true)->count();
        $progress = $total > 0 ? ($completed / $total) * 100 : 0;

        return [
            'progress' => round($progress),
        ];
    }
};
?>

<div class="p-4 bg-white dark:bg-slate-800 rounded-xl shadow border dark:border-slate-700">
    <h3 class="text-sm font-bold text-slate-500 dark:text-slate-400 mb-2 uppercase">Task Progress</h3>
    
    <div class="flex items-center justify-between mb-1">
        <span class="text-2xl font-black text-blue-600 dark:text-blue-400">{{ $progress }}%</span>
    </div>

    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2.5">
        <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
    </div>
</div>