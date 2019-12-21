<?php

namespace Application;

use Application\core;
use Application\controller;

final class App
{
    private $registry;

    public static function init()
    {
        $app = new static;

        /**  Registry init  */
        $registry = new core\Registry();
        $app->registry = $registry;

        /**  Response init  */
        $response = new core\Response();
        $app->registry->set('response', $response);


        return $app;
    }

    public static function run()
    {
        $route = $_SERVER['REQUEST_URI'];

        if (!$route || $route == '/' || $route == '/home') {
            $route = new core\Route('home');
        } else {
            $route = new core\Route($route);
        }

        $front = core\Front::getInstance();
        $front->execute($route);
        var_dump($route);
    }
}