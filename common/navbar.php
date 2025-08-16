<?php

$role = $_SESSION["role"];
// echo $role;
?>

<nav>
  <div class="navbar-container">
    <a class="navbar-brand" href="#">IceCream Shop</a>
    <ul class="navmenu">
      <li><a href="./index.php">Home</a></li>
      <?php
        if($role == 'seller'){
      ?>
      <li><a href="./listproduct.php">Online Product</a></li>
      <li><a href="./ourproduct.php">Our Product</a></li>
      <li><a href="./addproduct.php">Add Product</a></li>
      <li><a href="./request.php">Request</a></li>
      <?php
        } elseif($role == 'admin') {?>
      <li><a href="./addproduct.php">Add Product</a></li>
      <li><a href="./listproduct.php">List Product</a></li>
      <li><a href="./listorder.php">List Order</a></li>
      <li><a href="./sellerrequest.php">Request</a></li>
      <li><a href="./onlineorder.php">Online Order</a></li>
      <?php }else { ?>
      <li><a href="#">About</a></li>
      <li><a href="./listproduct.php">Product</a></li>
      <li><a href="./onlinelistproduct.php">Online Product</a></li>
      <li><a href="./offlinestatus.php">Status</a></li>
      <?php }?>

      <a href="../../API/Logout.php" class="logout-link">Logout</a>
    </ul>
  </div>
</nav>