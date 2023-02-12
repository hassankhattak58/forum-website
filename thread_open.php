<!-- Adding Header -->
<?php require_once('./components/header.php') ?>


<?php
$alertsucess = false;
$alertfailuer = false;
include('funtions/_dbcon.php');
$postid = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $comment = str_replace("<", "&lt", $comment);
    $comment = str_replace(">", "&gt", $comment);

    $userid = $_POST['id'];
    $pbid = $_GET['id'];
    if (isset($_POST['comment'])) {
        $mysqli = "INSERT INTO `comments` (`id`, `comment`, `user_id`, `time_stamp`, `problem_id`) VALUES ('[value-1]', '$comment', '$userid', current_timestamp(), '$pbid')";
        $sqli = mysqli_query($con, $mysqli);
        if ($sqli) {
            $alertsucess = true;
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error Occured</strong>Please Try again Later.. Something is Wrong.. Sory for incovienvce.. Thanks..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
}

?>


<!-- Alerts Showing -->
<?php if ($alertsucess) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Your Comment is Live Now..</strong> Your comment has been sucessfully submitted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
} ?>


<!-- Optional JavaScript; choose one of the two! -->


<!-- Show Main Topic -->
<div class="header container md-8 my-5 topics">
    <style>
        .topics {
            background-color: #20ffeb;
        }
    </style>


    <!-- Fetch Topic Start here -->
    <div class="container mb-5">
        <h1 class="text-center my-3 display-1">Topic<br></h1>
        <?php
        include('funtions/_dbcon.php');
        $id = $_GET['id'];
        $mysqli = "SELECT * FROM `threads` WHERE `thread_id`= $id";
        $result = mysqli_query($con, $mysqli);
        if (mysqli_num_rows($result) >= 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $thread_title = $row['thread_title'];
                $thread_user = $row['thread_user_id'];
                $time_stamp = $row['timestamp'];
                $thread_desc = $row['thread_desc'];
                // $stringseemore = substr($row['thread_desc'], 0, 80);
                $user = strtoupper($thread_user);
                echo '<div class="d-flex">
                <div class="flex-shrink-0 my-2">
                    <img src="user.png" width="54px" alt="User Pics">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h2><b>' . $thread_title . '</b></h2>
                    <p>' . $thread_desc . '</p>
                </div>
                </div>';
            }
        }
        ?>
    </div>
</div>
<!-- Show Main Topic End -->

<!-- Comments Sections -->

<!-- Add Comment -->
<div class="header container md-3 my-5 bg-info">
    <h2 class="text-right">Post Comment </h2>
    <form method="POST" class="pb-4" action="<?php $_SERVER["REQUEST_URI"] ?>">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'True') {
            echo '<div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Comment</label>
                            <input type="text" class="form-control" name="comment" id="exampleInputPassword1" required>
                            <input type="hidden" name="id" value="' . $_SESSION['userid'] . '">
                     </div>
                      <button type="submit" class="btn btn-primary">Add Comment</button>';
        } else {
            echo '<div class="header container md-8 my-5 h-auto bg-danger">
                        <h1 class="text-center my-3 display-1">Please Login To Comment</h1>
                        <p class="text-center my-3">Please Login or Sign Up to Continue</p>
                        </div>';
        }
        ?>
    </form>
</div>';


<!-- Add Comment Ends -->

<!-- Fetch Comment Start -->
<h2 class="text-center my-4">Comments:</h2>
<div class="container mb-5">
    <?php
    include('funtions/_dbcon.php');
    $id = $_GET['id'];
    $mysqli = "SELECT * FROM `comments` WHERE `problem_id`= $id";
    $result = mysqli_query($con, $mysqli);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $comment_desc = $row['comment'];
            $time_stamp = $row['time_stamp'];
            $comment_id = $row['id'];
            $userid = $row['user_id'];
            $userdata = "SELECT * FROM `signup` WHERE id = '$userid'";
            $datasql = mysqli_query($con, $userdata);
            $datarow = mysqli_fetch_assoc($datasql);
            $threadusername = $datarow['username'];
            $poster = strtoupper($threadusername);
            echo '<div class="d-flex">
                <div class="flex-shrink-0 my-2">
                    <img src="user.png" width="54px" alt="User Pics">
                </div>
                <div class="flex-grow-1 ms-3">
                     
                    <div class="text-right"><b>Answerd By:' . $threadusername . ' At: ' . $time_stamp . '</b><br></div>
                    <h5>' . $comment_desc . '</h5>
                </div>
            </div>';
        }
    } else {
        echo '  <div class="header container md-8 my-5 bg-danger">
            <h1 class="text-center my-3 display-1">No Comment Found.</h1>
            <p class="text-center my-3">Your Can Comment by SignUp/LoginUpin and post your comment above. Thanks!!!!!!!!!!</p>
        </div>';
    }
    ?>
</div>
<!-- Fetch Comment Ends -->


<!-- Adding Footer -->
<?php require_once('./components/footer.php') ?>