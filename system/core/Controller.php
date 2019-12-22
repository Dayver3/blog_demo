<?php


namespace Application\core;


abstract class Controller
{
    protected $app;
    protected $data = [];

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function __get($key) {
        return $this->app->get($key);
    }

    public function __set($key, $value) {
        $this->app->set($key, $value);
    }

    //    public function __get($key)
//    {
//        return Registry::get($key);
//    }
//
//    public function __set($key, $value)
//    {
//        Registry::set($key, $value);
//    }
//
//    public function __isset($key)
//    {
//        return Registry::has($key);
//    }
}