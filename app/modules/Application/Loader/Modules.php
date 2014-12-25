<?php
/**
 * Modules Loader
 */

namespace Application\Loader;

use Phalcon\Text;

class Modules
{
    /**
     * @var \Phalcon\Config
     */
    protected $config;

    /**
     * @param \Phalcon\Config $config
     */
    public function __construct(\Phalcon\Config $config){
        $this->config = $config;
    }

    /**
     * @param $modules_list
     * @return array
     */
    public function modulesConfig($modules_list)
    {
        $namespaces = array();
        $modules = array();

        if (!empty($modules_list)) {
            foreach ($modules_list as $module) {
                $namespaces[$module] = $this->config->application->moduleDir . $module;
                $simple = Text::uncamelize($module);
                $simple = str_replace('_', '-', $simple);
                $modules[$simple] = array(
                    'className' => $module . '\Module',
                    'path' => APPLICATION_PATH . '/modules/' . $module . '/Module.php'
                );
            }
        }
        $modules_array = array(
            'loader' => array(
                'namespaces' => $namespaces,
            ),
            'modules' => $modules,
        );

        return $modules_array;
    }

} 