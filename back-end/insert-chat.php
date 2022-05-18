<?php 
    session_start();
    if(isset($_SESSION['UNIQUE_ID'])){
        include_once "config.php";
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $outgoing_id = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);

        if(!empty($message)){
            $sql = mysqli_query($connection, "INSERT INTO messages (INCOMING_MSG_ID, OUTGOING_MSG_ID, MSG) 
                                              VALUES ({$incoming_id}, {$outgoing_id},'{$message}')") OR DIE();
        }
    }else {
        header("~/front-end/login.php");
    }
?>