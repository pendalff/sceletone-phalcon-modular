<?php
/**
 * ...
 * Date: 24.12.14
 * Time: 19:28
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */

namespace Partners\Components;


class User implements \Phalcon\DI\InjectionAwareInterface
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


    public function isAuth()
    {
        //TODO!
    }


}