<?php

require_once 'app/models/Booking.php';
require_once 'app/models/Comment.php';

class AdminController
{
    private $db;

    // akun admin (tanpa database)
    private $adminUsername = 'admin';
    private $adminPassword = 'admin123';

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // halaman admin / login
    public function index()
    {
        // JIKA BELUM LOGIN → FORM LOGIN
        if (!isset($_SESSION['admin'])) {
            require_once 'app/views/login.php';
            return;
        }

        // JIKA SUDAH LOGIN → DASHBOARD ADMIN
        $bookingModel = new Booking($this->db);
        $bookings = $bookingModel->getAll();

        $commentModel = new Comment($this->db);
        $comments = $commentModel->getAll();

        require_once 'app/views/admin.php';
    }

    // proses login admin
    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $this->adminUsername && $password === $this->adminPassword) {
            $_SESSION['admin'] = true;
            header("Location: index.php?page=admin");
        } else {
            $_SESSION['error'] = "Username atau Password salah!";
            header("Location: index.php?page=admin");
        }
    }

    // logout admin
    public function logout()
    {
        unset($_SESSION['admin']);
        header("Location: index.php");
    }
}
