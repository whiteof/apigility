<?php

use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;

return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [
                'Appios\\V1' => 'research apps',
            ],
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => [
                    'host'     => '66.175.212.71',
                    'user'     => 'root',
                    'password' => 'Qwe456123',
                    'dbname'   => 'researchapps',
                ]
            ],
        ],
    ],
];
