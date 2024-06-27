<?php
include "db_connect.php";
session_start();
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
        <span style="font-size: 35px;text-shadow: 0 0 5px white,0 0 5px white;text-align: center;">Student Management</span>
    </div>

    <div class="nav">
        <a href="main.php" >Home</a>
        <a href="output.php" class="active">Students's Details</a>
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
         if(isset($_GET["update"])){
            echo '<div class="msg">Your Details Updated Successfully</div>';
            echo '<meta http-equiv = "refresh" content = "10; url = http://localhost/ROHIT/output.php"/>';
         }
         if(isset($_GET["delete"])){
            echo '<div class="msg">Your Details Deleted Successfully</div>';
            echo '<meta http-equiv = "refresh" content = "10; url = http://localhost/ROHIT/output.php"/>';
         }


    ?>

    <div class="container" style="max-width:95%;height:500px;margin-top: 70px;">
    <div class="title">Students's Details</div><br>
    <table>
        <thead>
        <tr>
            <th style="width: 4%;">SNO.</th>
            <th style="width: 10%;">Name</th>
            <th style="width: 13%;">Father's Name</th>
            <th style="width: 9%;">College</th>
            <th style="width: 6%;">Course</th>
            <th style="width: 6%;">Year</th>
            <th style="width: 6%;">ID</th>
            <th style="width: 9%;">Gender</th>
            <th style="width: 9%;">Mobile</th>
            <th style="width: 15%;">Email</th>
            <th style="width: 4%;">City</th>
            <th style="width:9%">Actions</th>
        </tr>
        </thead>

        <?php
            $num = 1;
            $sql = "SELECT * FROM  info ";

            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo '<tbody>
                    <tr>
                        <th>'.$num.'</th>
                        <td>'.$row["Name"].'</td>
                        <td>'.$row["Father_Name"].'</td>
                        <td>'.$row["College_Name"].'</td>
                        <td>'.$row["Course"].'</td>
                        <td>'.$row["Year"].'</td>
                        <td>'.$row["College_ID"].'</td>
                        <td>'.$row["Gender"].'</td>
                        <td>'.$row["Mobile_Number"].'</td>
                        <td>'.$row["Email"].'</td>
                        <td>'.$row["City"].'</td>
                        <td><button type="submit" id='.$row["Id"].' class="edit" style="background-color:blue;color:white;width:40%;cursor: pointer;">Edit</button>
                        <button type="submit" id=d'.$row["Id"].' class="delete" style="background-color:blue;color:white;width:55%;cursor: pointer;">Delete</button></td>
                    </tr>
                </tbody>';
                    $num = $num+1;
            }
           
        ?>
        
    </table>
    
</div>

<div class="modal" id="modal">
       <div class="title">Edit Details<span class="close" name="close" id="close">&times;</span></div><br>
       <form action="" method="POST">
       <div class="one">
       <input type="hidden" name="snoedit" id="snoedit" class="box">
       <label for="nameedit" class="text">Name : </label><input type="text" id="nameedit" name="nameedit" class="box" placeholder="Enter your name" required><br><br>
       <label for="fnameedit" class="text">Father's Name : </label><input type="text" id="fnameedit" name="fnameedit" class="box" placeholder="Enter your father's name" ><br><br>
       <label for="mnameedit" class="text">College Name : </label><input type="text" id="cnameedit" name="cnameedit" class="box" placeholder="Enter your college name" required><br><br>
       <label for="courseedit" class="text">Course : </label><input type="text" id="courseedit" name="courseedit" class="box" placeholder="Enter course" required><br><br>
       <label for="yearedit" class="text">Year : </label><input type="number" id="yearedit" name="yearedit" placeholder="XXXX" class="box" required><br><br>
       <label for="cidedit" class="text">College Id : </label><input type="number" id="cidedit" name="cidedit" class="box" placeholder="XXXX" required><br><br>
       <label for="genderedit" class="text" style="margin-right:180px">Gender : </label><input type="radio" id="genderedit" name="genderedit" value="Male"><label style="margin-left:10px;margin-right:50px;font-size: x-large;font-family: serif;font-weight:500;">Male</label> 
                                                         <input type="radio" id="genderedit" name="genderedit" value="Female"><label style="margin-left:10px;font-size: x-large;font-family: serif;font-weight:500;">Female</label> <br><br>   
       <label for="mobileedit" class="text">Mobile No. : </label><input type="number" id="mobileedit"  name="mobileedit" class="box" placeholder="XXXXX-XXXXX" required><br><br>
       <label for="emailedit" class="text">Email : </label><input type="email" id="emailedit" name="emailedit" class="box" placeholder="abcd1234@gmail.com" required><br><br>
       <label for="addressedit" class="text">City : </label><input type="text" id="cityedit" name="cityedit" class="box" placeholder="Enter your city "><br><br><br>
       <input type="submit" class="button" id="save" name="save" value="Save Changes" style="float:right;text-align:center;cursor: pointer;">
   </form>
   </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo print_r($_POST);
    $id = $_POST["snoedit"];
    $name=$_POST["nameedit"];
    $fname=$_POST["fnameedit"];
    $cname=$_POST["cnameedit"];
    $course=$_POST["courseedit"];
    $year=$_POST["yearedit"];
    $cid=$_POST["cidedit"];
    $gender=$_POST["genderedit"];
    $mobile=$_POST["mobileedit"];
    $email=$_POST["emailedit"];
    $city=$_POST["cityedit"];

    $sql = "UPDATE `info` SET `Name`='$name',`Father_Name`='$fname',`College_Name`='$cname',`Course`='$course',
            `Year`='$year',`College_ID`='$cid',`Gender`='$gender',`Mobile_Number`='$mobile',`Email`='$email',`City`='$city'
             WHERE `Id`='$id'";

    if($conn->query($sql)){
        //echo "Successfull";
        echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/output.php?update=true"/>';
    }
    else{
        echo $conn->connect_error;
    }
}
if(isset($_GET["d"])){
    $snod = $_GET["d"];
    
    $sql = "DELETE FROM `info` WHERE `Id`='$snod'";
    if($conn->query($sql)){
        //echo "SUCCESSFULL";
        echo '<meta http-equiv = "refresh" content = "0; url = http://localhost/ROHIT/output.php?delete=true"/>';
    }
    else{
        echo $conn->connect_error;
    }
}
?>

<script>
        var modal = document.getElementById("modal"); 
        var btn = document.getElementById("edit");
        var span = document.getElementById("close");
        span.onclick=function(){
        modal.style.display="none";
        }
        
        edits = document.getElementsByClassName("edit");
        Array.from(edits).forEach((element)=>{element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
        fname = tr.getElementsByTagName("td")[1].innerText;
        cname = tr.getElementsByTagName("td")[2].innerText;
        course = tr.getElementsByTagName("td")[3].innerText;
        year = tr.getElementsByTagName("td")[4].innerText;
        cid = tr.getElementsByTagName("td")[5].innerText;
        gender = tr.getElementsByTagName("td")[6].innerText;
        mobile = tr.getElementsByTagName("td")[7].innerText;
        email = tr.getElementsByTagName("td")[8].innerText;
        city = tr.getElementsByTagName("td")[9].innerText;
        snoedit.value=e.target.id;
        nameedit.value=name;
        fnameedit.value=fname;
        cnameedit.value=cname;
        courseedit.value=course;
        yearedit.value=year;
        cidedit.value=cid;
        genderedit.value=gender;
        mobileedit.value=mobile;
        emailedit.value=email;
        cityedit.value=city;
        modal.style.display="block";
        console.log(snoedit.value);
    })})
   
        deletes=document.getElementsByClassName("delete");
        Array.from(deletes).forEach((element)=>{element.addEventListener("click",(e)=>{
            d_id = e.target.id.substr(1,);
            if(confirm("Do you really want to delete this Student detail")){
                console.log("Yes");
                window.location.assign("http://localhost/ROHIT/output.php?d="+d_id);
            }
            else{
                console.log("No");
            }
            console.log(d_id);
        })})

   
   
</script>

</body>
</html>