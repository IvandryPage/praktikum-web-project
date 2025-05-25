<?php include '../includes/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>TeraHub</title>

  <!-- CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cardo:ital,wght@0,400;0,700;1,400&family=Cinzel:wght@400..900&family=Uncial+Antiqua&display=swap" rel="stylesheet">


  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <header>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-end animate__animated animate__flipInX" href="../pages/homepage.php">
          <img src="../assets/images/icon.svg" alt="Logo" width="36" height="36" class="d-inline-block align-text-top">
          TeraHub
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav container-fluid d-flex justify-content-end">
            <li class="nav-item animate__animated animate">
              <a class="nav-link <?= ($current_page == 'homepage.php') ? 'active' : '' ?>" href="../pages/homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'marketplace.php') ? 'active' : '' ?>" href="../pages/marketplace.php">Marketplace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'collection.php') ? 'active' : '' ?>" href="../pages/collection.php">My Collection</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($current_page == 'profile.php') ? 'active' : '' ?>" href="../pages/profile.php">Profile</a>
            </li>
            <?php if (isset($_SESSION['user_id'])): ?>
              <li class="nav-item mx-3">
                <a class="nav-link cta-secondary" href="../auth/logout.php">Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item ">
                <a class="nav-link cta-primary <?= ($current_page == 'login.php') ? 'active' : '' ?>" href="../auth/login.php">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

  </header>
  <main class="container">