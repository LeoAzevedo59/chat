<?php 
    $connection = mysqli_connect("localhost", "u953073190_leoazevedo", "", "chat");
    if(!$connection)
    {
        echo "Database connected" . mysqli_connect_errno();
    }
    
?>
