<div class="p-6 bg-slate-50 dark:bg-slate-700 rounded-2xl border border-slate-200 dark:border-slate-600 shadow-inner transition-all duration-300">
    
    <h2 class="text-lg font-bold text-slate-700 dark:text-slate-200 mb-4">
        Live Counter
    </h2>

    <div class="text-4xl font-black text-blue-600 dark:text-blue-400 mb-6">
        {{ $count }}
    </div>

    <button wire:click="increment" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-transform active:scale-95 shadow-md">
        Increment Value
    </button>
    
    <p class="text-xs text-slate-400 dark:text-slate-500 mt-4 text-center">
        Real-time component tracking enabled
    </p>
</div>