
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    /* Custom CSS to set fixed height for card */
    .card {
        height: 470px; /* Adjust the height as needed */
        
    }

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <?php
    include ("header.php");
    ?>
    <div class ="container py-5 bg-dark" >
    <div class ="row mt-4">

        <?php
    $con = mysqli_connect("localhost", "root", "", "cart");
    $query = "select * from products";
    $result= mysqli_query($con,$query);
    $result1= mysqli_num_rows($result);

    if($result1){
        while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="col-md-4">
                    <div class="card border-0">
                        <div class="card-body p-4 mb-4 bg-white ">
                        <div class="text-center">

                            <img src="image/<?php echo "{$row['p_image']}"; ?>" class="card-img-top img-fluid" alt="Product Image">
                            <h4 class="card-title"><?php echo "{$row['p_name']}";?></h4>
                            <h6 class> Price $ <?php echo "{$row['p_price']}"; ?></h6><i></i>
                            <form method="post">
                                <input type="hidden" name="p_name" value="<?php echo "{$row['p_name']}"; ?>">
                                <input type="hidden" name="p_price" value="<?php echo "{$row['p_price']}"; ?>">
                                <input type="hidden" name="p_image" value="<?php echo "{$row['p_image']}"; ?>">
                                    <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                                </div>
                            </form>
                        </div>
                   
                    </div>
                </div>
                <?php
        }
    }

    else{
        echo "no products found";
    }

    ?>        
            </form> <!-- Close form element -->
        </div>
    </div>
</body>
</html>

<?php
    include("db.php");

    if(isset($_POST['add_to_cart'])){
        $product_name=$_POST['p_name'];
        $product_price=$_POST['p_price'];
        $product_image=$_POST['p_image'];
        $product_quantity=1;

        $cart = mysqli_query($con, "select * from cart where c_name = '$product_name'" );
        if(mysqli_num_rows($cart)>0){
            echo "<script>Swal.fire({ title: 'This product is already in cart!',   text: 'Please select other product.', icon: 'error' });</script>";
        }else{
        $query = "insert into cart (c_name, c_price, c_image, c_quantity) values ('$product_name','$product_price','$product_image',$product_quantity)";
        $result = mysqli_query($con, $query);
        
        if($result){
            echo "<script>Swal.fire({ title: 'Product added to cart successfully!', icon: 'success' });</script>";
       
        }else{
            echo "<script>Swal.fire({ title: 'Product failed to add to cart!', icon: 'error' });</script>";
            }
        }
        
    }

    
?>