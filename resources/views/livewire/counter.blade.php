<div class="counter-box">

    {{-- Success Message --}}
    @if (session()->has('success'))
        <div style="background: #d1fae5; color: #065f46; padding:8px; margin-bottom:10px; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    <h2>Counter: {{ $count }}</h2>

    <button wire:click="increment" style="padding:10px; margin-top:10px;">
        Increment
    </button>

</div>