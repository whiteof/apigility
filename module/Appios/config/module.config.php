<?php

namespace Appios;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'service_manager' => [
        'factories' => [
            \Appios\V1\Rest\Submit\SubmitResource::class => \Appios\V1\Rest\Submit\SubmitResourceFactory::class,
            \Appios\V1\Rest\Submit\Model\AnswerModel::class => \Appios\V1\Rest\Submit\Model\AnswerModelFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'appios.rest.submit' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/appios/submit',
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
                0 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'POST',
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
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'device_id',
                'field_type' => 'string',
                'description' => 'Device ID',
                'continue_if_empty' => false,
                'allow_empty' => false,
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'answers',
                'description' => 'Answers array.',
                'field_type' => 'array',
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
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/V1/Rest/Submit/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\V1\Rest\Submit\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]    
];
