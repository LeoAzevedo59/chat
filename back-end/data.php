<?php
    include_once "../back-end/config.php";
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (INCOMING_MSG_ID = {$row['UNIQUE_ID']} OR
                                               OUTGOING_MSG_ID = {$row['UNIQUE_ID']}) AND
                                              (INCOMING_MSG_ID = {$outgoing_id} OR
                                              OUTGOING_MSG_ID = {$outgoing_id}) ORDER BY MSG_ID DESC LIMIT 1";
        $query2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['MSG'];
        }else{
            $result = "No message available";
        }
        
        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

        $outGoingNotNull = isset($row2['OUTGOING_MSG_ID']);

        (($row['STATUS']) == "Offline now") ? $offline = "offline" : $offline = "";
        
        ($outgoing_id == $outGoingNotNull) ? $you = "You: " : $you = "";
        
        $output .= '<a href="chat.php?user_id='.$row['UNIQUE_ID'].'">
                    <div class="content">
                        <img src="back-end/images/'. $row['IMAGE_PROFILE'] .'" alt="">
                        <div class="details">
                            <span>'. $row['FIRST_NAME']. " " . $row['LAST_NAME'] .'</span>
                            <p>'.$you .$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '. $offline .'"></div>
                    </a>';
    }
?>