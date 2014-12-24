<?php

namespace Api\Controller;

use Api\Responce;
use Application\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->view->disable();
        $this->returnJSON(array(
            'result' => array(
                'test' => true,
                'string'=> 'str',
                'null' => null
            )
        ));
    }

}