<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1 0 auto;
        }

        footer {
            width: 100%;
            background-color: #f8f9fa; /* Change the background color as needed */
            padding: 20px 0; /* Adjust padding as needed */
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("Header.php"); ?>

    <div class="content">
    <div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <h1>Welcome KCM gadgets store</h1>
      <p>We offer a wide range of computer gadgets and accessories to enhance your computing experience.</p>
      <a href="BuyProduct.php" class="btn btn-primary">Shop Now</a>
    </div>
    <div class="col-md-6">
      <img src="image/pc.jpg" alt="Coffee" class="img-fluid">
    </div>
  </div>
</div>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
