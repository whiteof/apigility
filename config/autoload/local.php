<?php
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'research apps' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'mysql:dbname=researchapps;host=66.175.212.71',
                        'route' => '/oauth',
                        'username' => 'root',
                        'password' => 'Qwe456123',
                    ],
                ],
            ],
        ],
    ],
];
