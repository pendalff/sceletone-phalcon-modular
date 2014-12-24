<?php
/**
 * ...
 * Date: 18.12.14
 * Time: 20:17
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */

namespace Api;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

    public function registerAutoloaders()
    {

    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Api\Controller');
        $di->set('dispatcher', $dispatcher);

        /**
         * Setting up the view component
         */
        $view = $di->get('view');
        $view->disable();
        $view->setViewsDir(__DIR__ . '/views/');

    }
}