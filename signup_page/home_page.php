<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:login_page.php");
} 
else{

?>


<?php

include "db.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            background-image:url('image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }
        .homepage_btn{
            background-color:lightgrey;
            text-decoration:none;
            color:black;
            padding:10px;
            border: none;
            font-size:20px;
            border-radius:5px;
            cursor:pointer;
        }
        
        .homepage_btn:hover{
            background-color:black;
            color:white;
        }
        .heading{
            text-align:center;
            color:red;
        }
        .details{
            text-align:center;
        }
    </style>
</head>
<body>

    <div class="home">
        <form action="" method="post">
        <div class="heading">
            <span><h1>Welcome <?php
            echo $_SESSION['user_type'] . " " . $_SESSION['user_name'];?></h1></span>
        </div>
        <div class="details">
        <a class="homepage_btn" href="add_user.php">Add User</a>

        <input class="homepage_btn" type="submit" name="show" value="Show">

        <?php 

        echo "<a class='homepage_btn' href='education/education_homepage.php' >Education</a> ";

        ?>

        <input class="homepage_btn" type="submit" name="logout" value="Log Out">
        </div>

        </form><br><br>
    </div>
</body>
</html>


<?php
include "show_data.php";
?>




<?php
 if(isset($_POST['logout'])){

    unset($_SESSION["username"]); 
    unset($_SESSION['login']);
    header("Location: login_page.php");
 }

?>


<?php
}
?>