<?php include '../includes/koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $item_id = $_POST['item_id'];

  $query = "UPDATE user_items 
              SET is_for_sale = 0, price = 0
              WHERE user_id = $user_id AND item_id = $item_id";

  mysqli_query($koneksi, $query);

  header("Location: ../pages/collection.php");
  exit;
}
