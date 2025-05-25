<?php
require_once '../includes/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username';";
  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    // if (password_verify($password, $data['password'])) {
    if ($password === $data['password']) {
      session_start();
      $_SESSION['user_id'] = $data['id'];
      $_SESSION['username'] = $data['username'];
      $_SESSION['role'] = $data['role'];

      if ($_SESSION['role'] === 'user') {
        header("Location: ../pages/homepage.php");
      } else if ($_SESSION['role'] === 'admin') {
        header("Location: ../admin/dashboard.php");
      } else {
        header("Location: ../pages/login.php");
      }
      exit();
    } else {
      echo "pass salah";
    }
  }
}
?>

<?php include "../includes/header.php" ?>

<div class="auth-wrapper">
  <div class="auth-card">
    <h2>WELLCOME!</h2>
    <p>Masukan Username dan Password</p>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-success w-100" name="login">Login</button>
    </form>

    <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
  </div>
</div>

<?php include "../includes/footer.php" ?>