<?php
namespace Partners\Controller;



class IndexController extends BaseController
{

    public function indexAction()
    {

    }

    public function howMakeAction()
    {

    }

    public function promoAction()
    {

    }

    public function work5Action()
    {

    }

    public function topAction()
    {

    }

    public function faqAction()
    {

    }

    public function rulesAction()
    {

    }


    public function checkAction()
    {
        $this->view->disable();
        $req = \Httpful\Request::get($this->di->get('config')->hosts->api.'/test')
            ->expectsJson()
            ->authenticateWith('api_user', 'api_user_pass')
            ->sendIt();
        var_dump($req);
        var_dump(getenv('require_auth'));
    }
}