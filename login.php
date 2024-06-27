<?php
session_start();
include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body bgcolor="aquamarine">
    <link rel="stylesheet" href="login-signup.css">
    
    <div class="top">
        <span style="font-size: 35px;text-shadow: 0 0 5px white,0 0 5px white;">Student Management</span>
    </div>

    <?php
        if(isset($_GET["user"])){
            echo '<div class="msg" style="margin-left:660px">User not Found !!</div>';
            echo '<meta http-equiv = "refresh" content = "5; url = http://localhost/ROHIT/login.php"/>';
        }
        if(isset($_GET["pass"])){
            echo '<div class="msg" style="margin-left:580px;">Password Updated Successfully!!</div>';
            echo '<meta http-equiv = "refresh" content = "5; url = http://localhost/ROHIT/login.php"/>';
        }
    ?>

    <div class="container">
        <h1>Login</h1>
        <form action="" method="POST" >
            <input type="text" class="one" name="username" id="username" placeholder="Username" required>
            <input type="password" class="one" name="password" id="password" placeholder="Password" required><br>
            <input type="checkbox" style="margin-top: 20px; margin-left: 35px;" onclick="myFunction()">Show Password
            <a href="forgot.php" style="text-decoration: none;color:blue" ><h4 style="text-align: center;">Forget Password ?</h4></a>
            <button type="submit" name="login" id="login" style="background-color:darkslategrey;color: white;font-size: larger;width: 80%; margin-left:45px;margin-top: 15px; padding: 6px;" onclick="return check()">Login</button>
            <br><br><br><hr style="width: 90%; border: 1px solid black;" text="Or">
            <h4 style="text-align: center;font-size: larger;">Don't have an account?</h4>
            <a href="signup.php" style="text-decoration: none;color: blue;"><h4 style="text-align: center;">Sign-Up</h4></a>
        
        </form>
    </div>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
$uname=$_POST["username"];
$pass=$_POST["password"];

$sql = "SELECT * FROM  access WHERE Username='$uname' AND Password='$pass'";

$result = $conn->query($sql);

if(mysqli_num_rows($result) === 1){

    $row = $result->fetch_assoc();

    /*var_dump($row);
    $u=$row["Username"];
    $p=$row["Password"];*/

    if($uname === $row["Username"] && $pass === $row["Password"]){
    //echo "Logged in";
    $_SESSION['user'] = $row['Username'];
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/main.php"/>';
    }
        
}
else{
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/login.php?user=true"/>';
     }
    
    }

?>

    <script>
        function myFunction(){
            var x = document.getElementById("password");
            if(x.type==="password"){
                x.type="text";
            }
            else{
                x.type="password"
            }
        }
       

    </script>
</body>
</html>