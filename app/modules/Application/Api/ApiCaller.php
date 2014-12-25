<?php
/**
 * API caller.
 * Date: 25.12.14
 * Time: 11:35
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */

namespace Application\Api;


class ApiCaller implements \Phalcon\DI\InjectionAwareInterface
{
    protected $di;

    /**
     * Sets the dependency injector
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function setDI($dependencyInjector)
    {
        $this->di = $dependencyInjector;
    }

    /**
     * Returns the internal dependency injector
     *
     * @return \Phalcon\DiInterface
     */
    public function getDI()
    {
        return $this->di;
    }

    /**
     *
     */
    public function __construct()
    {
        // TODO: Implement __construct() method.
    }


    public function generateSign(array $params)
    {

    }

    public function checkSign(array $params)
    {

    }

    public function request($uri, $params, $method = 'GET')
    {
        switch ($method) {
            case 'POST':

            break;
            case 'GET':
            default:
            break;
        }
    }
}