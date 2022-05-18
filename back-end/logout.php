<?php 
    session_start();
    if(isset($_SESSION['UNIQUE_ID'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($connection, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE UNIQUE_ID = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../front-end/login.php");
            }
        }else {
            header("location: ../front-end/users.php");
        }

    }else {
        header("location: ../front-end/login.php");
    }

?>