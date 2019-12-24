<?php

namespace Application\controller\account;

use Application\core\Controller;

class LogoutController extends Controller
{
    public function indexAction()
    {
        $this->app->get('user')->logout();
        $this->app->get('response')->redirect($this->app->get('url')->link('home'));
    }
}