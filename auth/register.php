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
  <div class="row mb-3">
    <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>
  </div>
  <button type="submit" name="register" class="btn btn-primary">Sign Up</button>
</form>



<?php include "../includes/footer.php" ?>