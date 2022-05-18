<?php
    session_start();
    if(!isset( $_SESSION['UNIQUE_ID'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php 
                    include_once "../back-end/config.php";
                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE UNIQUE_ID = {$_SESSION['UNIQUE_ID']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src="../back-end/images/<?php echo $row['IMAGE_PROFILE']?>" alt="">
                    <div class="details">
                        <span><?php echo $row['FIRST_NAME'] . " " . $row['LAST_NAME']?></span>
                        <p><?php echo $row['STATUS']?></p>
                    </div>
                </div>
                <a href="../back-end/logout.php?logout_id=<?php echo $row['UNIQUE_ID'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <div class="text">Select an user to start chat</div>
                <input type="text" placeholder="Enter name to search...">
                <button>
                    <div class="icon-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </div>
                    <div class="icon-closed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                    </div>
                  </svg>
                </button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>

    <script src="../front-end/js/users.js"></script>
</body>
</html>