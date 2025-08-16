<?php
include("../../common/config.php");
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id='$id'"));
?>

<h2>Edit ice cream</h2>
<form action="../../API/editproduct.php" method="POST" enctype="multipart/form-data">
   <h3 class="text-center mb-4 text-uppercase text-warning fw-bold">Add Ice Cream</h3>

    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="mb-3 text-center">
      <img src="../<?php echo $row['image_path'];?>" id="preview" width="150" height="150" alt="image preview">
    </div>

    <div class="mb-3">
      <label>Upload image of ice cream</label>
      <input type="file" name="image" id="inputImage" class="form-control" accept="image/png, image/jpg, image/jpeg" >
    </div>

    <div class="mb-3">
      <label>Ice Cream Name</label>
      <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Flavour</label>
      <input type="text" name="flavour" value="<?php echo $row['flavour'];?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" value="<?php echo $row['price'];?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Discount</label>
      <input type="number" name="discount" value="<?php echo $row['discount'];?>" class="form-control">
    </div>

    <div class="mb-3">
      <label>Ice Cream Type</label>
      <select name="type" value="<?php echo $row['type'];?>" class="form-select" required>
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
      <input type="text" value="<?php echo $row['brand'];?>" name="brand" class="form-control" required>
    </div>

    <div class="text-center">
      <button name="update" class="btn btn-primary px-5 mt-3">Submit</button>
    </div>

</form>

