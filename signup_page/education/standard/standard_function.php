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

<?php


if(isset($_GET['id'])){
    global $conn;
    $id = $_GET['id'];
    $query = "DELETE FROM `standard` WHERE `id`='$id'";
    $delete = mysqli_query($conn,$query);
    if($delete){
        $_POST['standard'] = true;
        header('location:/PHP/signup_page/education/education_homepage.php');
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standard Data</title>
    <style>
        .action_btn{
            background-color:lightgrey;
            text-decoration:none;
            color:black;
            padding: 0px 10px;
            border: none;
            font-size:20px;
            border-radius:5px;
            cursor:pointer;
        }
        
        .action_btn:hover{
            background-color:black;
            color:white;
        }

        .action{
            text-align:center;
        }

    </style>
</head>
<body>
    
</body>
</html>


<?php

include "db.php";


if(isset($_POST['standard'])){

    $id = $_POST['id'];
    $std_name = $_POST['std_name'];
    global $conn;

    $query = "SELECT * FROM `standard`";
    $result = mysqli_query($conn,$query);

    echo "<table align=center >
    
    <tr>

    <th>ID</th>
    <th>Standard</th>";
    if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'Teacher'){

        echo "<th colspan=3>Action</th>";
    }

    echo "<tr>
    ";

    while($row = mysqli_fetch_array($result)){
        
        echo "<tr>";

        echo "<td>" . $row['id'] . "</td>";
   
        echo "<td>" . $row['std_name'] . "</td>";

        if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'Teacher'){
            echo "<td>" . "<a class='action_btn' href='standard/standard_editpage.php?id=".$row['id']."'> Edit </a>" . "</td>" ;
      
            echo "<td>" . "<a class='action_btn' href='education_homepage.php?id=".$row['id']."'> Delete </a>" . "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br>";

    echo "<div class='action'> ";

    if($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'Teacher'){
        echo "<a href='standard/standard_addpage.php?id=".$row['id']."'><input type= 'submit' name='add_standard' class='educationpage_btn' value='Add Standard'></a>";
    }

    


}


?>


<?php
}
?>