<?php
session_start();
include '../includes/koneksi.php';
include '../includes/header.php';

if (!isset($_SESSION['user_id'])) {
  $_SESSION['redirect_url'] = $_SERVER['PHP_SELF'];
  header("Location: ../auth/login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT ui.*, i.name, i.description, i.image_url
        FROM user_items ui
        JOIN items i ON ui.item_id = i.id
        WHERE ui.user_id = $user_id";
$result = mysqli_query($koneksi, $sql);
?>

<main class="container py-4" style="min-height: 80vh;">
  <h1 class="mb-4">My Collection</h1>
  <div class="row">
    <?php while ($item = mysqli_fetch_assoc($result)) : ?>
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="../assets/images/<?= $item['image_url'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
            <p class="card-text"><strong>Owned:</strong> <?= $item['quantity'] ?></p>

            <?php if ($item['is_for_sale']) : ?>
              <p class="card-text"><strong>Status:</strong> On Market (<?= $item['sale_quantity'] ?>)</p>
              <p class="card-text"><strong>Price:</strong> <?= $item['price'] ?> </p>
              <form method="POST" action="../actions/hold.php">
                <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
                <button class="btn btn-warning" type="submit">Hold</button>
              </form>
            <?php else : ?>
              <p class="card-text"><strong>Status:</strong> Not For Sale </p>

              <input type="checkbox" name="sell-toggle" id="sell-toggle" hidden>
              <label for="sell-toggle" class="btn btn-warning mb-2" style="cursor: pointer;"></label>
              <form method="POST" action="../actions/sell.php">
                <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
                <input type="number" name="price" class="form-control mb-2" placeholder="Set price" required>
                <input type="number" name="sale_quantity" class="form-control mb-2" placeholder="Set Quantity" max="<?= $item['quantity'] ?>" required>
                <button class=" btn btn-warning" type="submit">Confirm</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php include '../includes/footer.php'; ?>