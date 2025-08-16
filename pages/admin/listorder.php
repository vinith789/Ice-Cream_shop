<?php
session_start();
$role = $_SESSION['role'];

if ($role == "admin") {
    include("../../common/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `orders`");
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
    <h2 class="text-warning text-uppercase fw-bold">Ice Cream order List</h2>

  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>Order ID</th>
          <th>userName</th>
          <th>Product image</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Bill</th>
          <th>Status</th>
          <th>payment status</th>
          <th>Payment</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td>
            <img src="../<?php echo $row['image_path']?>" alt="">
          </td>
          <td><?php echo $row['productname']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>₹<?php echo $row['bill']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['payment']; ?></td>

          <td>
            <form action="../../API/update-order.php" method="post">
              <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="payment" value="paid">
              <button type="submit" class="btn btn-success">pay</button>
            </form>
          </td>
          <td>
            <form action="../../API/update-order.php" method="post">
              <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="status" value="order taken - food on table in 5 min">
              <button type="submit" class="btn btn-success">Update Status</button>
            </form>
            <form action="../../API/update-order.php" method="post">
              <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="status" value="delivered">
              <button type="submit" class="btn btn-primary">Mark as Delivered</button>
            </form>
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
