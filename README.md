# PHP_Laravel12_Wire_Spy

## Introduction

PHP_Laravel12_Wire_Spy is a demonstration project built using Laravel 12 and Livewire v3 to showcase the integration of the WireSpy debugging tool.

WireSpy is a developer tool designed specifically for Livewire applications. It provides a visual debugging panel that allows developers to inspect Livewire components, track state changes, monitor events, and analyze component behavior in real time.

This project demonstrates how to install, configure, and use WireSpy within a Laravel application to simplify debugging and improve development workflow.

---

## Project Overview

This project demonstrates the integration of WireSpy with Livewire components in a Laravel 12 application.

Using WireSpy, developers can:

- Inspect Livewire component state

- Monitor Livewire events and actions

- Track component lifecycle updates

- View request and response data

- Debug Livewire interactions in real time

A simple Counter Livewire component is included in this project to demonstrate how WireSpy tracks component state updates when user interactions occur.

---

## Requirements

- PHP ≥ 8.1

- Composer

- Laravel 12

- Node.js & npm (for Livewire frontend assets)

- XAMPP / Laragon / Local server

---

## Step 1: Create Laravel 12 Project

```bash
composer create-project laravel/laravel PHP_Laravel12_Wire_Spy "12.*"
cd PHP_Laravel12_Wire_Spy
```

---

## Step 2: Install Livewire v3

```bash
composer require livewire/livewire "^3.0"
```

Publish Livewire assets:

```bash
php artisan livewire:publish --assets
```

Include Livewire scripts in resources/views/layouts/app.blade.php:

```html
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
```
---

## Step 3: Install WireSpy

```bash
composer require wire-elements/wire-spy --dev
```

---

## Step 4: Publish WireSpy Configuration

```bash
php artisan vendor:publish --tag=wire-spy-config
```

Configuration file: config/wire-spy.php

Optional: enable in all environments:

```bash
'enabled' => env('WIRE_SPY_ENABLED', true),
```

---

## Step 5: Create Sample Livewire Component

Generate component:

```bash
php artisan make:livewire Counter
```

app/Livewire/Counter.php

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0; // Add this property

    public function increment()
    {
        $this->count++; // Increment the count
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

---

## Step 6: Create Blade Files

### counter.blade.php

resources/views/livewire/counter.blade.php

```html
<div class="counter-box">
    <h2>Counter: {{ $count }}</h2>
    <button wire:click="increment" style="padding:10px; margin-top:10px;">Increment</button>
</div>
```

### dashboard.blade.php

resources/views/dashboard.blade.php

```html
@extends('layouts.app')

@section('content')
    <h1>Laravel WireSpy Demo</h1>
    @livewire('counter')
@endsection
```

---

## Step 7: Update Routes

Edit routes/web.php:

```php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard'); 
});
```
---

## Step 8: Run Application

Run:

```bash
php artisan serve
```

Visit: 

```bash
http://127.0.0.1:8000
```

- You should see “Laravel WireSpy Demo” with the Counter component.

- Press CMD + L (Mac) or CTRL + L (Windows/Linux) to open the WireSpy overlay.

- Inspect component state, events, and interact with the counter — all tracked in WireSpy.

---

## Output

<img width="1919" height="1030" alt="Screenshot 2026-03-10 100750" src="https://github.com/user-attachments/assets/fce202d6-08f1-45c7-b8b3-6dc3b161c5d9" />

---

## Project Structure 

```
PHP_Laravel12_Wire_Spy/
├─ app/
│  └─ Livewire/
│     └─ Counter.php
├─ config/
│  └─ wire-spy.php
├─ resources/
│  ├─ views/layouts/
│  │  └─ app.blade.php
│  ├─ views/dashboard.blade.php
│  └─ views/livewire/
│     └─ counter.blade.php
├─ routes/
│  └─ web.php
├─ .env
├─ composer.json
├─ package.json
└─ artisan
```

---

Your PHP_Laravel12_Wire_Spy Project is now ready!
<<<<<<< HEAD
=======

>>>>>>> development
