<?php

namespace Application\engine;

class Request
{
    public $get = [];
    public $post = [];
    public $cookie = [];
    public $files = [];
    public $server = [];
    public $request = [];

    public function __construct()
    {
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        $this->request = $this->clean($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
        $this->server = $this->clean($_SERVER);
    }

    public function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);

                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }

        return $data;
    }

    public function isPost()
    {
        if ($this->server['REQUEST_METHOD'] === 'POST') {
            return true;
        } else return false;
    }
}