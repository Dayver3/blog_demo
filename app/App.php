<?php

namespace Application;

use Application\engine;

class App
{

    public static function init($config)
    {
//        session_start();
        $app = core\App::getInstance();

        /**  Config init  */
        $conf = new engine\Config();
        $app->set('config', $conf);

        /** Request init */
        $request = new engine\Request();
        $app->set('request', $request);

        /** db init */
        $db = new engine\Db(
            $config['db_hostname'],
            $config['db_database'],
            $config['db_username'],
            $config['db_password'],
            $config['db_port']
        );
        $app->set('db', $db);

        /** Url init */
        $url = new engine\Url('http://' . $_SERVER['HTTP_HOST'] . '/');
        $app->set('url', $url);

        /**  Response init  */
        $response = new engine\Response();
        $app->set('response', $response);

        /** User init */
        $user = new engine\User($db);
        $app->set('user', $user);

        return new static();
    }

    public function run()
    {
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