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
    <title>Education Home Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            background-image:url('/PHP/signup_page/image/background.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
        }

        table{
        background:lightgrey;
        padding:15px;
        border:none;
        border-radius:5px;
        border-spacing:0;

        }
        th, td{
        border-spacing:0;
        border: 1px solid black;
        padding: 5px 10px;
        }
        .educationpage_btn{
            background-color:lightgrey;
            text-decoration:none;
            color:black;
            padding:10px;
            border: none;
            font-size:20px;
            border-radius:5px;
            cursor:pointer;
        }
        
        .educationpage_btn:hover{
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
    <div>
        <form acttion="" method ="post">
            <div class="heading">
                <span><h1>Welcome <?php session_start(); echo $_SESSION['user_type'] . " " . $_SESSION['user_name']; ?> to education Page</h1></span>
            </div>
            <div class="details">
            <input class="educationpage_btn" type="submit" name ="standard" value="Standard">
            <input class="educationpage_btn" type="submit" name ="subject" value="Subject">
            <input class="educationpage_btn" type="submit" name ="chapter" value="Chapter">
            <?php
            if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'Teacher'){
                echo "<a class='educationpage_btn' href='standard/standard_assign.php'>Assign Standard</a>
                
                <a class='educationpage_btn' href='subject/subject_assign.php'>Assign Subject</a>";
                
            }
            ?>
            <?php

            if($_SESSION['user_type'] == 'admin'){
                echo "<a class='educationpage_btn' href='chapter/chapter_assign.php'>Assign Chapter</a>";

            }
            ?>    
            
            
            <a class="educationpage_btn" href="/PHP/signup_page/home_page.php">Back</a>
            </div>
        </form><br>
    </div>
</body>
</html>



<?php 

include "standard/standard_function.php";

include "subject/subject_function.php";

include "chapter/chapter_function.php";

include "student/student_data.php";
?>


<?php
}
?>