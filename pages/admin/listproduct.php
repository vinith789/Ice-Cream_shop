<?php
session_start();
$role = $_SESSION['role'];

if ($role == "admin") {
    include("../../common/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `product`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ice Cream Product List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("../../common/package.php");?>
  <link rel="stylesheet" href="../../css/admin/listproduct.css">
  <link rel="stylesheet" href="../../css/navbar.css">

</head>
<body>

    <?php include("../../common/navbar.php");?>

  <h1>welcome admin</h1>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-warning text-uppercase fw-bold">Ice Cream List</h2>
    <a href="./addproduct.php" class="btn add-btn text-white px-4">+ Add New Product</a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>ID</th>
          <th>Name</th>
          <th>Flavour</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Type</th>
          <th>Brand</th>
          <th>Image</th>
          <th>Added Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['flavour']; ?></td>
          <td>₹<?php echo $row['price']; ?></td>
          <td><?php echo $row['discount']; ?>%</td>
          <td><?php echo ucfirst($row['type']); ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><img src="../<?php echo $row['image_path']; ?>" alt="product image"></td>
          <td><?php echo $row['product-added-time']; ?></td>
          <td>
            <a href="editproduct.php?id=<?php echo $row['id']; ?>" class="btn-link">Edit</a><br>
            <a href="../../API/delete.php?id=<?php echo $row['id']; ?>" class="btn-link text-danger">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>

<?php
} else {
    echo "<script>alert('You are not admin!');
          window.location.href = '../../index.php';</script>";
}
?>
