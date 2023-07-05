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
    <title>Assign Chapter</title>
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
		<h2>Assign Chapter to Subject</h2>

        <?php
                echo "
                <div class='form-group'>
                <div class='input-group'>
                <select name='assign_chap' class='select_menu'>
                    <option>Select Chapter</option>";
                    $query2 = "SELECT * FROM `chapter` ";
                    $result2 = mysqli_query($conn,$query2);
                    while($row = mysqli_fetch_array($result2)){
                        echo "<option value=" . $row['id'] . ">" . $row['chapter_name'] . "</option>";
                    }
                
                echo "</select>
                </div>
                </div>
                ";



                echo "
                <div class='form-group'>
                <div class='input-group'>
                <select name='assign_subject' class='select_menu'>
                    <option>Select Subject</option>";
                
                    $query1 = "SELECT * FROM `subject`";
                    $result1 = mysqli_query($conn,$query1);
                    while($row = mysqli_fetch_array($result1)){
                    echo"<option value=" . $row['id'] .">".$row['sub_name']."</option>";
                    }    
                echo "</select>
            </div>
        </div>";
        ?>
        
        <div class="form-group">
            <input type="submit" class="addstd_btn" name="assign_chapter" value="Assign"><p class="error"></p>
            <!-- <input type="submit" class="addstd_btn" value="show" name="show"><br><br> -->
            <a class="addstd_btn" href="/PHP/signup_page/education/education_homepage.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>



<?php

if(isset($_POST['assign_chapter'])){



    $assign_chap = $_POST['assign_chap'];
    $assign_subject = $_POST['assign_subject'];
    $select = "INSERT INTO `subject_chapter`(`sub_id`, `chap_id`) VALUES ('$assign_chap','$assign_subject')";
    $result = mysqli_query($conn,$select);
    header('location:/PHP/signup_page/education/education_homepage.php');


}


// if(isset($_POST['show'])){

    
// }


?>


<?php
}
?>
