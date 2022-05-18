<?php 
    $connection = mysqli_connect("localhost", "root", "", "chat");
    if(!$connection)
    {
        echo "Database connected" . mysqli_connect_errno();
    }
    
?>