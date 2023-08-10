<?php

use Opcodes\LogViewer\Level;

return [
    'enabled' => env('LOG_VIEWER_ENABLED', true),
    'route_domain' => null,
    'route_path' => 'admin/log-viewer',
    'back_to_system_url' => config('app.url', null),
    'back_to_system_label' => null, // Displayed by default: "Back to {{ app.name }}"
    'timezone' => 'Australia/Melbourne',

    'middleware' => [
        'web',
        \Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    'api_middleware' => [
        \Opcodes\LogViewer\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        \Opcodes\LogViewer\Http\Middleware\AuthorizeLogViewer::class,
    ],

    'hosts' => [
        'local' => [
            'name' => ucfirst(env('APP_ENV', 'local')),
        ],
    ],

    'include_files' => [
        '*.log',
        '**/*.log',
        // '/absolute/paths/supported',
    ],

    'exclude_files' => [],
    'shorter_stack_trace_excludes' => [
        '/vendor/symfony/',
        '/vendor/laravel/framework/',
        '/vendor/barryvdh/laravel-debugbar/',
    ],
    'patterns' => [
        'laravel' => [
            'log_matching_regex' => '/^\[(\d{4}-\d{2}-\d{2}[T ]\d{2}:\d{2}:\d{2}\.?(\d{6}([\+-]\d\d:\d\d)?)?)\].*/',
            'log_parsing_regex' => '/^\[(\d{4}-\d{2}-\d{2}[T ]\d{2}:\d{2}:\d{2}\.?'
                . '(\d{6}([\+-]\d\d:\d\d)?)?)\](.*?(\w+)\.|.*?)('
                . implode('|', array_filter(Level::caseValues()))
                . ')?: (.*?)( in [\/].*?:[0-9]+)?$/is',
        ],
    ],
    'cache_driver' => env('LOG_VIEWER_CACHE_DRIVER', null),
    'lazy_scan_chunk_size_in_mb' => 50,
];
