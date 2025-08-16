<?php
session_start();
$role = $_SESSION['role'];

if($role == "seller"){
$userid = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include("../../common/package.php");?>
  <!-- <link rel="stylesheet" href="../../css/admin/addproduct.css"> -->
    <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body>

  <?php include("../../common/navbar.php");?>

  <h1>welcome seller</h1>

  <form class="form-card" style="width: 60%; margin-left: 150px; " action="../../API/seller/addproduct.php" method="post" enctype="multipart/form-data">
    <h3 class="text-center mb-4 text-uppercase text-warning fw-bold">Add Product</h3>

    <input type="hidden" name="seller_id" value="<?php echo $userid?>" >

    <div class="mb-3 text-center">
      <img src="#" id="preview" width="150" height="150" alt="image preview" style="display: none;">
    </div>

    <div class="mb-3">
      <label>Upload image of product</label>
      <input type="file" name="image" id="inputImage" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
    </div>

    <div class="mb-3">
      <label>Product full Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Flavour</label>
      <input type="text" name="flavour" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Discount</label>
      <input type="number" name="discount" class="form-control">
    </div>

    <div class="mb-3">
      <label>Brand</label>
      <input type="text" name="brand" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Delivery time</label>
      <select name="time" class="form-select" required>
        <option value="" hidden>Select Your time</option>
        <option value="0 to 15">0 to 15 min</option>
        <option value="15 to 30">15 to 30 min</option>
        <option value="30 to 45">30 to 45 min</option>
        <option value="45 to 1hr">45 min to 1 hr</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Shop Name</label>
      <input type="text" name="shop_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email id</label>
      <input type="email" name="mail" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>moblie number</label>
      <input type="tel" name="mobile" class="form-control" required>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary px-5 mt-3">Submit</button>
    </div>
  </form>


  <script>
    const imageinput = document.getElementById("inputImage");
    const preview = document.getElementById("preview");

    imageinput.onchange = evt =>{
      const[file] = imageinput.files;
      if(file){
        preview.style.display = "block";
        preview.src = URL.createObjectURL(file);
      }
    };

  </script>

</body>
</html>

<?php }
else{
echo "<script>alert('Your not seller !');
            window.location.href = '../../index.php';</script>";
}

?>