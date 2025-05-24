<?php require_once '../includes/koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

$sql = "SELECT ui.*, i.name, i.description, i.image_url 
        FROM user_items ui
        JOIN items i ON ui.item_id = i.id
        WHERE ui.is_for_sale = 1";
$result = mysqli_query($koneksi, $sql);
?>

<?php include '../includes/header.php' ?>

<h1 class="mb-4">Marketplace</h1>
<div class="row">
  <?php while ($item = mysqli_fetch_assoc($result)) : ?>
    <div class="col-md-4 mb-3">
      <div class="card">
        <img src="../assets/images/<?= $item['image_url'] ?>" class="card-img-top" alt="<?= $item['name'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
          <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
          <p class="card-text"><strong>Price:</strong> <?= $item['price'] ?></p>
          <form method="POST" action="../actions/buy.php">
            <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
            <input type="hidden" name="price" value="<?= $item['price'] ?>">
            <input type="hidden" name="seller_id" value="<?= $item['user_id'] ?>">
            <button class="btn btn-primary" type="submit">Buy</button>
          </form>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>


<?php include '../includes/footer.php' ?>