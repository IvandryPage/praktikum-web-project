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



<form action="" method="POST">
  <div class="row mb-3">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username">
    </div>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Log In</button>
</form>



<?php include "../includes/footer.php" ?>