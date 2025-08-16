<?php
include("../common/config.php");
$id = $_GET['id'];

// Get image path first
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id='$id'"));
$image_path = $row['image_path'];

// Delete image file
if (file_exists($image_path)) {
    unlink($image_path);
}

// Delete record
mysqli_query($conn, "DELETE FROM product WHERE id='$id'");

echo "<script>alert('ice cream deleted!');
window.location.href='../pages/admin/listproduct.php';</script>";
?>
