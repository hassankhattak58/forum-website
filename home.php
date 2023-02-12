<!-- Adding Header -->
<?php require_once('./components/header.php') ?>

<!-- Carasoul -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="03.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>We Are AnoNymous</h5>
        <p>Dont Play With Us... We Never Forgive</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="04.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>We are Detective</h5>
        <p>We will Find You....</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="05.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>We are Not Bad</h5>
        <p>We are Good but with Those who are good too</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Carosoul End -->

<!-- Cards -->
<div class="container">
  <h2 class="text-center my-4">Welcome to Forum-V-1.0</h2>
  <hr>
  <h2 class="text-center my-4">Blogs</h2>
  <div class="row flex-row">

    <?php
    include('funtions/_dbcon.php');

    $mysqli = "SELECT * FROM `blogs`";
    $result = mysqli_query($con, $mysqli);
    while ($row = mysqli_fetch_assoc($result)) {
      $blogid = $row['id'];
      $stringseemore = substr($row['blog_description'], 0, 80);
      echo "
        <div class='col-md-4'>
    <div class='card' style='width: 18rem;'>
        <img src='01.jpg' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'> " . $row['blog_title'] . "</h5>
          <p class='card-text'> " . $stringseemore . " .....</p>
          <a href='blogpost.php?blogid=" . $blogid . "' class='btn btn-primary'>See More</a>
        </div> 
      </div>
    </div>";
    }
    ?>

  </div>
</div>

<!-- Cards End -->


<!-- Adding Header -->
<?php require_once('./components/footer.php') ?>