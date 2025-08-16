<?php
include("../common/config.php");




if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $flavour = $_POST['flavour'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $type = $_POST["type"];
    $brand = $_POST['brand'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id='$id'"));

    // If new image uploaded
    if (!empty($image)) {
        $newPath = "../uploads/" . $image;
        move_uploaded_file($temp, $newPath);
        // delete old image
        if (file_exists(filename: $row['image_path'])) unlink($row['image_path']);
    } else {
        $newPath = $row['image_path'];
    }

    mysqli_query($conn, "UPDATE product SET
      name='$name',
      flavour='$flavour',
      price='$price',
      discount='$discount',
      type='$type',
      brand='$brand',
      image_path='$newPath'
      WHERE id='$id'");

    echo "<script>alert('ice cream Updated!');
    window.location.href='../pages/admin/listproduct.php';</script>";
}

?>