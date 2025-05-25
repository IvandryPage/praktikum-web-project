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

      if (isset($_SESSION['redirect_url'])) {
        $redirect = $_SESSION['redirect_url'];
        header("Location: $redirect");
      } else {
        header("Location: ../pages/homepage.php");
      }
      exit();
    }
  }
}
?>

<?php include "../includes/header.php" ?>

<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">
  <div class="register-card">
    <h2 class="subheading text-center">LOG IN</h2>
    <p class="message"><?php if (isset($_GET['errormsg'])) {
                          echo $_GET['errormsg'];
                        } else {
                          echo 'Please enter your data.';
                        }
                        ?></p>
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