<?php

namespace Application;

use Application\engine;

class App
{

    public static function init($config)
    {
        $app = core\App::getInstance();

        /**  Config init  */
        $conf = new engine\Config();
        $app->set('config', $conf);

        /** Request init */
        $request = new engine\Request();
        $app->set('request', $request);

        /**  Response init  */
        $response = new engine\Response();
        $app->set('response', $response);

        /** User init */
        $user = new engine\User();
        $app->set('user', $user);

        return new static();
    }

    public function run()
    {
        session_start();

        $route = $_SERVER['REQUEST_URI'];

        if (!$route || $route == '/' || $route == '/home') {
            $route = new engine\Route('index');
        } else {
            $route = new engine\Route($route);
        }

        $app = core\App::getInstance();
        $app->execute($route);
        $app->get('response')->send();
    }
}