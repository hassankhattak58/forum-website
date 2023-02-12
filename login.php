    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('funtions/_dbcon.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $select = "SELECT * FROM `signup` WHERE username='$username'";
        $query = mysqli_query($con, $select);
        $loginsucess = mysqli_num_rows($query);
        if ($loginsucess == 1) {
            $fetchrow = mysqli_fetch_assoc($query);
            $userid = $fetchrow['id'];
            if (password_verify($password, $fetchrow['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $userid;
                header("location: home.php");
            } else {
                echo "Password is not Correct";
            }
        } else {
            echo "User Not Registered";
        }
    }
    ?>