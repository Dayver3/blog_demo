<?php


namespace Application\engine;


class Url
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function link($route)
    {
        $this->url = $this->url . $route;

        return $this->url;
    }
}