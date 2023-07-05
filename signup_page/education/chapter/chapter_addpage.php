<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:/PHP/signup_page/login_page.php");
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
    <title>Add Chapter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css"> 
    <style>
        body{
            margin:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            background-image:url('/PHP/signup_page/image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }
        .inputfield{
            padding: 0px 5px;
        }
        .addchap_btn{
            background-color: grey;
            color:black;
            text-decoration: none;
            width:52px;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
        }
        .addchap_btn:hover{
            text-decoration:none;
            background-color: black;
            color:white;
        }
        .subject_menu{
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
		<h2>Add New Chapter</h2>
		<div class="form-group">
            <div class="input-group">
                <input type="text" name="chapter" class="form-control" placeholder="Chapter Name">
            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" class="addchap_btn" name="add_chapter" value="Add"><p class="error"><?php echo "  ".$error; ?></p>
            <a class="addchap_btn" href="/PHP/signup_page/education/education_homepage.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>



<?php


if(isset($_POST['add_chapter'])){

    $chap_name = $_POST['chapter'];
    global $conn;

    $select = "SELECT `chapter_name` FROM `chapter` WHERE `chapter_name` = '$chap_name'"; 
    $result = mysqli_query($conn, $select);
    
    
    
    if(mysqli_num_rows($result) > 0){
        
        $error = "Chapter already exist";
        
    }else{
        
        $query = "INSERT INTO `chapter` (`chapter_name`) VALUES ('$chap_name')";
        $result1 = mysqli_query($conn, $query);
        header('location:/PHP/signup_page/education/education_homepage.php');
     }

}


?>


<?php

}

?>