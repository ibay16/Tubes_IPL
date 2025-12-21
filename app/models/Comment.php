<?php

class Comment
{
    private $conn;
    private $table = "comments";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        return $this->conn->query($query);
    }
}
