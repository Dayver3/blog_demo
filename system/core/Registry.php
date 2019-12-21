<?php

namespace Application\core;


class Registry
{
    protected static $registry = [];

    public static function set($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get()
    {
        return static::$registry;
    }
}