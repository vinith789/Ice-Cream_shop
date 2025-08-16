
<?php
session_start();
$role = $_SESSION['role'];

if ($role == "user") {
    include("../../common/config.php");
    $mail = $_SESSION['user_email'];

    $deliveredorders = mysqli_query($conn, "SELECT * FROM `online-order` WHERE mail ='$mail' AND status = 'delivered' ");
    $takenorders = mysqli_query($conn, "SELECT * FROM `online-order` WHERE mail ='$mail' AND status = 'taken' ");
    // $pending = mysqli_query($conn, "SELECT * FROM `orders` WHERE mail ='$mail' AND status = 'pending' ");
$pendingorders = mysqli_query(
    $conn,
    "SELECT * FROM `online-order` WHERE mail ='$mail' AND TRIM(LOWER(status)) = 'pending'"
);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ordered Product List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("../../common/package.php");?>
  <link rel="stylesheet" href="../../css/admin/listproduct.css">
  <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body>

  <?php include("../../common/navbar.php");?>

  <h1>welcome user</h1>

  <a href="./offlinestatus.php" class="btn btn-warning w-10">Offline Product</a>

  <a href="./onlinestatus.php" class="btn btn-warning w-10">Online Product</a><br>


  <div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-warning text-uppercase fw-bold">Pending ordered List</h2>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>ID</th>
          <th>Name</th>
          <th>Product name</th>
          <th>Quantity</th>
          <th>Bill</th>
          <th>Status</th>
          <th>Payment</th>
          <th>Ordered Time</th>
        </tr>
      </thead>
      <tbody>
        <?php if(mysqli_num_rows($pendingorders) > 0) {?>
        <?php while ($row = mysqli_fetch_assoc($pendingorders)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['productname']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>₹<?php echo $row['bill']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['payment']; ?></td>
          <td><?php echo $row['time']; ?></td>

        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr class="text-center">
          <td colspan="8">No Pending orders found.</td>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<br>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-warning text-uppercase fw-bold">taken ordered List</h2>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>ID</th>
          <th>Name</th>
          <th>Product name</th>
          <th>Quantity</th>
          <th>Bill</th>
          <th>Status</th>
          <th>payment</th>
          <th>Delivery time</th>
          <th>Ordered Time</th>
        </tr>
      </thead>
      <tbody>
        <?php if(mysqli_num_rows($takenorders) > 0) {?>
        <?php while ($row = mysqli_fetch_assoc($takenorders)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['productname']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>₹<?php echo $row['bill']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['payment']; ?></td>
          <td><?php echo $row['delivery-time']; ?> min</td>
          <td><?php echo $row['time']; ?></td>

        </tr>
        <?php } ?>
        <?php } else {?>
          <tr class="text-center">
          <td colspan="8">No Taken orders found.</td>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<br>
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-warning text-uppercase fw-bold">delivered ordered List</h2>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
        <tr class="text-center">
          <th>ID</th>
          <th>Name</th>
          <th>Product name</th>
          <th>Quantity</th>
          <th>Bill</th>
          <th>Status</th>
          <th>Payment</th>
          <th>Delivery  Time</th>
          <th>Ordered Time</th>
        </tr>
      </thead>
      <tbody>
        <?php if(mysqli_num_rows($deliveredorders) > 0) {?>
        <?php while ($row = mysqli_fetch_assoc($deliveredorders)) { ?>
        <tr class="text-center">
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['productname']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td>₹<?php echo $row['bill']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['payment']; ?></td>
          <td><?php echo $row['delivery-time']; ?> min</td>
          <td><?php echo $row['time']; ?></td>

        </tr>
        <?php } ?>
        <?php } else { ?>
        <tr class="text-center">
          <td colspan="9">No delivered orders found.</td>
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
