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

    // --- TAMBAHKAN FUNGSI INI ---
    public function getByPhone($no_hp)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE no_hp = :no_hp ORDER BY tanggal DESC, jam DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM booking ORDER BY tanggal DESC, jam DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
