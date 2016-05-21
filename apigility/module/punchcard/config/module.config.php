<?php
return array(
    'router' => array(
        'routes' => array(
            'punchcard.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'punchcard\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'punchcard.rpc.log-in' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'punchcard\\V1\\Rpc\\LogIn\\Controller',
                        'action' => 'logIn',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'punchcard.rest.user',
            1 => 'punchcard.rpc.log-in',
        ),
    ),
    'zf-rest' => array(
        'punchcard\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'punchcard\\V1\\Rest\\User\\UserResource',
            'route_name' => 'punchcard.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '-1',
            'page_size_param' => null,
            'entity_class' => 'punchcard\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'punchcard\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'user',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'punchcard\\V1\\Rest\\User\\Controller' => 'HalJson',
            'punchcard\\V1\\Rpc\\LogIn\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'punchcard\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.punchcard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'punchcard\\V1\\Rpc\\LogIn\\Controller' => array(
                0 => 'application/vnd.punchcard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'punchcard\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.punchcard.v1+json',
                1 => 'application/json',
            ),
            'punchcard\\V1\\Rpc\\LogIn\\Controller' => array(
                0 => 'application/vnd.punchcard.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'punchcard\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'punchcard.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'punchcard\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'punchcard.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(),
    ),
    'zf-content-validation' => array(),
    'input_filter_specs' => array(
        'punchcard\\V1\\Rest\\User\\Validator' => array(),
    ),
    'service_manager' => array(
        'factories' => array(
            'punchcard\\V1\\Rest\\User\\UserResource' => 'punchcard\\V1\\Rest\\User\\UserResourceFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'punchcard\\V1\\Rpc\\LogIn\\Controller' => 'punchcard\\V1\\Rpc\\LogIn\\LogInControllerFactory',
        ),
    ),
    'zf-rpc' => array(
        'punchcard\\V1\\Rpc\\LogIn\\Controller' => array(
            'service_name' => 'LogIn',
            'http_methods' => array(
                0 => 'POST',
            ),
            'route_name' => 'punchcard.rpc.log-in',
        ),
    ),
);
