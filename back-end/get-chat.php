<?php 
    session_start();
    include_once "../back-end/config.php";
    
    if(isset($_SESSION['UNIQUE_ID'])){
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $outgoing_id = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
        $output = "";
        
        $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.UNIQUE_ID = messages.INCOMING_MSG_ID
                WHERE (OUTGOING_MSG_ID = {$outgoing_id} AND
                INCOMING_MSG_ID = {$incoming_id} OR
                OUTGOING_MSG_ID = {$incoming_id} AND
                INCOMING_MSG_ID = {$outgoing_id}) ORDER BY MSG_ID ASC";

        $query = mysqli_query($connection, $sql);
        
        $sql2 = mysqli_query($connection, "SELECT * FROM users WHERE UNIQUE_ID = {$incoming_id}");
        if(mysqli_num_rows($sql2) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
        }

        }
        
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['OUTGOING_MSG_ID'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['MSG'] .'</p>
                                    </div>
                                </div> ';
                }else {
                    $output .=' <div class="chat incoming">
                                <img src="../back-end/images/'. $row2['IMAGE_PROFILE'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['MSG'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
    }else {
    header("../front-end/login.php");
    }
?>