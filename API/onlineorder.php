<?php
include "../common/config.php";
session_start();
$role = $_SESSION['role'];
$userid = $_SESSION['user_id'];

if ($role == "user") {

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
     $seller_id = $_POST['seller_id'];
     $result = mysqli_query($conn, "SELECT * FROM `register` WHERE id = '$seller_id'");

    if ($row = mysqli_fetch_assoc($result)) {
      $sellername = $row['username'];
      $email = $row['email'];
      $mobile_seller = $row['number'];
    }

    $username = $_SESSION['user_name'];
    $mail = $_SESSION['user_email'];
    $productid = $_POST['product_id'];
    $productname = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $mobile = $_POST['mobile'];
    $bill = $quantity * $price;
    $delivery_time = $_POST['time'];
    $image_path = $_POST['image_path'];
    $pay = "not paid";
    $status = 'pending';

    $sql =  "INSERT INTO `online-order` (username, mail, productid, productname, image_path, quantity, mobile, status, delivery-time, bill, payment, seller_id, sellername, seller_mail, seller_mobile)
              VALUES ('$username', '$mail', '$productid', '$productname','$image_path ', '$quantity','$mobile', ' $status','$delivery_time', '$bill' , '$pay', '$seller_id', '$sellername', '$email', '$mobile_seller')";

      if($conn->query($sql) === TRUE){
        echo "<script>alert('order successfull!');
            window.location.href = '../pages/user/status.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }
  }
else {
    echo "<script>alert('You are not authorized to access this page.');</script>";
    header("Location: ../index.php");
    exit();
  }


?>