<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';
/**
 * Application input
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */
class Application
{

    public function run()
    {
        $debug = new Phalcon\Debug();
        $debug->listen();

        // DI Container
        $di = new Phalcon\DI\FactoryDefault();

        $config = $this->getConfig();
        $di->set('config', $config, true);

        $loader = $this->getLoader($config);

        $di->set('loader', $loader, true);

        $application = new \Application\Mvc\HMVCApplication($di);

        // Registering modules
        $application->registerModules($config->modules->toArray());

        // Routing
        $router = new Phalcon\Mvc\Router();

        $router->setDefaultModule('index');
        $router->setDefaultController('index');
        $router->setDefaultAction('index');

        // Default router

        $router->add('/:module/:controller/:action/:params', array(
            'module'     => 1,
            'controller' => 2,
            'action'     => 3,
            'params'     => 4
        ))->setName('default');

        foreach ($application->getModules() as $module) {
            $routesClassName = str_replace('Module', 'Routes', $module['className']);
            if (class_exists($routesClassName)) {
                $routesClass = new $routesClassName();
                $router      = $routesClass->add($router);
            }
        }

        $di->set('router', $router);

        // URL component
        $di->set('url', function() {
                    $url = new Phalcon\Mvc\Url();
                    $url->setBaseUri('/');
                    $url->setBasePath('/');
                    return $url;
                }, true);


        // View
        $view = new Phalcon\Mvc\View();
        $view->setLayout('main'); // default layout
        $viewEngines = array(
            ".volt" => function($view, $di) {
                $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
                $volt->setOptions(array(
                    'compiledPath'  => __DIR__ . '/cache/volt/',
                    'compileAlways' => (APPLICATION_ENV == 'prod')
                ));

                return $volt;
            },
            '.phtml' => '\Phalcon\Mvc\View\Engine\Php'
        );
        $view->registerEngines($viewEngines);
        $di->set('view', $view, true);

        $viewSimple = new \Phalcon\Mvc\View\Simple();
        $viewSimple->registerEngines($viewEngines);
        $di->set('viewSimple', $viewSimple);

        // Database
        $di->set('db', function() use ($config) {
            return new Phalcon\Db\Adapter\Pdo\Mysql(array(
                'host'     => $config->database->host,
                'username' => $config->database->username,
                'password' => $config->database->password,
                'dbname'   => $config->database->name,
                'charset'  => $config->database->charset,
            ));
        });
        $di->set('dbRead', function() use ($config) {
            return new Phalcon\Db\Adapter\Pdo\Mysql(array(
                'host'     => $config->databaseRead->host,
                'username' => $config->databaseRead->username,
                'password' => $config->databaseRead->password,
                'dbname'   => $config->databaseRead->name,
                'charset'  => $config->databaseRead->charset,
            ));
        });

        // ModelsMetadata
        $modelsMetadata = new Phalcon\Mvc\Model\Metadata\Memory();
        $di->set('modelsMetadata', $modelsMetadata);

        // Session
        $di->setShared('session', function() {
                    $session = new Phalcon\Session\Adapter\Files();
                    $session->start();
                    return $session;
                });

        // Flash messenger
        $di->set('flash', function() {
                    $flash = new Phalcon\Flash\Session(array(
                        'error'   => 'alert alert-error',
                        'success' => 'alert alert-success',
                        'notice'  => 'alert alert-info',
                    ));
                    return $flash;
                });

        // Assets
        $assetsManager = new Phalcon\Assets\Manager();
        $di->set('assets', $assetsManager);

        $dispatcher = new \Phalcon\Mvc\Dispatcher();
/*
        $eventsManager = new \Phalcon\Events\Manager();
        $eventsManager->attach("dispatch", function($event, $dispatcher, $exception) use ($di) {

                    // Errors. Обработка ошибок
                    if ($event->getType() == 'beforeNotFoundAction') {
                        $dispatcher->forward(array(
                            'module'     => 'index',
                            'controller' => 'error',
                            'action'     => 'notFound'
                        ));
                        return false;
                    }

                    //Альтернативный путь. Когда контроллер или екшн не найдены
                    if ($event->getType() == 'beforeException') {
                        switch ($exception->getCode()) {
                            case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                            case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                                $dispatcher->redirect(array(
                                    'module'     => 'index',
                                    'controller' => 'error',
                                    'action'     => 'notFound'
                                ));
                                return false;
                        }
                    }
                });

        //Bind the EventsManager to the dispatcher
        $dispatcher->setEventsManager($eventsManager);
*/
        $di->setShared('dispatcher', $dispatcher);

        // Handle the request
        $application->setDI($di);

        // The core of all the work of the controller occurs when handle() is invoked:
        echo $application->handle()->getContent();

    }

    /**
     * @return \Phalcon\Config
     */
    protected function getConfig()
    {
        return include __DIR__.DS.'config'.DS.'config.php';
    }

    /**
     * @return \Phalcon\Loader
     */
    protected function getLoader( \Phalcon\Config $config )
    {
        $loader =  new \Phalcon\Loader();
        $loader->registerNamespaces($config->loader->namespaces->toArray());
        $loader->registerDirs(array($config->application->pluginsDir));
        $loader->register();

        return $loader;


    }

    protected function getProfiler()
    {
        $profiler = new \Fabfuel\Prophiler\Profiler();
        $toolbar = new \Fabfuel\Prophiler\Toolbar($profiler);
        $toolbar->addDataCollector(new \Fabfuel\Prophiler\DataCollector\Request());
        $pluginManager = new \Fabfuel\Prophiler\Plugin\Manager\Phalcon($profiler);
        $pluginManager->register();
    }
}