<?php require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password === $confirm_password) {
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $user = mysqli_query($koneksi, $query);

    if (!$user) {
      $errormsg =
        header("Location: login.php?register.php?errormsg" . urlencode($msg));
    }

    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password');";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
      header("Location: login.php");
    } else {
      $msg = "Username atau Password salah";
      header("Location: register.php?errormsg=" . urlencode($msg));
    }
  }
}
?>

<?php include "../includes/header.php" ?>


<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">
  <div class="register-card">
    <h2 class="subheading text-center">REGISTER</h2>
    <p class="message">
      <?php
      if (isset($_GET['errormsg'])) {
        echo htmlspecialchars($_GET['errormsg']);
      } else {
        echo 'Please enter your data.';
      }
      ?>
    </p>

    <form method="POST" action="register.php" novalidate>
      <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required autocomplete="username" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" />
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required autocomplete="new-password" />
      </div>
      <button type="submit" class="btn btn-register w-100">Register</button>
    </form>

    <p class="text-center mt-3">
      Already have an account? <a href="login.php">Click here</a>
    </p>
  </div>

</div>



<?php include "../includes/footer.php" ?>