<?php
session_start();
$role = $_SESSION['role'];

if($role == "admin"){

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include("../../common/package.php");?>
  <link rel="stylesheet" href="../../css/admin/addproduct.css">
  <link rel="stylesheet" href="../../css/navbar.css">
</head>
<body>
    <?php include("../../common/navbar.php");?>

  <h1>welcome admin</h1>

  <form class="form-card" action="../../API/addproduct.php" method="post" enctype="multipart/form-data">
    <h3 class="text-center mb-4 text-uppercase text-warning fw-bold">Add Ice Cream</h3>

    <div class="mb-3 text-center">
      <img src="#" id="preview" width="150" height="150" alt="image preview" style="display: none;">
    </div>

    <div class="mb-3">
      <label>Upload image of ice cream</label>
      <input type="file" name="image" id="inputImage" class="form-control" accept="image/png, image/jpg, image/jpeg" required>
    </div>

    <div class="mb-3">
      <label>Ice Cream Name</label>
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
      <label>Ice Cream Type</label>
      <select name="type" class="form-select" required>
        <option value="" hidden>Select Your Ice Cream Type</option>
        <option value="cones">Cones</option>
        <option value="cups">Cups</option>
        <option value="stick">Stick</option>
        <option value="icecreamecake">Ice Cream Cake</option>
        <option value="rolled">Rolled</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Ice Cream Brand</label>
      <input type="text" name="brand" class="form-control" required>
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
echo "<script>alert('Your not admin !');
            window.location.href = '../../index.php';</script>";
}

?>