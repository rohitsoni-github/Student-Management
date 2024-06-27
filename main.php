<?php
include "db_connect.php";
session_start();
//$insert=false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body bgcolor="aquamarine">
    <link rel="stylesheet" href="main.css">
    <?php
    if(!isset($_SESSION['user'])){
        echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/login.php"/>';
    }
    ?>
    
    <div class="top">
        <span style="font-size: 35px;text-shadow: 0 0 5px white,0 0 5px white;">Student Management</span>
    </div>

    <div class="nav">
        <a href="main.php" class="active">Home</a>
        <a href="output.php" >Students's Details</a>
        <a href="contact.php" >Contact</a>
        
            <?php  
            if(isset($_SESSION["user"])){
               $profile =  $_SESSION["user"];
               echo '<div class="rnav"><a href="#">'.$profile.'</a>
                  <a href="logout.php">Logout</a></div>';
            }
            else{
               echo '<div style="margin-left:1430px"><a href="login.php">Login</a></div>';
            }
            ?>
        
    </div>

    <?php
        if(isset($_GET["insert"])){
            echo '<div class="msg">Your Details Submited Successfully</div>';
            echo '<meta http-equiv = "refresh" content = "10; url = http://localhost/ROHIT/main.php"/>';
        }

    ?>

    <div class="container">
       
    <div class="title">Registration Form</div><br>
    <form action="" method="POST">
    <div class="one">
    <label for="name" class="text">Name : </label><input type="text" id="name" name="name" class="box" placeholder="Enter your name" required><br><br>
    <label for="fname" class="text">Father's Name : </label><input type="text" id="fname" name="fname" class="box" placeholder="Enter your father's name" ><br><br>
    <label for="mname" class="text">College Name : </label><input type="text" id="cname" name="cname" class="box" placeholder="Enter your college name" required><br><br>
    <label for="course" class="text">Course : </label><input type="text" id="course" name="course" class="box" placeholder="Enter course" required><br><br>
    <label for="year" class="text">Year : </label><input type="number" id="year" name="year"  placeholder="XXXX" class="box" required><br><br>
    <label for="cid" class="text">College Id : </label><input type="number" id="cid" name="cid" class="box" placeholder="XXXX" required><br><br>
    <label for="gender" class="text" style="margin-right:130px">Gender : </label><input type="radio" id="gender" name="gender" value="Male"><label style="margin-left:10px;margin-right:50px;font-size: x-large;font-family: serif;font-weight:500;">Male</label> 
                                                      <input type="radio" id="gender" name="gender" value="Female"><label style="margin-left:10px;font-size: x-large;font-family: serif;font-weight:500;">Female</label> <br><br>   
    <label for="mobile" class="text">Mobile No. : </label><input type="number" id="mobile"  name="mobile" class="box" placeholder="XXXXX-XXXXX" required><br><br>
    <label for="email" class="text">Email : </label><input type="email" id="email" name="email" class="box" placeholder="abcd1234@gmail.com" required><br><br>
    <label for="address" class="text">City : </label><input type="text" id="city" name="city" class="box" placeholder="Enter your city "><br><br><br>
    <input type="submit" class="button"  id="submit"  name="submit">&nbsp;&nbsp;&nbsp;
    <input type="reset" class="button"  id="reset" name="reset">
</div>
</form>
</div>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST["name"];
$fname=$_POST["fname"];
$cname=$_POST["cname"];
$course=$_POST["course"];
$year=$_POST["year"];
$cid=$_POST["cid"];
$gender=$_POST["gender"];
$mobile=$_POST["mobile"];
$email=$_POST["email"];
$city=$_POST["city"];

//echo "<h1 style='text-align: center;color: rgb(9, 14, 134);font-size: 50px;font-weight: bolder;text-decoration: underline;''>Your details</h1>";

$sql= "INSERT INTO `info`(`Name`, `Father_Name`, `College_Name`, `Course`, `Year`, `College_ID`, `Gender`, `Mobile_Number`, `Email`, `City`)
         VALUES ('$name','$fname','$cname','$course','$year','$cid','$gender','$mobile','$email','$city')";

if($conn->query($sql)===TRUE){
    //$insert=true;
    echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/main.php?insert=true"/>';
}
else{
    echo "Error : ". $sql . "<br>" . $conn->error;
}
}

?>

</body>
</html>