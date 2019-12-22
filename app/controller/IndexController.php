<?php

namespace Application\controller;

use Application\core\Controller,
    Application\engine\Response,
    Application\core\View;
use Application\engine\Route;

class IndexController extends Controller
{
    public function indexAction()
    {
        $data = [];
        $data['header'] = $this->app->execute(new Route('header'));
        $data['footer'] = $this->app->execute(new Route('footer'));

        $this->app->get('response')->setOutput($this->app->view('home', $data));

//        $this->response->setOutput($this->view('home', $data));

//        $response = new Response();
//
//        $view = new View();
//
//        $response->setOutput($view->render('home'));
//        $this->app->set('response', $response);
    }
}