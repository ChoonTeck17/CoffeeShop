
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
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
        <br>   <br>   <br>
        <div class="container-fluid">
        <div class ="row justify-content-center">
        <div class ="col-md-8">
        <div class ="card">
        <div class ="card-header">
            <table class="table table-hover" >
                    <col style="width:1%"/>
                    <col style="width:4%"/>
                    <col style="width:10%"/>
                    <col style="width:2%"/>
                    <col style="width:6%"/>
                    <col style="width:2%"/>      
                    <col style="width:6%"/>      

            <tbody>
            <?php
            $con = mysqli_connect("localhost", "root", "", "cart");
            $query = "SELECT * FROM cart";
            $result = mysqli_query($con, $query);
            $num=1;
            $grand_total = 0;
            if ($result->num_rows > 0) {

            echo "<thead class='thead-dark' style='text-align: center;'>";
            echo "<tr>";
            echo "<th scope='col'>No.</th>";
            echo "<th scope='col'>Product Name</th>";
            echo "<th scope='col'>Product Image</th>";
            echo "<th scope='col'>Product Price</th>";
            echo "<th scope='col'>Quantity</th>";
            echo "<th scope='col'>Total Price</th>";
            echo "<th scope='col'>Actions</th>";
            echo "</tr>";
            echo "</thead>";
                // output data of each row using foreach loop
                foreach ($result as $row) {
                    


                    $grand_total = $grand_total +($row["c_price"] * $row['c_quantity']); 
                    echo "<tr>";
                    echo "<td class='text-center border border-2'>" . $num. "</td>";
                    echo "<td class='text-center border border-2'>" . $row["c_name"] . "</td>";
                    echo "<td class='text-center border border-2'><img src='image/" . $row["c_image"] . "' alt='Product Image' style='width: 100px;'></td>";
                    echo "<td class='text-center border border-2'>RM" . $row["c_price"] . "</td>";
                    echo "<td class='text-center border border-2'><br>
                            <form action = '' method = 'post'>
                                <input type='hidden' name='qty_id' class='form-control'  value='" . $row["id"] . "'><br>
                                <input type='number' id='quantity' name='quantity_qty' class='form-control' value='" . $row['c_quantity'] . "'><br>
                                <button type='submit' name='update_quantity' class='btn btn-primary'>Update</button>
                            </form>
                        </td>"; 
                    $subtotal = $row["c_price"] * $row['c_quantity'];
 
                    echo "<td class='text-center border border-2'>RM" . $subtotal  ." </td>";
                    echo "<td class='text-center border border-2'><br>                 
                    <a class='btn btn-danger' href='cart.php?remove=1&id=" . $row['id'] . " role='button'><i class='fa-solid fa-trash me-2'></i>Delete</a>
                </td>";
                
                
                    
                    echo "</tr>";

                    $num++;
                }
            } else {
                echo "<div class='text-center'>";
                echo "<div class='empty_text'>No products available</div>";
                echo "</div>";
                }
            $con->close();

            ?>

        
            </tbody>
            </table>


                <form method="post">

                <?php
                    if(isset($_POST['delete_all'])){
                        $con = mysqli_connect("localhost", "root", "", "cart");
                        $query = "delete from cart";
                        $result= mysqli_query($con,$query);
                    

                    if($result){
                        echo "<script>Swal.fire({ title: 'Product insert successfully!', icon: 'success' });</script>";
                        echo "<script>setTimeout(function() { window.location.href = 'cart.php'; }, 2000);</script>";

                    }else{
                        echo "<script>Swal.fire({ title: 'Failed to delete everything', icon: 'error' });</script>";

                    }
                }
                ?>
                  
                </form>
            </div>
            </div>
        </div>
        </div>
        </div>
        <br>
        <?php
                if($grand_total > 0){
                    echo '        
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-1.5"> 
                                    <button type="submit" class="btn btn-outline-danger btn-block" name="delete_all">Delete everything</button>
                                </div>
                            </div>
                        </div> 

                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-md-4"> 
                                <table class="table table-light">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">
                                                <a class="btn btn-primary" href="buyProduct.php" role="button">Continue Shopping</a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="#" role="button">Grand total: $'.$grand_total.'</a>
                                            </td>
                                            <td class="text-right">
                                                <a class="btn btn-primary" href="checkout.php" role="button">Proceed to checkout</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';
                }
                ?>
       

    </body>
    </html>

    <?php
    include("db.php");

    if(isset($_POST['update_quantity'])){
        $update_value = $_POST['quantity_qty'];
        // echo $update_value;
        $update_id = $_POST['qty_id'];
        // echo $update_id;
        $update_quantity_query = mysqli_query($con, "update cart set c_quantity = $update_value where id =$update_id");
        
        if(isset($_POST['update_quantity'])){
            echo "<script>Swal.fire({ title: 'Product quantity has been updated!', icon: 'success' });</script>";
            echo "<script>
            setTimeout(function(){
                window.location.href = 'cart.php'; // Redirect to cart.php after 2 seconds
            }, 3000); 
          </script>";
        }else{
            echo "<script>Swal.fire({ title: 'Product quantity failed to be updated!', icon: 'error' });</script>";
        }
    }

    if(isset($_GET['remove']) && isset($_GET['id'])){
        $remove_id = $_GET['id'];
        // echo "$remove_id";

        $remove = mysqli_query($con, "delete from cart where id = '$remove_id'");
        
      
            
        if($remove){
            echo "<script>Swal.fire({ title: 'Product deleted successfully!', icon: 'success' });</script>";
            echo "<script>
            setTimeout(function(){
                window.location.href = 'cart.php'; // Redirect to cart.php after 2 seconds
            }, 3000); 
                 </script>";
           

        }else{
            echo "<script>Swal.fire({ title: 'Product failed to be deleted!', icon: 'error' });</script>";
        }
    }
    
    ?>
