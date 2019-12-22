<?php

namespace Application\engine;

class Config
{
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function get()
    {

    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function has()
    {

    }
}