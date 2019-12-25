<?php

namespace Application\engine;

class User
{
    private $id;
    private $username;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;

        if (isset($_SESSION['user'])) {
            $this->id = $_SESSION['user']['id'];
            $this->username = $_SESSION['user']['username'];
        }

    }

    public function login($data)
    {
        $user = $this->db->query("SELECT * FROM `user` WHERE LOWER (email) = '" . $this->db->escape(strtolower($data['email'])) . "'");


        if ($user->num_rows) {
            if (password_verify($data['password'], $user->row['password'])) {
                $this->id = $_SESSION['user']['id'] = $user->row['id'];
                $this->username = $_SESSION['user']['username'] = $user->row['username'];
            }
        } else {
            $this->logout();
            return false;
        }

        return true;
    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->id = 0;
        $this->username = 'Guest';
    }

    public function isLogged()
    {
        return (bool)$this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getId()
    {
        return $this->id;
    }
}