<?php


namespace Application\engine;


class Db
{
    public $connection;

    public function __construct($hostname, $database, $username, $password, $port = 3306)
    {
        $this->connection = new \mysqli($hostname, $username, $password, $database, $port);

        if ($this->connection->connect_errno) {
            trigger_error('Error: ' . $this->connection->connect_error . '<br />Error No: ' . $this->connection->connect_errno);
        }

//        $this->connection->set_charset('utf8');
//        $this->connection->query("SET SQL_MODE = ''");
    }

    public function query($sql)
    {
        $query = $this->connection->query($sql);

        if (!$this->connection->errno) {
            if ($query instanceof \mysqli_result) {
                $data = [];

                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }

                $result = (object)[];
                $result->num_rows = $query->num_rows;
                $result->row = isset($data[0]) ? $data[0] : [];
                $result->rows = $data;


                return $result;
            }

            return true;
        }

        return false;
    }

    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}