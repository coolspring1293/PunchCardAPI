<?php
return array(
    'controllers' => array(
        'factories' => array(
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Status\\V1\\Rpc\\Ping\\PingControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'status.rest.status' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/status[/:status_id]',
                    'defaults' => array(
                        'controller' => 'Status\\V1\\Rest\\Status\\Controller',
                    ),
                ),
            ),
            'status.rpc.ping' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ping',
                    'defaults' => array(
                        'controller' => 'Status\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ),
                ),
            ),
            'status.rest.post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/post[/:post_id]',
                    'defaults' => array(
                        'controller' => 'Status\\V1\\Rest\\Post\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'status.rest.status',
            1 => 'status.rpc.ping',
            2 => 'status.rest.post',
        ),
    ),
    'zf-rpc' => array(
        'Status\\V1\\Rpc\\Ping\\Controller' => array(
            'service_name' => 'ping',
            'http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'route_name' => 'status.rpc.ping',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Status\\V1\\Rest\\Status\\Controller' => 'HalJson',
            'Status\\V1\\Rpc\\Ping\\Controller' => 'Json',
            'Status\\V1\\Rest\\Post\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Status\\V1\\Rest\\Status\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Status\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'Status\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Status\\V1\\Rest\\Status\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ),
            'Status\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ),
            'Status\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Status\\V1\\Rest\\Status\\Controller' => array(
            'input_filter' => 'Status\\V1\\Rest\\Status\\Validator',
        ),
        'Status\\V1\\Rpc\\Ping\\Controller' => array(
            'input_filter' => 'Status\\V1\\Rpc\\Ping\\Validator',
        ),
        'Status\\V1\\Rest\\Post\\Controller' => array(
            'input_filter' => 'Status\\V1\\Rest\\Post\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Status\\V1\\Rpc\\Ping\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'ack',
                'description' => 'Acknowledge the request with a timestamp.',
                'error_message' => 'ack failure',
            ),
        ),
        'Status\\V1\\Rest\\Status\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'max' => '140',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'message',
                'description' => 'A status message of no more than 140 characters',
                'error_message' => 'A status message must contain between 1 and 140 characters',
            ),
            1 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\Regex',
                        'options' => array(
                            'pattern' => '/^(mwop|andi|zeev)$/',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'user',
                'description' => 'The user submitting the status message.',
                'error_message' => 'You must provide a valid user.',
            ),
            2 => array(
                'required' => false,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\Digits',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'timestamp',
                'description' => 'The timestamp when the status message was last modified.',
                'error_message' => 'You must provide a timestamp.',
            ),
        ),
        'Status\\V1\\Rest\\Post\\Validator' => array(
            0 => array(
                'name' => 'id',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
            1 => array(
                'name' => 'message',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
            2 => array(
                'name' => 'user',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
            3 => array(
                'name' => 'timestamp',
                'required' => false,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Status\\V1\\Rest\\Status\\StatusResource' => 'Status\\V1\\Rest\\Status\\StatusResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Status\\V1\\Rest\\Status\\Controller' => array(
            'listener' => 'Status\\V1\\Rest\\Status\\StatusResource',
            'route_name' => 'status.rest.status',
            'route_identifier_name' => 'status_id',
            'collection_name' => 'status',
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
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '100',
            'page_size_param' => null,
            'entity_class' => 'StatusLib\\Entity',
            'collection_class' => 'StatusLib\\Collection',
            'service_name' => 'Status',
        ),
        'Status\\V1\\Rest\\Post\\Controller' => array(
            'listener' => 'Status\\V1\\Rest\\Post\\PostResource',
            'route_name' => 'status.rest.post',
            'route_identifier_name' => 'post_id',
            'collection_name' => 'post',
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
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Status\\V1\\Rest\\Post\\PostEntity',
            'collection_class' => 'Status\\V1\\Rest\\Post\\PostCollection',
            'service_name' => 'post',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Status\\V1\\Rest\\Status\\StatusEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Status\\V1\\Rest\\Status\\StatusCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'is_collection' => true,
            ),
            'StatusLib\\Entity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'hydrator' => 'Zend\\Hydrator\\ObjectProperty',
            ),
            'StatusLib\\Collection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'is_collection' => true,
            ),
            'Status\\V1\\Rest\\Post\\PostEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.post',
                'route_identifier_name' => 'post_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Status\\V1\\Rest\\Post\\PostCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.post',
                'route_identifier_name' => 'post_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Status\\V1\\Rest\\Status\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'Status\\V1\\Rest\\Post\\PostResource' => array(
                'adapter_name' => 'Db\\StatusLib',
                'table_name' => 'post',
                'hydrator_name' => 'Zend\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Status\\V1\\Rest\\Post\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Status\\V1\\Rest\\Post\\PostResource\\Table',
            ),
        ),
    ),
);
