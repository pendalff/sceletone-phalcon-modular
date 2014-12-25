<?php

/**
 * Routes for module Partners
 */

namespace Partners;

use \Phalcon\Mvc\Router\Route;

class Routes
{

    public function add(\Phalcon\Mvc\Router $router)
    {

        $partners = new \Phalcon\Mvc\Router\Group(array(
            'module'     => 'partners',
        ));
        $partners->setName('partners');
        $partners->setHostName(\Phalcon\DI::getDefault()->get('config')->hosts->partners);

        $partners->add('/', array(
            'controller' => 'index',
            'action' => 'index'
        ))->setName('partners.home');

        $partners->add('/how-to-make-money',array(
            'controller' => 'index',
            'action' => 'howMake'
        ))->setName('partners.howMake');

        $partners->add('/promo',array(
            'controller' => 'index',
            'action' => 'promo'
        ))->setName('partners.promo');

        $partners->add('/work5',array(
            'controller' => 'index',
            'action' => 'work5'
        ))->setName('partners.work5');

        $partners->add('/top',array(
            'controller' => 'index',
            'action' => 'top'
        ))->setName('partners.top');

        $partners->add('/faq',array(
            'controller' => 'index',
            'action' => 'faq'
        ))->setName('partners.faq');

        $partners->add('/rules',array(
            'controller' => 'index',
            'action' => 'rules'
        ))->setName('partners.rules');

        $partners->add('/404', array(
            'controller' => 'error',
            'action' => 'page404'
        ))->setName('partners.page404');

        $partners->add('/403', array(
            'controller' => 'error',
            'action' => 'page403'
        ))->setName('partners.page403');

        $router->mount($partners);
        return $router;

    }


    protected function setModuleValues($route, $name)
    {
        $route->setHostName(\Phalcon\DI::getDefault()->get('config')->hosts->partners);
        $route->setName('partners_'.$name);
        return $route;
    }

}