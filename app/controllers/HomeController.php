<?php

require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../../config/database.php';

class HomeController
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function index()
  {
    $commentModel = new Comment($this->db);
    $comments = $commentModel->getAll();

    require_once 'app/views/home.php';
  }

  public function sendComment()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $commentText = $_POST['comment_text'];

      $commentModel = new Comment($this->db);
      $commentModel->insert($commentText);

      header("Location: index.php?page=home");
      exit;
    }
  }
}
