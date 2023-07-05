<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:login_page.php");
} 
else{



?>

<?php

include "db.php";

if(isset($_POST['add_user'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $access_type = $_POST['access'];
    
    
    global $conn;
    
    $select = " SELECT * FROM `signin` WHERE `username` = '$username' and `password` = '$password' ";
    
    $result = mysqli_query($conn, $select);
    
    
    
    if(mysqli_num_rows($result) > 0){
        
        $error = "User already exist";
        
    }else{
        
        $query = "INSERT INTO `signin`(`username`, `email`, `address`, `password`) VALUES ('$username','$email','$address','$password')";
        mysqli_query($conn, $query);
        
        
        $select1 = "SELECT `id` FROM `signin` WHERE `username` = '$username' and `password` = '$password'";
        $result1 = mysqli_query($conn, $select1);
        $row = mysqli_fetch_array($result1);
        $user_id = $row['id'];
        $query2 = "INSERT INTO `usertype`(`user_id`, `access_type`) VALUES ('$user_id','$access_type')";
        mysqli_query($conn, $query2);
        header('location:home_page.php');
     }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css"> 
    <style>
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            background-image:url('image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }
        .inputfield{
            padding: 0px 5px;
        }
        .adduser_btn{
            background-color: grey;
            color:black;
            text-decoration: none;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
        }
        .adduser_btn:hover{
            text-decoration:none;
            background-color: black;
            color:white;
        }
        .accesstype{
            background:lightgrey;
            border:none;
            border-radius:5px;
            padding:5px;
        }
    </style>
</head>
<body>
    <div class="signup-form">	
    <form method="post">
		<h2>Add New User</h2>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <select name="access" class="accesstype">
                    <option>Access Type</option>
                    <?php
                    $query1 = "SELECT * FROM `accesstype`";
                    $result1 = mysqli_query($conn,$query1);
                    while($row = mysqli_fetch_array($result1)){
                    echo"<option value=" . $row['access_type'] .">".$row['access_type']."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="adduser_btn" name="add_user" value="Add User"><p class="error"><?php echo "  ".$error; ?></p>
            <a class="adduser_btn" href="home_page.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>

<?php

                }

                ?>