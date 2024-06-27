<?php
include "db_connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-UP</title>
</head>
<body bgcolor="aquamarine">
    <link rel="stylesheet" href="login-signup.css">
    
    <div class="top">
        <span style="font-size: 35px;text-shadow: 0 0 5px white,0 0 5px white;">Student Management</span>
    </div>

    <?php
        if(isset($_GET["pass"])){
            echo '<div class="msg">Password did not Match!!</div>';
            echo '<meta http-equiv = "refresh" content = "5; url = http://localhost/ROHIT/signup.php"/>';
        }

    ?>
    
    <div class="container">
        <h1>Sign-Up</h1>
        <form action="" method="POST">
            <input type="text" class="one" name="username" id="username" placeholder="Username" required>
            <input type="password" class="one" name="create-password" id="create-password" placeholder="Create Password" required><br>
            <input type="password" class="one" name="confirm-password" id="confirm-password" placeholder="Confirm Password" required><br>
            <input type="checkbox" style="margin-top: 20px; margin-left: 35px;" onclick="myFunction()">Show Password
            <button type="submit" name="signup" id="signup" style="background-color: darkslategrey;color: white;font-size: larger;width: 80%; margin-left:45px;padding: 6px;margin-top: 25px;">Sign-Up</button>
            <br><br><br><hr style="width: 90%; border: 1px solid black;">
            <h4 style="text-align: center;font-size: larger;">Already have an account?</h4>
            <a href="login.php" style="text-decoration: none; color: blue;" ><h4 style="text-align: center;">Login</h4></a>
        
        </form>
    </div>
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname=$_POST["username"];
    $pass1=$_POST["create-password"];
    $pass2=$_POST["confirm-password"];
    
    if($pass1==$pass2){
        $pass = $pass1;
        $sql="INSERT INTO `access`(`Username`, `Password`) VALUES ('$uname','$pass')";
    
        if($conn->query($sql)===TRUE){
            $_SESSION['user'] = $uname;
            echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/main.php"/>';
        }
        else{
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/signup.php?pass=true"/>';
    }
    
   
}
    ?>

    <script>
        function myFunction(){
            var x = document.getElementById("create-password");
            var y = document.getElementById("confirm-password");
            if(x.type==="password" && y.type==="password"){
                x.type="text";
                y.type="text";
            }
            else{
                x.type="password"
                y.type="password"
            }
        }
    </script>
</body>
</html>