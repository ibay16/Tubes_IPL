<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/database.php';

// Load Controllers
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
        (new BookingController())->index();
        break;

    case 'admin':
        (new AdminController())->index();
        break;

    default:
        echo "Halaman tidak ditemukan";
}
