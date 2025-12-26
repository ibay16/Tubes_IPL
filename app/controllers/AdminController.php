<?php

require_once 'app/models/Booking.php';
require_once 'app/models/Comment.php';

class AdminController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        $bookingModel = new Booking($this->db);
        $bookings = $bookingModel->getAll();

        $commentModel = new Comment($this->db);
        $comments = $commentModel->getAll();

        require_once 'app/views/admin.php';
    }
}