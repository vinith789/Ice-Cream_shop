<?php

include "../../common/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $seller_id = $_POST["seller_id"];
  $name = $_POST["name"];
  $flavour = $_POST["flavour"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];
  $time = $_POST["time"];
  $brand = $_POST["brand"];
  $shop_name = $_POST["shop_name"];
  $location = $_POST["location"];
  $mail = $_POST["mail"];
  $mobile = $_POST["mobile"];
  $image = $_FILES["image"]["name"];
  $temp = $_FILES["image"]["tmp_name"];
  $folder = "../../upload/image" . $image;

if(move_uploaded_file($temp, $folder)){

  mysqli_query(mysql:$conn,query:"INSERT INTO `online-product` (seller_id, image_path, name, flavour, price, discount, brand, time, shop_name, location,mail,mobile,status)
  VALUES ('$seller_id','$folder','$name', '$flavour', '$price', '$discount','$brand','$time', '$shop_name', '$location','$mail','$mobile', 'pending')");
  echo "<script>alert('product addedd successfull!');
            window.location.href = '../../pages/seller/listproduct.php';</script>";

  }
}



?>