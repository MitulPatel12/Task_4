<?php

session_start();

if(!(isset($_SESSION['login'])) || $_SESSION['login']!== true ){
    header("location:login_page.php");
} 
else{



?>

<?php

include "db.php";


//delete data
if(isset($_GET['id'])){
  global $conn;
  $id = $_GET['id'];
  $query = "DELETE FROM `signin` WHERE `id`='$id'";
  $delete = mysqli_query($conn,$query);
  $_POST['show'] = true;
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        display:flex;
        justify-content:center;
        align-items:center;
        background-image:url('image/background.jpg');
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
        text-align:center;
      }
      .showdata_btn{
        background-color:lightgrey;
        text-decoration:none;
        color:black;
        padding: 3px 10px;
        font-size:15px;
        border-radius:5px;
        cursor:pointer;
      }
      .showdata_btn:hover{
        background-color:black;
        color:white;
      }
      .showdata_backbtn{
        text-decoration:none;
        font-size:20px;
        color:black;
        background-color:lightgrey;
        padding:10px;
        border-radius:5px;
      }
      .showdata_backbtn:hover{
        background-color:black;
        color:white;
      }
    </style>
</head>
<body>
    
</body>
</html>
<?php


if(isset($_POST['show'])){
    include "db.php";
    global $conn;
    
    $query = "SELECT * FROM `signin`";
    $result = mysqli_query($conn,$query);

  echo "<table align=center>
  
  <tr>

  <th>ID</th>
  
  <th>Name</th>
  
  <th>Email</th>
  
  <th>Address</th>
  
  <th>Password</th>

  <th>Image</th>

  <th colspan=3>Action</th>

  </tr>";
  
  while($row = mysqli_fetch_array($result))
  
    {
  
    echo "<tr>";

    echo "<td>" . $row['id'] . "</td>";
   
    echo "<td>" . $row['username'] . "</td>";
  
    echo "<td>" . $row['email'] . "</td>";
  
    echo "<td>" . $row['address'] . "</td>";
  
    echo "<td>" . $row['password'] . "</td>";

    echo "<td>" . $row['image'] . "</td>";

    echo "<td>" . "<a class='showdata_btn' href='edit_page.php?id=".$row['id']."'> Edit </a>" . "</td>" ;
  
    echo "<td>" . "<a class='showdata_btn' href='home_page.php?id=".$row['id']."'> Delete </a>" . "</td>";

    echo "<td>" . "<a class='showdata_btn' href='view_details.php?id=".$row['id']."'> View </a>" . "</td>";

    echo "</tr>";
  
    }
  
  echo "</table>";
  echo "<br><br>";

  echo "<div style='text-align:center;'> ";
  echo "<a class='showdata_backbtn' href='home_page.php'>Back</a>";
  echo "</div>";

}


?>


<?php

}

?>