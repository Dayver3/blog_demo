<?php

namespace Application\engine;

class Route
{
    private $controller;
    private $action = 'indexAction';
    private $args = [];


    public function __construct($route)
    {
        if (!$route || $route === '/' || $route === '/home') {
            $route = 'index';
        } elseif (preg_match('#^(?P<route>.+)\?#', $route, $matches)) {
            $route = $matches['route'];
        }

        $parts = explode('/', trim($route, '/'));

        while ($parts) {
            $class = 'Application\\controller\\' . implode('\\', array_map('ucfirst', $parts)) . 'Controller';

            if (!class_exists($class)) {
                $class = 'Application\\controller\\layout\\' . implode('\\', array_map('ucfirst', $parts)) . 'Controller';
            }

            if (!class_exists($class)) {
                $class = 'Application\\controller\\account\\' . implode('\\', array_map('ucfirst', $parts)) . 'Controller';
            }

            if (!class_exists($class)) {
                $class = 'Application\\controller\\content\\' . implode('\\', array_map('ucfirst', $parts)) . 'Controller';
            }

            if (class_exists($class)) {
                $this->controller = $class;
                $parts = [];
                break;
            }

            $this->action = strtolower(array_pop($parts)) . 'Action';
        }

        $this->args = $parts;

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