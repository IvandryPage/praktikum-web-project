<?php
include '../includes/koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>TeraHub</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <header>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php">
          <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          TeraHub
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'homepage.php') ? 'active' : '' ?>" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'marketplace.php') ? 'active' : '' ?>" href="marketplace.php">Marketplace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'collection.php') ? 'active' : '' ?>" href="collection.php">My Collection</a>
            </li>
          </ul>

          <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="../auth/logout.php">Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link <?= ($current_page == 'login.php') ? 'active' : '' ?>" href="../auth/login.php">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>
  <main class="container mt-4 h-100">