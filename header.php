<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Home.php">Sunlight Cafe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> <!-- Use justify-content-end to move navbar content to the right -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="AddProduct.php">Add product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ViewProduct.php">View Product</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="BuyProduct.php">Cafe</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="LocateUs.php">Locate Us</a>
            </li>


            <?php
                    $con = mysqli_connect("localhost", "root", "", "cart");
                    $select_product= mysqli_query($con, "select * from cart") or die('query failed');
                    $row_count = mysqli_num_rows($select_product);
            ?>
            <li class="nav-item">
                <a class="nav-link" href="Cart.php" tabindex="-1">
                <i class="fa-solid fa-cart-shopping"></i>
            <span>
            <sup>            
                <?php echo "$row_count"; ?>
            </sup>
            </span>
                </a>
            </li>

        </ul>
    </div>
</nav>

</body>
</html>