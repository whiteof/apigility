<?php
return [
    'service_manager' => [
        'factories' => [
            \Appios\V1\Rest\Submit\SubmitResource::class => \Appios\V1\Rest\Submit\SubmitResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'appios.rest.submit' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/appios/submit[/:submit_id]',
                    'defaults' => [
                        'controller' => 'Appios\\V1\\Rest\\Submit\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'appios.rest.submit',
        ],
    ],
    'zf-rest' => [
        'Appios\\V1\\Rest\\Submit\\Controller' => [
            'listener' => \Appios\V1\Rest\Submit\SubmitResource::class,
            'route_name' => 'appios.rest.submit',
            'route_identifier_name' => 'submit_id',
            'collection_name' => 'submit',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'POST',
                1 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Appios\V1\Rest\Submit\SubmitEntity::class,
            'collection_class' => \Appios\V1\Rest\Submit\SubmitCollection::class,
            'service_name' => 'Submit',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Appios\\V1\\Rest\\Submit\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Appios\\V1\\Rest\\Submit\\Controller' => [
                0 => 'application/vnd.appios.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Appios\\V1\\Rest\\Submit\\Controller' => [
                0 => 'application/vnd.appios.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Appios\V1\Rest\Submit\SubmitEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'appios.rest.submit',
                'route_identifier_name' => 'submit_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \Appios\V1\Rest\Submit\SubmitCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'appios.rest.submit',
                'route_identifier_name' => 'submit_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Appios\\V1\\Rest\\Submit\\Controller' => [
            'input_filter' => 'Appios\\V1\\Rest\\Submit\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Appios\\V1\\Rest\\Submit\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
                'field_type' => 'integer',
                'continue_if_empty' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Appios\\V1\\Rest\\Submit\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
