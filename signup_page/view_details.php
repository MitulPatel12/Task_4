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
    $file_name= $_FILES['image']['name'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View Details</title>
    <style>
        body{
            background-image:url('image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            text-align:center;
        }
        .all-details{
            background:lightgrey;
            width:30%;
            border-radius:5px;
        }
        table{
            border-spacing:0;
        }
        td{
            border:1px solid black;
            font-size:20px;
            padding: 5px 10px;
        }
        .view_data{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }
        .view_back_btn{
            text-align:center;
            padding:20px;
        }
        a{
            background-color:lightgrey;
            padding:10px;
            font-size:20px;
            border-radius:5px;
            cursor:pointer;
            text-decoration:none;
            color:black;
        }
        a:hover{
            background-color:black;
            color:white;
        }

        .img{
            width:150px;
            height:150px;
            border-radius:50%;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    <div class="all-details">
    <h1><?php echo $username."'s " ?>Details</h1>

    <div>
    <img class="img" src="../signup_page/image/<?php echo $image; ?>" alt="<?php echo $username . '`sProfile Image'; ?>">
    </div>
    <div class="view_data">
    <table>
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $address; ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo $password; ?></td>
        </tr>
    </table>
    
    </div><br>
    <div class="view_back_btn">
        <span><a href="home_page.php" class="btn">Back</a></span>
    </div>
    </div>
</body>
</html>


<?php

    }

    ?>