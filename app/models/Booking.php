<?php

class Booking
{
    private $conn;
    private $table = "booking";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($data)
    {
        $sql = "INSERT INTO booking 
                (nama, no_hp, email, layanan, tanggal, jam, catatan)
                VALUES
                (:nama, :no_hp, :email, :layanan, :tanggal, :jam, :catatan)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM booking ORDER BY tanggal DESC, jam DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
