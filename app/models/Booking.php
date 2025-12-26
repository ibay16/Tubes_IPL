<?php

class Booking
{
    private $conn;
    private $table = "booking";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY tanggal DESC";
        return $this->conn->query($query);
    }
}