<?php

class Comment
{
    private $conn;
    private $table = "komentar"; // ✅ sesuai DB

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua komentar
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        return $this->conn->query($query);
    }

    // Simpan komentar
    public function insert($isi_komentar)
    {
        $query = "INSERT INTO {$this->table} (isi_komentar) VALUES (:isi_komentar)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':isi_komentar', $isi_komentar);
        return $stmt->execute();
    }
}