

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    include("header.php");
    ?>
    <div class="container">
        <h2 class="mt-5">Add Product</h2>
        <form method="post" action="addProduct.php" class="mt-4" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" id="pname" name="pname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" min="0" required>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" >
            </div>
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include("db.php");
?>

<?php
if(isset($_POST['add'])){
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    // Check if a file was uploaded
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        
        // Check if the file format is allowed
        if($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png") {
            $folder = 'image/'.$image;
            
            // Perform the database insertion
            $query = mysqli_query($con,"INSERT INTO products (p_name, p_price, p_description, p_image) VALUES ('$pname','$price','$description','$image')")
                    or die("insert query failed");
            
            if($query){
                // Move the uploaded file to the specified folder
                move_uploaded_file($image_temp_name, $folder);
                echo "<script>Swal.fire({ title: 'Product insert successfully!', icon: 'success' });</script>";
                echo "<script>setTimeout(function() { window.location.href = 'viewProduct.php'; }, 2000);</script>";
            } else {
                echo "<script>Swal.fire({ title: 'Product insert failed!', icon: 'error' });</script>";
            }
        } else {
            echo "<script>Swal.fire({ title: 'Please use a JPG, JPEG, or PNG image!', icon: 'error' });</script>";
        }
    } else {
        echo "<script>Swal.fire({ title: 'Please select an image!', icon: 'error' });</script>";
    }
}
?>
