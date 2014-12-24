<?php
return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '',
        'username'    => '',
        'password'    => '',
        'dbname'      => '',
    ),
    'profiler' => false,

    'hosts' => array(
        'test'=> 'test.work5.phal',
        'api' => 'api.work5.phal',
    )
));