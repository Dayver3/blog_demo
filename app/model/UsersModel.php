<?php

namespace Application;

use Application\core\Model;

class UsersModel extends Model
{
    private $id;
    private $username;
    private $email;
    private $role;

    public function __construct($db, $request, $session)
    {
        parent::__construct($db);
    }
}