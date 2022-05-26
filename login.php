<?php 
    session_start();
    if(isset($_SESSION['UNIQUE_ID'])){
        header("location: users.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat app</header>
            <form action="#">
                <div class="error-txt">This menssage error!</div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter you Email Address" required> 
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter you Password" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup nows</a></div>
        </section>
    </div>
    <script src="login.js"></script>
</body>
</html>