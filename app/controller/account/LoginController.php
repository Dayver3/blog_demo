<?php

namespace Application\controller\account;

use Application\core\Controller;
use Application\engine\Route;

class LoginController extends Controller
{
    public function indexAction()
    {
        $data = [];

        $data['header'] = $this->app->execute(new Route('header'));


//        $data['header'] = $this->app->
//        $this->app->request
//        var_dump($this->app->request->get);
//        var_dump($this->app->get('request')->post);
    }
}