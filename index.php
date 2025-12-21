<?php


require_once 'app/config/database.php';

//Memuat Controller dan Model
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/BookingController.php';
require_once 'app/controllers/AdminController.php';
require_once 'app/models/Booking.php';
require_once 'app/models/Comment.php';

// 3. Routing Sederhana
// Mengambil parameter 'page' dari URL, contoh: index.php?page=booking
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 4. Logika Pemanggilan Controller
switch ($page) {
  case 'home':
    $controller = new HomeController();
    $controller->index();
    break;

  case 'booking':
    $controller = new BookingController();
    $controller->index();
    break;

  case 'admin':
    $controller = new AdminController();
    $controller->index();
    break;

  default:
    echo "Halaman tidak ditemukan";
    break;
}
