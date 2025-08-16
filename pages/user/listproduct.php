<?php
session_start();
$role = $_SESSION['role'];
$userid = $_SESSION['user_id'];

if ($role == "user") {
    include("../../common/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `product`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("../../common/package.php");  ?>
  <link rel="stylesheet" href="../../css/user/onlineproduct.css">
  <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body class="bg-light">

<?php include("../../common/navbar.php");?>

  <h1>welcome user</h1>

<div class="container py-4">
  <h2 class="text-warning fw-bold mb-4">Our product Collection</h2>
  <div class="row g-4">
    <?php while ($row = mysqli_fetch_assoc($result)) {
        $discountedPrice = $row['price'] - ($row['price'] * ($row['discount'] / 100));
    ?>
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm position-relative">
          <span class="badge bg-danger discount-badge"><?php echo $row['discount']; ?>% OFF</span>
          <img src="../<?php echo $row['image_path']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?> (<?php echo $row['flavour']; ?>)</h5>
            <p class="price">
              ₹<?php echo number_format($discountedPrice, 2); ?>
              <span class="old-price">₹<?php echo number_format($row['price'], 2); ?></span>
            </p>
            <p class="text-muted mb-2">Type: <?php echo $row['type']; ?></p>
            <p class="text-muted mb-2">Brand: <?php echo $row['brand']; ?></p>
            <a href="#" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#buyModal<?php echo $row['id'] ?>" >Buy Now</a>
          </div>
        </div>
      </div>


    <!-- buy now popup -->

    <div class="modal fade" id="buyModal<?php echo $row['id'] ?>" >
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="../../API/placeorder.php" method="post">
            <div class="modal-header">
              <h3 class="modal-title">Buy <?php echo$row["name"]?></h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="product_id" value="<?php echo$row["id"]?>">
              <input type="hidden" name="product_name" value="<?php echo$row["name"]?>">
              <input type="hidden" name="price" value="<?php echo $discountedPrice ?>">
              <label for="">Quantity:</label>
              <input type="number" name="quantity" class="form-control" min="1" value="1" required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Confirm Order</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php } ?>
  </div>
</div>

</body>
</html>
<?php
} else {
    echo "<script>alert('You are not allowed!');
          window.location.href = '../../index.php';</script>";
}
?>
