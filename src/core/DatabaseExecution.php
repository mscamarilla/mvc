<?php


namespace Core;


class DatabaseExecution
{
    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->db;

    }

    public function query(string $sql): ?object
    {
        $query = $this->db->query($sql);

        if (!$this->db->errno) {
            if ($query instanceof \mysqli_result) {
                $data = array();

                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }

                $result = new \stdClass();
                $result->num_rows = $query->num_rows;
                $result->row = isset($data[0]) ? $data[0] : array();
                $result->rows = $data;

                $query->close();

                return $result;
            } else {
                return null;
            }
        } else {
            throw new \Exception('Error: ' . $this->db->error . '<br />Error No: ' . $this->db->errno . '<br />' . $sql);
        }
    }

    public function escape(string $value): string
    {
        return $this->db->real_escape_string($value);
    }

}