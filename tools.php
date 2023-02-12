<!-- Adding Header -->
<?php require_once('./components/header.php') ?>


<!-- Cards -->
<?php
include('funtions/_dbcon.php');
$catid = $_GET['catid'];
$mysqli = "SELECT * FROM `catagory` WHERE id=$catid";
$result = mysqli_query($con, $mysqli);
$row = mysqli_fetch_assoc($result);
$forumname = $row['cat_title'];
$froumdesc = $row['cat_desc'];


?>
<div class="container">
    <div class="header container md-8 my-5">
        <h1 class="text-center my-3 display-1" style="line-break: anywhere;">Topic: <b><?php echo $forumname; ?></b></h1>
        <p class="blog_desc"><?php echo $froumdesc; ?></p>
        <hr>
    </div>


    <!-- Disccsion Start Box Start Here -->
    <div class="header container md-8 my-5 bg-success">
        <h2 class="text-right">Start Discussion</h2>
        <form method="POST" class="pb-4" action="<?php $_SERVER["REQUEST_URI"] ?>">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'True') {
                echo '
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="problem_title" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text text-info">Please write to the point...</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Problem Description</label>
                                <input type="text" class="form-control" name="problem_desc" id="exampleInputPassword1" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Question</button>';
            } else {
                echo ' <div class="header container md-8 my-5 h-auto bg-danger">
                                        <h1 class="text-center my-3 display-1">Please Login To Start Discussion</h1>
                                        <p class="text-center my-3">Please Login or Sign Up to Continue</p>
                                        </div>';
            }

            ?>
        </form>
    </div>


    <?php
    include('funtions/_dbcon.php');
    $catidadd = $_GET['catid'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $problem_title = $_POST['problem_title'];
        $problem_desc = $_POST['problem_desc'];
        $userid = $_SESSION['userid'];
        $problem_title = str_replace("<", "&lt", $problem_title);
        $problem_title = str_replace(">", "&gt", $problem_title);

        $problem_desc = str_replace("<", "&lt", $problem_desc);
        $problem_desc = str_replace("<", "&gt", $problem_desc);

        if (isset($_POST['problem_title'])) {
            $mysqli = "INSERT INTO `forum`.`threads`(`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('[value-1]', '$problem_title' ,'$problem_desc','$catidadd','$userid', current_timestamp())";
            $sqli = mysqli_query($con, $mysqli);
            if ($sqli) {
                echo "Sucess";
            } else {
                echo "Error";
            }
        }
    }

    ?>
    <!-- Disusiion End Box Start Here -->

    <!-- Discussion Fetch Start Here -->
    <h2 class="text-center my-4">Answer/Question</h2>
    <div class="container mb-5">
        <?php
        include('funtions/_dbcon.php');
        $cat_id = $_GET['catid'];
        $mysqli = "SELECT * FROM `threads` WHERE `thread_cat_id`= $cat_id";
        $result = mysqli_query($con, $mysqli);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $thread_title = $row['thread_title'];
                $userid = $row['thread_user_id'];
                $userdata = "SELECT * FROM `signup` WHERE id = '$userid'";
                $datasql = mysqli_query($con, $userdata);
                $datarow = mysqli_fetch_assoc($datasql);
                $threadusername = $datarow['username'];
                $time_stamp = $row['timestamp'];
                $stringseemore = substr($row['thread_desc'], 0, 80);
                $id = $row['thread_id'];
                echo '<a href="thread_open.php?id=' . $id . '" class="text-decoration-none text-dark"> <div class="d-flex">
                <div class="flex-shrink-0 my-2">
                    <img src="user.png" width="54px" alt="User Pics">
                </div>
                <div class="flex-grow-1 ms-3">
                     <h6>Asked By: ' . $threadusername . ' At:' . $time_stamp . '</h6>
                    <b><h4>' . $thread_title . '</h4></b>
                    <p>' . $stringseemore . ' .....</p>
                </div>
            </div></a>';
            }
        } else {
            echo '  <div class="header container md-8 my-5 bg-danger">
            <h1 class="text-center my-3 display-1">No Result Found.</h1>
            <p class="text-center my-3">If You Want to Start discussion in this catagory Post your Question and Description in the form given Above form.. Thanks!!</p>
        </div>';
        }
        ?>
    </div>
</div>
<!-- Discussion Fetch End Here -->



<!-- Adding Footer -->
<?php require_once('./components/footer.php') ?>