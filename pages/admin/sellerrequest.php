<?php
session_start();
$role = $_SESSION['role'];

if ($role == "admin") {
    include("../../common/config.php");
    $result = mysqli_query($conn, "SELECT * FROM `online-product`");

    if(isset($_GET['action']) && isset($_GET['id'])){
      $id = $_GET['id'];
      $action = $_GET['action'] === 'approve' ? 'approve' : 'rejected';
       $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `online-product` WHERE id='$id'"));
        mysqli_query($conn, "UPDATE `online-product` SET
          status='$action'
          WHERE id='$id'");
        if($action == 'approve'){
          echo "<script>alert('You are approve  the product ');
          window.location.href='./sellerrequest.php';</script>";
        }else{
          echo "<script>alert('You are rejected  the product ');
          window.location.href='./sellerrequest.php';</script>";
        }
    }
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

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-warning">
       <tr class="text-center">
          <th>ID</th>
          <th>Name</th>
          <th>Flavour</th>
          <th>Price</th>
          <th>Discount</th>
          <th>D time</th>
          <th>Brand</th>
          <th>Image</th>
          <th>Shop name</th>
          <th>location</th>
          <th>status</th>
          <th>Mail</th>
          <th>Mobile Number</th>
          <th>Added Time</th>
          <th>action</th>
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
          <td><?php echo ucfirst($row['time']); ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><img src="<?php echo $row['image_path']; ?>" alt="product image"></td>
          <td><?php echo $row['shop_name']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['mail']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a href="?action=approve&id=<?=$row['id']?>" onclick="return confirm('Approve this Product?')" class="btn-link">Approve</a><br>
            <a href="?action=reject&id=<?=$row['id']?>" onclick="return confirm('Reject this Product?')"  class="btn-link text-danger">Reject</a>
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
