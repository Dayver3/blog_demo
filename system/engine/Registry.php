<?php

namespace Application\engine;

final class Registry
{
    protected static $registry = [];

    public static function set($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        return static::has($key) ? static::$registry[$key] : null;
    }

    public static function has($key)
    {
        return isset(static::$registry[$key]);
    }
}