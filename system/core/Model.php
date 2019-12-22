<?php


namespace Application\core;


abstract class Model
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}