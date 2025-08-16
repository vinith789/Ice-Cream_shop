<?php
include "../common/config.php";
session_start();
$role = $_SESSION['role'];
$userid = $_SESSION['user_id'];

if ($role == "seller") {

  if($_POST['payment'] == 'paid'){
    $orderId = $_POST['order_id'];
    $payment = $_POST['payment'];

    $sql = "UPDATE `online-order` SET payment = '$payment' WHERE id = '$orderId'";

      if($conn->query($sql) === TRUE){
        echo "<script>alert('Payment updated successfully!');
            window.location.href = '../pages/seller/request.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $orderId = $_POST['order_id'];
      $status = $_POST['status'];

      $sql = "UPDATE `online-order` SET status = '$status' WHERE id = '$orderId'";

        if($conn->query($sql) === TRUE){
          echo "<script>alert('update the order successfull!');
              window.location.href = '../pages/seller/request.php';</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
  }
}

?>