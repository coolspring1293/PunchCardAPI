<?php
return array(
    'db' => array(
        'driver'   => 'Pdo_Sqlite',
        //'database' => 'data/music.db',
        'database' => 'data/punchcard.db',
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
            => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);
//
//return array(
//    'zf-mvc-auth' => array(
//        'authentication' => array(
//            'map' => array(),
//        ),
//    ),
//    'db' => array(
//        'adapters' => array(
//            'Adapter Test' => array(),
//            'Db\\StatusLib' => array(),
//            'db_pc' => array(),
//        ),
//    ),
//);
