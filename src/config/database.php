<?php

return [
    'default' => 'mongodb',
    'connections' => [
        'mongodb' => [
            'driver' => 'mongodb',
            'dsn' => env('DB_DSN'),
            'database' => env('DB_DATABASE'),
            'options' => [
                'database' => 'admin'
            ]
        ],
        'test' => [
            'driver' => 'mongodb',
            'dsn' => env("DB_TEST_DSN"),
            'database' => env('DB_TEST_DATABASE'),
            'options' => [
                'database' => 'admin'
            ]
        ],

    ],
    'migrations' => 'migrations',
];
