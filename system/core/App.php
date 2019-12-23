<?php

namespace Application\core;

use Application\engine\Route;

final class App
{
    protected $registry = [];

    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get($key)
    {
        return ($this->has($key) ? $this->registry[$key] : null);
    }

    public function set($key, $value)
    {
        $this->registry[$key] = $value;
    }

    public function has($key)
    {
        return isset($this->registry[$key]);
    }

    public function controller($route) {
        $route = new Route($route);
        $this->execute($route);
    }

    public function execute(Route $route)
    {
        try {
            if ($route->getController()) {
                $controller = new \ReflectionClass($route->getController());
                $method = $controller->getMethod($route->getAction());
                return $method->invoke($controller->newInstance($this));
            }
        } catch (\RuntimeException $e) {
            return $e;
        }
    }

    public function view($route, $data = [])
    {
        $view = new View();

        foreach ($data as $key => $value) {
            $view->set($key, $value);
        }

        return $view->render($route);
    }

    public function getRegistry()
    {
        return $this->registry;
    }

    public function model($route)
    {
        $route = ucfirst($route);
        if ($this->has($route)) {
            return $this->get($route);
        }

        $class = 'Application\\model\\' . str_replace('/', '\\', ucwords($route)) . 'Model';

        if (class_exists($class)) {
            $this->set($route, new $class($this));
        } else {
            throw new \Exception('Error: Could not load model ' . $route . '!');
        }

        return $this->get($route);
    }

}