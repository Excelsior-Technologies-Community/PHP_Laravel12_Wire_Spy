<?php

return [
    /*
     * Enable or disable WireSpy.
     * By default, WireSpy will only be enabled in your development environment.
     */
    'enabled' => env('WIRE_SPY_ENABLED', true),

    /*
     * Logging configurations.
     * Enabling this will allow WireSpy to capture component lifecycle logs 
     * in your storage/logs/laravel.log file.
     */
    'logging' => [
        'enabled' => env('WIRE_SPY_LOGGING', true),
        'channel' => 'stack',
    ],

    /**
     * The keybinding configuration option allows you to define a keyboard shortcut
     * using AlpineJS syntax.
     * * 'super.l' is great, but 'super.i' is often used for 'Inspect' (Spy).
     */
    'keybinding' => env('WIRE_SPY_KEYBINDING', 'super.i'),

    /*
     * WireSpy Dashboard access control.
     * You can define who can see the WireSpy dashboard.
     */
    'middleware' => [
        'web',
        // 'auth', // Uncomment this to restrict access only to logged-in users
    ],
];