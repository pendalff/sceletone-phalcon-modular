<?php
namespace Partners;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

    public function registerAutoloaders()
    {
        // Registers an autoloader related to the module
        $di = \Phalcon\DI::getDefault();
        /** @var \Phalcon\Loader $loader */
        $loader = $di->get('loader');
        $loader->registerNamespaces(array(
            'Partners\Components' => __DIR__ . DS . 'Components'
        ), true);
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Partners\Controller');
        $di->set('dispatcher', $dispatcher);

        /** @var \Phalcon\Assets\Manager $assets */
        $assets = $di->get('assets');
        $assets->collection('headerJs')
            ->setPrefix('js/partners/')
            ->addJs('jquery-1.10.2.min.js', true, false)
            ->addJs('modernizr.js', true, false)
            ->addJs('jquery-ui-1.10.4.custom.min.js', true, false)
            ->addJs('jquery.maskedinput.min.js', true, false)
            ->addJs('jquery.placeholder.js', true, false)
            ->addJs('jquery.main.js', true, true)
            //->setSourcePath(PUBLIC_PATH.'/static/partners/')
            //->addFilter(new \Phalcon\Assets\Filters\Jsmin())
;
        $assets->collection('headerCss')
            ->setPrefix('css/partners/')
            ->addCss('bootstrap.css', true, true)
            ->addCss('south-street/jquery-ui-1.10.4.custom.css', true, true)
            ->addCss('all.css', true, true)
            //->setTargetPath(PUBLIC_PATH.DS.'assets')
           // ->addFilter(new \Phalcon\Assets\Filters\Cssmin())
;



        $view = $di->get('view');
        /* use it for extend volt!
        $compiler = $view->getCompiler();
        $compiler->addFunction()
            */
        $view->setViewsDir(__DIR__ . '/views/');
        $di->set('view', $view);

        $viewSimple = $di->get('viewSimple');
        $viewSimple->setViewsDir(__DIR__ . '/views/');
        $di->set('viewSimple', $viewSimple);
    }

}