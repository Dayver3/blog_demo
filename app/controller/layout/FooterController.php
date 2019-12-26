<?php

namespace Application\controller\layout;

use Application\core\Controller;

class FooterController extends Controller
{
    public function indexAction()
    {
        $data = [];

        return $this->app->view('layout/footer', $data);
    }
}