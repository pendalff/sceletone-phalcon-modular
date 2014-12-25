<?php
/**
 * Base controller for module
 * Date: 24.12.14
 * Time: 19:12
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */

namespace Partners\Controller;

use Application\Mvc\Controller;

abstract class BaseController extends Controller
{

    public function initialize()
    {
        $this->tag->setTitle("Партнерская программа");
        $this->view->setVar('year', date('Y'));
    }

}