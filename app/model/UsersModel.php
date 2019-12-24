<?php

namespace Application\model;

use Application\core\Model;

class UsersModel extends Model
{
    public function getUserById($id)
    {
        $query = $this->db->query("SELECT * FROM `user` WHERE id= '" . (int)$id . "'");

        return $query->row;
    }

    public function addUser($data)
    {
        $hash = $this->db->escape(password_hash($data['password'], PASSWORD_DEFAULT));

        $this->db->query("INSERT INTO `user` SET username = '" . $this->db->escape($data['username']) . "', email = '" . $this->db->escape($data['email']) . "', password = '" . $hash . "', date_added = NOW() ");
    }

    public function allowUserByEmail($email)
    {
        $query = $this->db->query("SELECT COUNT(*) as userCount FROM `user` WHERE LOWER (email) = '" . $this->db->escape(strtolower($email)) . "'");
        return $query->row['userCount'];
    }

    public function getTotalUsers()
    {
        $sql = 'SELECT COUNT(*) AS total FROM `user`';

        $query = $this->db->query($sql);

        return $query->row['total'];
    }

//    public function getPassByEmail ($email)
//    {
//        $query = $this->db->query("SELECT `password` as password, `username` as username FROM `user` WHERE LOWER (email) = '" . $this->db->escape(strtolower($email)) . "'");
//        return $query;
//    }
}