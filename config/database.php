<?php
$host = "localhost";
$user = "root";
$pass = "ibay2003";
$db = "zara_eyelash";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
