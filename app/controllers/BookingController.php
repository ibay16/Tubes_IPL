<?php

require_once 'app/models/Booking.php';

class BookingController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // tampilkan FORM booking
    public function index()
    {
        require_once 'app/views/booking.php';
    }

    // simpan data booking
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $booking = new Booking($this->db);
            $booking->create([
                'nama'    => $_POST['nama'],
                'no_hp'   => $_POST['no_hp'],
                'email'   => $_POST['email'],
                'layanan' => $_POST['layanan'],
                'tanggal' => $_POST['tanggal'],
                'jam'     => $_POST['jam'],
                'catatan' => $_POST['catatan']
            ]);

            header("Location: index.php?page=booking&status=success");
            exit;
        }
    }
}