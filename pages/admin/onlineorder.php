<?php
session_start();
$role = $_SESSION['role'];

if ($role == "admin") {
    include("../../common/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `online-order`");
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
    <h2 class="text-warning text-uppercase fw-bold">Online Product List</h2>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>ID</th>
          <th>user Name</th>
          <th>User mail</th>
          <th>product Id</th>
          <th>Product Name</th>
          <th>Product image</th>
          <th>Quantity</th>
          <th>User Mobile</th>
          <th>Status</th>
          <th>Bill</th>
          <th>Pay ment</th>
          <th>Seller id</th>
          <th>Seller Name</th>
          <th>Seller mail</th>
          <th>Order Time</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['mail']; ?></td>
          <td>₹<?php echo $row['productid']; ?></td>
          <td><?php echo $row['productname']; ?></td>
          <td><img src="<?php echo $row['image_path']; ?>" alt="product image"></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>₹<?php echo $row['bill']; ?></td>
          <td><?php echo $row['payment']; ?></td>
          <td><?php echo $row['seller_id']; ?></td>
          <td><?php echo $row['sellername']; ?></td>
          <td><?php echo $row['seller_mail']; ?></td>
          <td><?php echo $row['time']; ?></td>
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
