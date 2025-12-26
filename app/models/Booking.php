<?php

class Booking
{
    private $conn;
    private $table = "bookings";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($data)
    {
        $sql = "INSERT INTO bookings 
                (nama, no_hp, email, layanan, tanggal, jam, catatan)
                VALUES
                (:nama, :no_hp, :email, :layanan, :tanggal, :jam, :catatan)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
}