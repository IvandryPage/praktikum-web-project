<?php require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, password, role) VALUES ('$username', '$password', 'user');";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
      echo "<script>alert('Akun berhasil dibuat')</script>";
    } else {
      echo "<script>alert('Akun gagal!')</script>";
    }
  }
}
?>

<?php include "../includes/header.php" ?>


<div class="auth-wrapper">
  <div class="auth-card">
    <h2>REGISTER</h2>
    <p><?php if (isset($_GET['errormsg'])) {
          echo $_GET['errormsg'];
        } else {
          echo 'Please enter your data.';
        }
        ?></p>

    <form method="POST" action="register.php">
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="password2" class="form-label">Konfirmasi Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>

    <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Klik di sini</a></p>
  </div>
</div>



<?php include "../includes/footer.php" ?>