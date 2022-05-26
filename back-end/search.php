<?php 
    session_start();
    include_once "../back-end/config.php";
    $outgoing_id = $_SESSION['UNIQUE_ID'];
    $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);
    $output = "";

    $sql = mysqli_query($connection, "SELECT * FROM users WHERE NOT UNIQUE_ID = {$outgoing_id} AND (FIRST_NAME LIKE '%{$searchTerm}%' OR LAST_NAME LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else {
        $output .= "No user found related to your search term";
    }
    echo $output;
?>