<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($connection, "SELECT EMAIL FROM users WHERE EMAIL = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This e-mail already exist!";
            } else {
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            $sql2 = mysqli_query($connection, "INSERT INTO users (UNIQUE_ID, FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, IMAGE_PROFILE, STATUS)
                                                  VALUE ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                                $sql3 = mysqli_query($connection, "SELECT * FROM users WHERE EMAIL = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['UNIQUE_ID'] = $row['UNIQUE_ID'];
                                    echo "success";
                                }
                            }else {
                                echo "Something went wrong!";
                            }
                        }
                    }else {
                        echo "Please select an Image file = jpeg, jpg, png!";
                    }
                }else {
                    echo "Please select an Image file!";
                }
            }
        }else {
            echo "$email - This is not a valid e-mail";
        }
    } else {
        echo "All input field are required!";
    }
    ?>