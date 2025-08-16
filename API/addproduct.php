<?php

include "../common/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $flavour = $_POST["flavour"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];
  $type = $_POST["type"];
  $brand = $_POST["brand"];
  $image = $_FILES["image"]["name"];
  $temp = $_FILES["image"]["tmp_name"];
  $folder = "../upload/image" . $image;

if(move_uploaded_file($temp, $folder)){

  mysqli_query(mysql:$conn,query:"INSERT INTO `product` (name, flavour, price, discount, type, brand, image_path)
  VALUES ('$name', '$flavour', '$price', '$discount', '$type', '$brand', '$folder' )");
  echo "<script>alert('product addedd successfull!');
            window.location.href = '../pages/admin/listproduct.php';</script>";

  }
}



?>