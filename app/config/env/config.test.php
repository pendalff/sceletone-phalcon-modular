<?php
return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'dbname'      => '',
    ),
    'profiler' => true,

    'hosts' => array(
        'test'=> 'test.work5.phal',
        'api' => 'api.work5.phal',
    )

));