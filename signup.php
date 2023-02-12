<?php
$signsucess = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("funtions/_dbcon.php");
    $uname = $_POST['username'];
    $uname = str_replace("<","&lt",$uname);
    $uname = str_replace(">","&gt",$uname);
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    if ($password == $cpass ) {
        $rowscheck = "SELECT * FROM `forum`.`signup` WHERE username = '$uname'"; 
        $sql = mysqli_query($con, $rowscheck);
        $checkrow = mysqli_num_rows($sql);
        if ($checkrow > 0) {
            echo"User name Already Exits.. Please Try with a Different One.. Thanks..";
        }else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `forum`.`signup` (`username`, `password`, `time_stamp`) VALUES ( '$uname', '$hash', current_timestamp())";
            $query = mysqli_query($con,$sql);
            if ($query) {
                header("Location: /projects/Forum Website Project/home.php?signupsucess=true");  
            }
            else{
                header("Location: /projects/Forum Website Project/home.php?error=true"); 
            }
        }
    }else{
        header("Location: /projects/Forum Website Project/home.php?signupsucess=false");  
    }




 
}
