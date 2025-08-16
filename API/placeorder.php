<?php
include "../common/config.php";
session_start();
$role = $_SESSION['role'];
$userid = $_SESSION['user_id'];

if ($role == "user") {

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_SESSION['user_name'];
    $mail = $_SESSION['user_email'];
    $productid = $_POST['product_id'];
    $productname = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $bill = $quantity * $price;
    $pay = "not paid";
    $status = 'pending';

    $sql =  "INSERT INTO orders (username, mail, productid, productname, quantity,status, bill, payment)
              VALUES ('$username', '$mail', '$productid', '$productname', '$quantity', ' $status', '$bill' , '$pay')";

      if($conn->query($sql) === TRUE){
        echo "<script>alert('order successfull!');
            window.location.href = '../pages/user/status.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }

}

?>