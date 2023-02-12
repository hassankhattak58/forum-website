<!-- Adding Header -->
<?php require_once('./components/header.php') ?>

    <!-- Cards -->
    <?php
    include('funtions/_dbcon.php');
    $blogid = $_GET['blogid'];
    $mysqli = "SELECT * FROM `blogs` WHERE id=$blogid";
    $result = mysqli_query($con, $mysqli);
    $row = mysqli_fetch_assoc($result);
    $blogtitle = $row['blog_title'];
    $bllogdesc = $row['blog_description'];

    echo "
    <div class='container my-5 text-center'>
    <img src='01.jpg' width='500px' alt='blogpic'>
    <div>
    <h2> " . $blogtitle . " </h2>
    <p class='blog_desc'> " . $bllogdesc . " </p>
    </div>
    </div>";
    ?>
    <!-- Cards End -->


 <!-- Adding Footer -->
<?php require_once('./components/footer.php') ?>