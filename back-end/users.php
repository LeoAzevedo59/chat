<?php 
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['UNIQUE_ID'];
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE NOT UNIQUE_ID = {$outgoing_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>