<!-- SweetAlert library -->


<?php 

session_start();
$con = mysqli_connect("localhost", "root", "", "cart");
if($con){
	
}else{
	echo "Not Connected";
}


if(isset($_GET['delete'])){
    $delete_id = ($_GET['delete']);
    // echo $delete_id;

    $query = "DELETE FROM products WHERE id=$delete_id";
    $result = mysqli_query($con,$query);

    if($query){
        echo "<script>
        alert('Product Deleted Successfully');
        window.location.href = 'viewProduct.php';
      </script>";

    }else{
        echo "product cant be deleted";
}

}

?>
