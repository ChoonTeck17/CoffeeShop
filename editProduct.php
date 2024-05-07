

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
</head>
<body>
  <?php
  include("Header.php");

  if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    // echo $edit_id;
    $query = "select * from products where id = '$edit_id'";
    $result= mysqli_query($con,$query); 
    if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $roww = $row['p_price'];
    // echo "$roww";
  ?>
  <div class="container">
    <div class="card p-4" style="max-width: 400px; margin: 0 auto;">
        <h1 class="my-4 text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
           <div class="mb-3">
                <input type="hidden" name ="pid" class="form-control" value="<?php echo $row['id']?>" >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="text" name ="pname" class="form-control" required value="<?php echo $row['p_name']?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Product price</label>
                <input type="number" name ="pprice"  class="form-control" required value="<?php echo $row['p_price']?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Product Description</label>
                <input type="text" name ="pdesc"  class="form-control" required value="<?php echo $row['p_description']?>"> 
            </div>
            <div class="mb-3">
            <div class="text-center">
                <img src="image/<?php echo $row['p_image']?>" alt="" class="img-fluid" style="max-width: 100px; max-height: 100px; display: inline-block;">
            </div><br>
                <input type="file" name ="pimage"  class="form-control" required accept="image/png, image/jpg, image/jpeg">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="edit">Update</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
</div>
<?php
}
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Pl+xxW7hV4CJz4ZoA0UVpO7rQE8yLzDm7xJAWFTbjzVbjMNTL/dhdui14gw2YrPi" crossorigin="anonymous"></script>
</body>
</html>
<?php
  include("Db.php");

  if(isset($_POST['edit'])){
    $edit_product_id = $_POST['pid'];
    $edit_product_name = $_POST['pname'];
    // echo $edit_product_name;
    $edit_product_price = $_POST['pprice'];
    $edit_product_desc = $_POST['pdesc'];
    $edit_product_image = $_FILES['pimage']['name'];

    $edit_product_image_tmp = $_FILES['pimage']['tmp_name'];
    $edit_product_image_folder = 'Image/Products/' .$edit_product_image;

    $edit_query = "update products set p_name= '$edit_product_name', p_price= '$edit_product_price', p_description='$edit_product_desc', p_image='$edit_product_image' where id = '$edit_product_id'";
    $result= mysqli_query($con,$edit_query); 

    if($result){
      move_uploaded_file($edit_product_image_tmp, $edit_product_image_folder);
      echo "<script>Swal.fire({ title: 'Product updated successfully!', icon: 'success' });</script>";
      echo "<script>setTimeout(function() { window.location.href = 'ViewProduct.php'; }, 2000);</script>";
      }else{
        echo "<script>Swal.fire({ title: 'Failed to delete everything', icon: 'error' });</script>";
      }
  }
?>