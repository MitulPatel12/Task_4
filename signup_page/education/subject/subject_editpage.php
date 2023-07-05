<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:/PHP/signup_page/login_page.php");
} 
else{



?>

<?php

include "db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `subject` WHERE `id` = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $sub_name = $row['sub_name'];

}
?>


<?php

include "db.php";

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $sub_name = $_POST['sub_name'];

    $query2 = "UPDATE `subject` SET `id`='$id',`sub_name`='$sub_name' WHERE `id` = $id";

    $result2 = mysqli_query($conn,$query2);  
    
    if(!$result2){
        $error = "Updation error";
    }
    else{
        header("location:/PHP/signup_page/education/education_homepage.php");
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
    <title>Subject Edit Page</title>
    <style>
        body{
            background-image:url('/PHP/signup_page/image/background.jpg');
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
                <td>ID</td>
                <td><input class="inputfield" type="number" name="id" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>Subject</td>
                <td><input class="inputfield" type="text" name="sub_name" value="<?php echo $sub_name; ?>"></td>
            </tr>   
        </table>
        <br>
        <span>
        <input class="editpage_btn" type="submit" name="update" value="Update"><p class="error"><?php echo "  ".$error; ?></p>
        <a class="editpage_btn" href="/PHP/signup_page/education/education_homepage.php" class="btn">Back</a>
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