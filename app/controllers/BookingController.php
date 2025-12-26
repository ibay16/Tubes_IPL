<?php

require_once 'app/models/Booking.php';
require_once 'app/models/Comment.php';

class AdminController
{
    private $db;

    public function __construct()
    {
        // database.php HARUS mengembalikan PDO
        $this->db = Database::connect();
    }

    public function index()
    {
        // Model Booking
        $bookingModel = new Booking($this->db);
        $bookings = $bookingModel->getAll();

        // Model Comment
        $commentModel = new Comment($this->db);
        $comments = $commentModel->getAll();

        // Kirim ke view
        require_once 'app/views/admin.php';
    }
}