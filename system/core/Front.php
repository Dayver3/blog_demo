<?php


namespace Application\core;


class Front
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function execute (Route $route)
    {
        $controller = new \ReflectionClass($route->getController());

        $controller->getMethod($route->getAction())->invokeArgs($controller->newInstance(), $route->getArgs());
    }
}