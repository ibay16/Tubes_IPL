<?php

class Database
{
    public static function connect()
    {
        try {
            return new PDO(
                "mysql:host=localhost;dbname=zara_eyelash;charset=utf8",
                "root",
                "ibay2003",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}