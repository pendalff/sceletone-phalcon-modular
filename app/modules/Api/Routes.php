<?php
/**
 * Routes for module Api
 */

namespace Api;

class Routes
{

    public function add($router)
    {
        $api = new \Phalcon\Mvc\Router\Group(array(
            'module'     => 'api',
        ));
        $api->setName('api');
        $api->setHostName(\Phalcon\DI::getDefault()->get('config')->hosts->api);

        $api->add('/test', array(
           'controller' => 'index',
            'action' => 'index'
        ));
        $router->mount($api);
        return $router;
    }

}