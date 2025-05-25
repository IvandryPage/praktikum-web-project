<?php include '../includes/koneksi.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($koneksi, $query);
?>


<?php include '../includes/header.php'; ?>

<h1>Your Profile</h1>

<div class="profile-info">
  <?php $user = mysqli_fetch_assoc($result); ?>
  <h2><?= htmlspecialchars($user["username"]) ?></h2>
  <p><strong>Balance:</strong> <?= htmlspecialchars($user['balance']) ?></p>
</div>

<a href="../auth/logout.php" class="logout-btn">Logout</a>


<?php include '../includes/footer.php'; ?>