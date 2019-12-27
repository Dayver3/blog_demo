<?php


namespace Application\model;


use Application\core\Model;

class CommentModel extends Model
{
    public function addComment($data)
    {
        $sql = "INSERT INTO `comment` SET `post_id` = '" . (int)$data['post_id'] . "', `user_id` = '" . (int) $data['user_id'] . "', `author` = '" . $this->db->escape($data['author']) . "', `text` = '" . $this->db->escape(strip_tags($data['comment'])) . "', `date_added` = NOW(), `parent_id` = '" . (int)$data['parent_id'] . "'";

        $this->db->query($sql);
    }

    public function editComment($id, $data)
    {
        $sql = "UPDATE `comment` SET `post_id` = '" . (int)$data['post_id'] . "', `user_id` = '" . (int) $data['user_id'] . "', `author` = '" . $this->db->escape($data['author']) . "', `text` = '" . $this->db->escape(strip_tags($data['text'])) . "', `date_modified` = NOW() WHERE `id` = '" . (int)$id . "'";

        $this->db->query($sql);
    }

    public function deleteComment($id)
    {
        $this->db->query("DELETE FROM  `comment` WHERE id = '" . (int)$id . "'");
    }

    public function getComment($id)
    {
        $query = $this->db->query("SELECT DISTINCT * FROM `comment` WHERE id = '" . (int)$id . "'");

        return $query->row;
    }

    public function getComments()
    {
        $sql = 'SELECT * FROM `comment`';

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getTotalComments()
    {
        $sql = "SELECT COUNT(*) AS total FROM `comment`";

        $query = $this->db->query($sql);

        return $query->row['total'];
    }

    public function getCommentByPostId ($post_id)
    {
        $sql = "SELECT * FROM `comment` WHERE post_id = '" . (int)$post_id ."' ORDER BY `date_added`";

        $query = $this->db->query($sql);

        return $query->rows;
    }

}