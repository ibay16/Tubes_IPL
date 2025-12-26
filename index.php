<?php

require_once 'config/database.php';

// Memuat Controller
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/BookingController.php';
require_once 'app/controllers/AdminController.php';

// Ambil parameter page & action
$page   = $_GET['page']   ?? 'home';
$action = $_GET['action'] ?? 'index';

// Routing
switch ($page) {
  case 'home':
    $controller = new HomeController();

    if (method_exists($controller, $action)) {
      $controller->$action();
    } else {
      $controller->index();
    }
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
