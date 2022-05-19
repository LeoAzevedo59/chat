<?php 
    $connection = mysqli_connect("localhost", "u953073190_leoazevedo", "-Leo123456", "u953073190_chat");
    // $connection = mysqli_connect("localhost", "root", "", "chat");
    if(!$connection)
    {
        echo "Database connected" . mysqli_connect_errno();
    }
    
?>