<?php include '../includes/header.php' ?>

<div class="text-center mb-5">
  <h2 class="mb-3">Pixel by Pixel, Build Your Legend 🎮</h2>
  <p class="lead">Trade your items safely, easily and with style</p>

  <?php if (!isset($_SESSION['user_id'])): ?>
    <a href="../auth/register.php" class="btn btn-primary me-2">Register</a>
    <a href="../auth/login.php" class="btn btn-outline-primary">Login</a>
  <?php else: ?>
    <a href="marketplace.php" class="btn btn-success">Go to Marketplace</a>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php' ?>