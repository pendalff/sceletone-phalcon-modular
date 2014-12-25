<?php
$config = new \Phalcon\Config(array(
    'database' => array(
        /** here overload from ENV config */
    ),

    'databaseRead' => array(
        /** here overload from ENV config */
    ),

    'loader'      => array(
        'namespaces' => array(
            'Application' => APPLICATION_PATH . '/modules/Application',
        )
    ),
    'application' => array(
        'cacheDir'       => APPLICATION_PATH. DS . 'cache'. DS,
        'viewsDir'       => APPLICATION_PATH. DS . 'views'. DS,
        'pluginsDir'     => APPLICATION_PATH. DS . 'plugins'. DS,
        'moduleDir'      => APPLICATION_PATH. DS . 'modules'. DS,

        'baseUri'        => '/',
    ),
    'modules' => include __DIR__ . DS . 'modules.php'
));

//merge with ENV config
$config->merge( include( __DIR__ . DS . 'env' . DS . 'config.' . APPLICATION_ENV . '.php') );

//merge module loader
require_once APPLICATION_PATH.DS.'modules'.DS.'Application'.DS.'Loader'.DS.'Modules.php';
$moduleLoader = new \Application\Loader\Modules($config);
$config->merge(new \Phalcon\Config($moduleLoader->modulesConfig($config->modules->toArray())));

return $config;