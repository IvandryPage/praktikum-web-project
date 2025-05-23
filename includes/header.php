<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Terahub Marketplace</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h4 m-0">🛒 Terahub</h1>
      <nav>
        <a href="homepage.php" class="text-white me-3">Home</a>
        <a href="marketplace.php" class="text-white me-3">Marketplace</a>
        <a href="collection.php" class="text-white me-3">My Collection</a>
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="logout.php" class="text-white">Logout</a>
        <?php else: ?>
          <a href="login.php" class="text-white">Login</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>
  <main class="container mt-4 h-100">