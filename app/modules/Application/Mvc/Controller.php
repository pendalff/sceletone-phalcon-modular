<?php

/**
 * Controller
 */

namespace Application\Mvc;

/**
 * @property \Phalcon\Mvc\View $view
 * @property \Phalcon\Mvc\View\Simple $viewSimple
 * @property \Phalcon\Http\Cookie $cookies
 */

class Controller extends \Phalcon\Mvc\Controller
{

    public function redirect($url, $code = 302)
    {
        switch ($code) {
            case 301 :
                header('HTTP/1.1 301 Moved Permanently');
                break;
            case 302 :
                header('HTTP/1.1 302 Moved Temporarily');
                break;
        }
        header('Location: ' . $url);
        exit;
    }

    public function returnJSON($response)
    {
        $this->view->disable();

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setContent(json_encode($response));
        $this->response->send();

    }

    public function flashErrors($model)
    {
        foreach($model->getMessages() as $message) {
            $this->flash->error($message);
        }
    }

}