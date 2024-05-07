<?php 
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="container">
<h1 class="my-4 text-center">Checkout</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "cart");
                $query = "SELECT * FROM cart";
                $result = mysqli_query($con, $query);
                $total = 0;
                foreach ($result as $row) {
                    $subtotal = $row['c_price'] * $row['c_quantity'];
                    $total += $subtotal;
                    echo "<tr>";
                    echo "<td>{$row['c_name']}</td>";
                    echo "<td>RM {$row['c_price']}</td>";
                    echo "<td>{$row['c_quantity']}</td>";
                    echo "<td>RM $subtotal</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Grand Total</th>
                    <td>RM <?php echo $total; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="text-center">
    <a href="#" class="btn btn-primary" id="placeOrderBtn">Place Order</a>
    </div>
</div>
<script>
    // Function to handle the click event of the "Place Order" button
    document.getElementById('placeOrderBtn').addEventListener('click', function() {
        // Show a SweetAlert confirmation
        Swal.fire({
            title: 'Place Order',
            text: 'Are you sure you want to place the order?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, place order'
        }).then((result) => {
            // If the user confirms the order, show a success message
            if (result.isConfirmed) {
                Swal.fire(
                    'Order Placed!',
                    'Your order has been successfully placed.',
                    'success'
                );
                setTimeout(function() {
                    window.location.href = 'Home.php';
                }, 2000);
                // Here you can add code to submit the order or redirect to another page
            }
        });
    });
</script>
</body>
</html>
