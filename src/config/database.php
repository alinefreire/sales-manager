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
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_TEST_DATABASE'),
            'prefix' => ''
        ],

    ],
    'migrations' => 'migrations',
];
