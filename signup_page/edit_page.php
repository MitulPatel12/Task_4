<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:login_page.php");
} 
else{



?>


<?php

include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `signin` WHERE `id` = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $address = $row['address'];
    $password = $row['password'];
    $image = $row['image'];

}
?>


<?php

include "db.php";

if(isset($_POST['update'])){


    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $image = $row['image'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../signup_page/image/" . $filename;



    $query2 = "UPDATE `signin` SET id='$id',username='$username',email='$email',`address`='$address',`password`='$password',`image`='$filename' WHERE id =$id";

    $result2 = mysqli_query($conn,$query2);  
    
    if(move_uploaded_file($tempname,$folder) || $result2){
        header("Location:home_page.php");
    }
    else{
        $error = "Updation error";
    }
    
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href= "style.css">
    <title>Edit Page</title>
    <style>
        body{
            background-image:url('image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }
        .form{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            text-align:center;
        }
        .inputfield{
            border:none;
            border-bottom:1px solid black;
            background:transparent;
            outline:none;
            font-size:20px;
        }
        table{
            border:none;
            text-align:center;
        }
        tr, td{
            border:none;
            text-align:center;
            padding:10px 0px;
            font-size:20px;
            text-align:left;
        }
        .editpage_btn{
            background-color:grey;
            color:black;
            padding:10px;
            border:none;
            border-radius:5px;
            font-size:20px;
            text-decoration:none;
        }
        .editpage_btn:hover{
            background-color:black;
            color:white;
        }
    </style>
</head>
<body>
    <div class="form">
    <h1>Update Details</h1>
    <div class = "details">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Choose Image</td>
                <td><input type="file" name="image" accept=".jpeg, .jpg, .png" value="<?php echo $image; ?>"></td>
            </tr>
            <tr>
                <td>ID</td>
                <td><input class="inputfield" type="number" name="id" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="inputfield" type="text" name="username" value="<?php echo $username; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="inputfield" type="email" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input class="inputfield" type="text" name="address" value="<?php echo $address; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="inputfield" type="text" name="password" value="<?php echo $password; ?>"></td>
            </tr>
        </table>
        <br>
        <span>
        <input class="editpage_btn" type="submit" name="update" value="Update">
        <a class="editpage_btn" href="home_page.php" class="btn">Back</a>
        </span>
    </form>
</div>
<div>

</div>
    </div>
</body>
</html>


<?php

    }

    ?>