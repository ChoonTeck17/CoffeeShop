

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script defer src ="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script defer src ="script.js"></script>

    
</head>
<body>



    <?php
    include("header.php");
    ?>
    <br>   <br>   <br>
    <div class="container">
    <div class ="row justify-content-center">
    <div class ="col-md8">
    <div class ="card">
    <div class ="card-header">
        <table class="table table-hover">
                <col style="width:1%"/>
                <col style="width:4%"/>
                <col style="width:1%"/>
                <col style="width:12%"/>
                <col style="width:6%"/>
                <col style="width:8%"/>

 
        <tbody>
        <?php
        $con = mysqli_connect("localhost", "root", "", "cart");
        $query = "SELECT * FROM products";
        $result = mysqli_query($con, $query);
        $num=1;
        if ($result->num_rows > 0) {
          echo "<thead class='thead-dark' style='text-align: center;'>";
          echo "<tr>";
          echo "<th scope='col'>No.</th>";
          echo "<th scope='col'>Product Name</th>";
          echo "<th scope='col'>Product Price</th>";
          echo "<th scope='col'>Product Description</th>";
          echo "<th scope='col'>Product Image</th>";
          echo "<th scope='col'>Actions</th>";
          echo "</tr>";
          echo "</thead>";
            // output data of each row using foreach loop
            foreach ($result as $row) {
                


                 
                echo "<tr>";
                echo "<td class='text-center border border-2'>" . $num. "</td>";
                echo "<td class='text-center border border-2'>" . $row["p_name"] . "</td>";
                echo "<td class='text-center border border-2'>" . $row["p_price"] . "</td>";
                echo "<td class='text-center border border-2'>" . $row["p_description"] . "</td>";
                echo "<td class='text-center border border-2'><img src='image/" . $row["p_image"] . "' alt='Product Image' style='width: 100px;'></td>";
                echo "<td class='text-center border border-2'>
                    <a class='btn btn-warning' href='editProduct.php?edit=" . $row['id'] . "' role='button'><i class='fas fa-edit'></i>Edit</a>
                    </button>                        
                    <a class='btn btn-danger' href='deleteProduct.php?delete=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this?')\" role='button'><i class='fa-solid fa-trash me-2'></i>Delete</a>
                      </td>";
                
                echo "</tr>";

                $num++;
            }
        } else {
          echo "<div class='empty_text'> No products available</div>";
        }
        $con->close();

        ?>
            </tbody>
        </table>

        </div>
        </div>
      </div>
    </div>
</div>

</body>
</html>
