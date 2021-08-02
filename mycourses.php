<?php include "nav.php";
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">

<form class="well form-horizontal" action=""  id="contact_form">


<!-- Form Name -->
<legend><center><h2><b>MY REGISTERD COURSES</b></h2></center></legend><br>
<div>
<table class="table table-hover">
  <thead>
    
        
    <tr>
    <th scope="col">COURSE</th>
    <th scope="col">CODE</th>
    <th scope="col">DEPARTMENT</th>
    <th scope="col">SEMISTER</th>
    <th scope="col">YEAR</th>
    <th scope="col">INSTRUCTOR</th>
    <th scope="col">RESULT</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "pass";
  $dbname = "maestro";
  $id = $_SESSION["id"];
  $hash = "$2a$10$";


  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$sql = "SELECT course_name, course_code,department,semister,year,instructor,result FROM dada WHERE parent_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()){
      
    echo "<tr>";
    echo  "<td>". $row["course_name"]. "</td>" ; 
    echo "<td>" . $row["course_code"] ."</td>" ;
    echo  "<td>". $row["department"]."</td>" ;
    echo  "<td>" .$row["semister"]."</td>" ;
    echo  "<td>" .$row["year"] ."</td>";
    echo   "<td>".$row["instructor"]."</td>";  
    echo  "<td>". $row["result"]."</td>" ;
    
    echo "</tr>";
}}
echo "</table>";


      ?>
   
   
   
  </tbody>
</table>
</div>
      
      </div>
</body>
</html>