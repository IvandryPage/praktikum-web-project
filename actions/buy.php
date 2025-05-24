<?php include '../includes/koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $buyer_id = $_SESSION['user_id'];
  $item_id = $_POST['item_id'];
  $price = $_POST['price'];
  $seller_id = $_POST['seller_id'];

  $checkBalance = mysqli_query($koneksi, "SELECT balance FROM users WHERE id = $buyer_id");
  $buyer = mysqli_fetch_assoc($checkBalance);
  if ($buyer['balance'] < $price) {
    header("Location: ../pages/marketplace.php");
    exit;
  }

  $query = "UPDATE user_items
            SET sale_quantity = sale_quantity - 1, quantity = quantity - 1
            WHERE item_id = $item_id AND user_id = $seller_id";
  mysqli_query($koneksi, $query);

  $query = "UPDATE users
            SET balance = balance - $price WHERE id = $buyer_id";
  mysqli_query($koneksi, $query);

  $query = "UPDATE users
            SET balance = balance + $price WHERE id = $seller_id";
  mysqli_query($koneksi, $query);


  $query = "SELECT * FROM user_items WHERE item_id = $item_id AND user_id = $buyer_id;";
  $exist = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($exist) > 0) {
    // update buyer quantity
    $query = "UPDATE user_items
              SET quantity = quantity + 1
              WHERE item_id = $item_id AND user_id = $buyer_id";
    mysqli_query($koneksi, $query);
  } else {
    $query = "INSERT INTO user_items(user_id, item_id, quantity, is_for_sale, sale_quantity, price)
              VALUES ($buyer_id, $item_id,  1, 0, NULL, 0)";
    mysqli_query($koneksi, $query);
  }

  $query = "SELECT * FROM user_items WHERE item_id = $item_id AND user_id = $seller_id AND is_for_sale = 1";
  $result = mysqli_query($koneksi, $query);
  while ($x = mysqli_fetch_assoc($result)) {
    if ($x && $x['quantity'] <= 0) {
      $query = "DELETE FROM user_items WHERE item_id = $item_id AND user_id = $seller_id";
      mysqli_query($koneksi, $query);
    }
  }

  header("Location: ../pages/collection.php");
}
