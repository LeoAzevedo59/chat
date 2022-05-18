<?php 
    session_start();
    if(isset($_SESSION['UNIQUE_ID'])){
        header("location: users.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat app</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">This menssage error!</div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="field img">
                        <label>Select Image</label>
                        <div class="container">
                            <input type="file" name="image" required>
                        </div>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login nows</a></div>
        </section>
    </div>
    <script src="../front-end/js/register.js"></script>
</body>
</html>