<?php

namespace Application\core;


class Route
{
    private $controller;
    private $action;
    private $args = [];

    public function __construct($route)
    {
        if ($route === 'home') {
            $this->controller = 'IndexController';
            $this->action = 'indexAction';
        } else {
            $arr = explode('/', trim($route));
            $this->controller = ucfirst($arr[1]) . 'Controller';
            $this->action = $arr[2] . 'Action';
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getArgs()
    {
        return $this->args;
    }
}