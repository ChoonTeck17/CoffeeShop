<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Sunlight Cafe</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
<?php
  include("Header.php");
?>

<section id="about-us" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="mb-4">Welcome to Sunlight Cafe</h2>
        <p>We are passionate about serving high-quality coffee and creating a cozy atmosphere for our customers.</p>
        <p>Our café is more than just a place to grab a cup of coffee; it's a community hub where people come together to relax, work, and socialize.</p>
      </div>
      <div class="col-lg-6">
        <!-- Slideshow -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
              <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
              <img src="slide3.jpg" class="d-block w-100" alt="Slide 3">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php
  include("Footer.php");
?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
