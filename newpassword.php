<?php
include "db_connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body bgcolor="aquamarine">
    <link rel="stylesheet" href="login-signup.css">
    
    <div class="top">
        <span style="font-size: 35px;text-shadow: 0 0 5px white,0 0 5px white;">Student Management</span>
    </div>

    <?php
        if(isset($_GET["pass"])){
            echo '<div class="msg">Password did not Match!!</div>';
            echo '<meta http-equiv = "refresh" content = "5; url = http://localhost/ROHIT/newpassword.php"/>';
        }

    ?>
    
    <div class="container" style="max-height: 390px;margin-top: 100px;">
        <h1>Forget Password</h1>
        <form action="" method="POST">

        <input type="password" class="one" name="new-password" id="new-password" placeholder="New Password"><br>
        <input type="password" class="one" name="confirm-password" id="confirm-password" placeholder="Confirm Password"><br>
        <input type="checkbox" style="margin-top: 20px; margin-left: 35px;" onclick="myFunction()">Show Password
        <button type="submit" name="create" id="create" style="background-color: darkslategrey;color: white;font-size: larger;width: 80%; margin-left:45px;padding: 6px;margin-top: 50px;">Create</button>
            
        </form>
    </div>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$cname=$_SESSION["cname"];
$npass = $_POST['new-password'];
$cpass = $_POST['confirm-password'];

if($npass == $cpass){

$sql = "UPDATE `access` SET `Password`='$cpass' WHERE `Username`='$cname'";

if($conn->query($sql)){
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/login.php?pass=true"/>';    
}
}
else{
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/newpassword.php?pass=false"/>';
    }
}
?>
<script>
        function myFunction(){
            var x = document.getElementById("new-password");
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
