<?php include '../includes/koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = $_SESSION['user_id'];
  $item_id = $_POST['item_id'];
  $price = $_POST['price'];
  $sale_quantity = $_POST['sale_quantity'];

  if ($price !== null && $price >= 0) {
    $query = "UPDATE user_items 
              SET is_for_sale = 1, sale_quantity = $sale_quantity, price = $price
              WHERE user_id = $user_id AND item_id = $item_id AND quantity > 0";

    mysqli_query($koneksi, $query);

    header("Location: ../pages/collection.php");
    exit;
  } else {
    echo "<script>alert('Invalid item or price')</script>";
  }
}
