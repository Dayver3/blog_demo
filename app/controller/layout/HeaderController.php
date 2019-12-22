<?php

namespace Application\controller\layout;

use Application\core\Controller;

class HeaderController extends Controller
{
    public function indexAction()
    {
//        $data['logged'] = $this->user->isLogged();
//        $data['username'] = $this->user->getUserName();
//
//        $data['title'] = $this->document->getTitle();
//        $data['base'] = $this->url->base();
//        $data['links'] = $this->document->getLinks();
//        $data['styles'] = $this->document->getStyles();
//        $data['scripts'] = $this->document->getScripts();

        $data['logged'] = false;
        $data['username'] = 'username';

        $data['title'] = 'customTitle';
        $data['base'] = '';
        $data['links'] = '';
        $data['styles'] = '';
        $data['scripts'] = '';

        return $this->app->view('layout/header', $data);
    }
}