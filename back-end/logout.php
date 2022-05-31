<?php 
    session_start();
    if(isset($_SESSION['UNIQUE_ID'])){
        include_once "../back-end/config.php";
        $logout_id = mysqli_real_escape_string($connection, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE UNIQUE_ID = {$logout_id}");
            $sql = true;
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
  
            }
        }else {
            header("location: ../users.php");
        }

    }else {
        header("location: ../login.php");
    }

?>