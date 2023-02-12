<!-- Adding Header -->
<?php require_once('./components/header.php') ?>

<!-- Cards -->
<div class="container">
    <div class="header container md-8 my-5">
        <h2 class="text-center my-3">Welcome To Problems Section of Forum-V-1.0</h2>
        <hr>
    </div>
    <h2 class="text-center my-4">Problems</h2>
    <div class="row flex-row">
        <?php

        include('funtions/_dbcon.php');

        $mysqli = "SELECT * FROM `catagory`";
        $result = mysqli_query($con, $mysqli);
        while ($row = mysqli_fetch_assoc($result)) {
            $catid = $row['id'];
            $stringseemore = substr($row['cat_desc'], 0, 30);
            echo "
              <div class='col-md-4'>
             <div class='card' style='width: 18rem;'>
            <img src='06.jpg' class='card-img-top' alt='...'>
             <div class='card-body'>
             <h5 class='card-title'> " . $row['cat_title'] . " </h5>
            <p class='card-text'> " . $stringseemore . " .....</p>
            <a href='tools.php?catid=" . $catid . "' class='btn btn-primary'>Browse Catagory</a>
             </div>
            </div>
            </div>";
        }

        ?>
    </div>
</div>
<!-- Cards End -->


<!-- Adding Footer -->
<?php require_once('./components/footer.php') ?>