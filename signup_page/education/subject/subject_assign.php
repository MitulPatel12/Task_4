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
    <title>Assign Subject</title>
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
        .addstd_btn{
            background-color: lightgrey;
            color:black;
            text-decoration: none;
            border: none;
            padding: 10px;
            font-size: 15px;
            border-radius: 5px;
        }
        .addstd_btn:hover{
            text-decoration:none;
            background-color: black;
            color:white;
        }
        .select_menu{
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
		<h2>Assign Subject to Standard</h2>

        <?php 
            session_start();
                echo "
                <div class='form-group'>
                <div class='input-group'>
                <select name='assign_sub' class='select_menu'>
                    <option>Select Subject</option>";
                    $query2 = "SELECT * FROM `subject` ";
                    $result2 = mysqli_query($conn,$query2);
                    while($row = mysqli_fetch_array($result2)){
                        echo "<option value=" . $row['id'] . ">" . $row['sub_name'] . "</option>";
                    }
                
                echo "</select>
                </div>
                </div>
                ";



                echo "
                <div class='form-group'>
                <div class='input-group'>
                <select name='assign_standard' class='select_menu'>
                    <option>Select Standard</option>";
                    $query2 = "SELECT * FROM `standard` ";
                    $result2 = mysqli_query($conn,$query2);
                    while($row = mysqli_fetch_array($result2)){
                        echo "<option value=" . $row['id'] . ">" . $row['std_name'] . "</option>";
                    }
                
                echo "</select>
                </div>
                </div>
                ";
        ?>
        
        <div class="form-group">
            <input type="submit" class="addstd_btn" name="assign_subject" value="Assign"><p class="error"><?php echo "  ".$error; ?></p>
            <a class="addstd_btn" href="/PHP/signup_page/education/education_homepage.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>



<?php

if(isset($_POST['assign_subject'])){


    $assign_sub = $_POST['assign_sub'];
    $assign_standard = $_POST['assign_standard'];
    $select = "INSERT INTO `standard_subject`(`std_id`, `sub_id`) VALUES ('$assign_sub','$assign_standard')";
    $result = mysqli_query($conn,$select);
    header('location:/PHP/signup_page/education/education_homepage.php');

}


?>


<?php

}

?>