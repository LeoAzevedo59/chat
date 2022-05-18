<?php
    session_start();
    if(!isset( $_SESSION['UNIQUE_ID'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php 
                    include_once "../back-end/config.php";
                    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE UNIQUE_ID = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <span class="arrow-left">
                        <a href="users.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
                              </svg>
                        </a>
                    </span>
                    <img src="../back-end/images/<?php echo $row['IMAGE_PROFILE']?>" alt="">
                    <div class="details">
                        <span><?php echo $row['FIRST_NAME'] . " " . $row['LAST_NAME']?></span>
                        <p><?php echo $row['STATUS']?></p>
                    </div>
                </div>
            </header>
            <div class="chat-box">
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['UNIQUE_ID'];?>"  id="" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id;?>"  id="" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
                        <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
                    </svg>
                </button>
            </form>
        </section>
    </div>
    <script src="./js/chat.js"></script>
</body>
</html>