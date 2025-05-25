<?php include '../includes/header.php';
session_start(); ?>

<div class="main-page d-flex flex-column justify-content-center">
  <div class="text-end d-flex flex-column h-100">
    <h2 class="mb-3">Forge Your Legacy, One Trade at a Time.</h2>
    <p class="lead">Buy, sell, and trade rare gear and treasures from your favorite RPG—secure, fast, and built for adventurers.</p>

    <?php if (!isset($_SESSION['user_id'])): ?>
      <div>
        <a href="../auth/register.php" class="btn btn-primary me-2">Register</a>
        <a href="../auth/login.php" class="btn btn-outline-primary">Login</a>
      </div>
    <?php else: ?>
      <div>
        <a href="marketplace.php" class="btn btn-success">Go to Marketplace</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php include '../includes/footer.php' ?>