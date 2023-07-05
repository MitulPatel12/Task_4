<?php

include "db.php";

?>

<?php

session_start();
$error2 = "";
$error = "";
if (isset($_POST["login"])) {

    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query="SELECT * FROM `signin` WHERE `username`='$username' AND `password`='$password'";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $new_username = $row['username'];
    $new_password = $row['password'];


    
    if(empty($username) || empty($password)){
        $error2 = "Please fill both the fields";
        
    }else{
        if ($username == $new_username && $password == $new_password) {


    $query1 = "SELECT `id`, `username` FROM `signin` WHERE `username`='$username' AND `password`='$password'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    
    $id = $row1['id'];
    $user_name = $row1['username'];
    
    $query2 = "SELECT `access_type` FROM `usertype` WHERE `user_id` =$id";
    
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);
    
    $user_type = $row2['access_type'];

    $_SESSION['login'] = true;
    $_SESSION['user_type'] = $user_type;
    $_SESSION['user_name'] = $user_name;

    header("location: home_page.php");
        } else {
            $error = "Username and Password does not match";
        }
    }
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>LogIn Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<style>
    body{
            background-image:url('image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }
    .login_btn{
        background-color:lightgrey;
        border:none;
        color:black;
        border-radius:5px;
        padding:10px;
    }
    .login_btn:hover{
        background-color:black;
        color:white;
    }
</style>
</head>
<body>
<div class="signup-form">	
    <form action="" method="post">
		<h2>Log In</h2>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <input class="login_btn" type="submit" name="login" value="Log In"><br><br>
            <p class="error" ><?php echo $error; ?><?php echo $error2; ?></p>
            Don't have account?<a href="register.php">Register</a>
        </div>
    </form>
</div>
</body>
</html>