<?php 
    // $connection = mysqli_connect("odevez.com.br", "u953073190_leoazevedo", "-zLeoBT$159/dbo_chat", "u953073190_dbo_chat");
    $connection = mysqli_connect("localhost", "root", "", "chat");
    if(!$connection)
    {
        echo "Database connected" . mysqli_connect_errno();
    }
?>