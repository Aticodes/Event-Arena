<?php 
require 'config.php';
if(!empty($_SESSION["id"])){
    header("location : index.php");
}
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm-password'];
 
    $duplicate = mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo "<script>alert('username or email has already taken'); </script>";
    }
    else{
        if($password == $c_password){
            $query = "INSERT INTO tb_user VALUES('','$username','$email','$password')";
            mysqli_query($con,$query);
            echo "<script>alert('Registration succesfull'); </script>";
        }
        else{
            echo "<script>alert('password does not match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>
<body>
    <center>
        <!--registeration starts here-->
    <div id="registrationModal" class="modal">
        <div class="modal-content">
            
            <div class="container5">
                <form class="registration-form" id="registrationFormContent" method="post" autocomplete="off">
                    <h2 class="register">Register</h2>
                    <div class="input-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                         <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Confirm Password:</label>
                         <input type="password" id="confirm-password" name="confirm-password" required>
                    </div><br>
                    <button type="submit" name="submit">Register</button>
                </form>
                <div class="list-item"><a href="login.php">Alredy have an account?Login</a></div>
                </div>
                <img src="images/micah-boswell-OPnBJ5L2oxs-unsplash.jpg" class="img2">
        </div>
    </div></center>
</body>
</html>