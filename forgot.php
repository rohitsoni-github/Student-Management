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
    
    <div class="container" style="max-height: 250px;margin-top: 150px;">
        <h1>Forget Password</h1>
        <form action="" method="POST">

            <input type="text" class="one" name="cuser" id="cuser" placeholder="Enter Your Username">
            <button type="submit" name="check" id="check" style="background-color: darkslategrey;color: white;font-size: larger;width: 80%; margin-left:45px;padding: 6px;margin-top: 25px;">Check</button>
            
        </form>
    </div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$cname=$_POST["cuser"];

$sql = "SELECT * FROM  access WHERE Username='$cname'";

$result = $conn->query($sql);

if(mysqli_num_rows($result) === 1){

    $row = $result->fetch_assoc();

    if($cname === $row["Username"]){
        $_SESSION['cname'] = $cname;
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/newpassword.php"/>';
    }

        
}
else{
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/login.php?user=true"/>';
     }
   
    }

?>