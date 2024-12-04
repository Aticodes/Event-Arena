<?php 
require 'config.php';
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($con,"SELECT * FROM tb_user WHERE username = '$username' OR email='$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location : index.php");
        }
        else{
            echo "<script>alert('incorrect password'); </script>";
        }
    }
    else{
        echo "<script>alert('user NOT REGISTERED PLEASE REGISTER FIRST'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <!--registeration starts here-->
    <div id="registrationModal" class="modal">
        <div class="modal-content">
            <img src="images/micah-boswell-OPnBJ5L2oxs-unsplash.jpg" class="img2">
            
            <div class="container5">
                <form method="post" class="registration-form" id="registrationFormContent" autocomplete="off">
                    <h2 class="register">Login</h2>
                    <div class="input-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
        
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" name="submit">login</button>
                    <div class="list-item"><a href="register.php">Don't have an account?Signup</a></div>
                  </form>
                </div>
        </div>
    </div></center>
</body>
</html>