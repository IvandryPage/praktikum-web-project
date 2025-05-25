<?php include '../includes/koneksi.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($koneksi, $query);
$u = mysqli_fetch_assoc($result);
?>


<?php include '../includes/header.php'; ?>

<div class="row justify-content-center align-items-center mt-5">
  <div class="col-md-6">
    <div class="card profile-card text-center p-4">
      <h2 class="profile-heading mb-3">Profile</h2>
      <div class="profile-info mb-2">
        <strong class="label">Username:</strong>
        <span class="value"><?= htmlspecialchars($u['username']) ?></span>
      </div>
      <div class="profile-info">
        <strong class="label">Balance:</strong>
        <span class="value">💰 <?= number_format($u['balance'], 2) ?></span>
      </div>
    </div>
  </div>
</div>


<?php include '../includes/footer.php'; ?>