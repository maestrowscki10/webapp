<?php
session_start();
include "navbar.php"; ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $username = $_POST["username"];
 
  $password = $_POST["password"];




 $hash = "$2a$10$";
  $string = "iamacomputersciencestudent";
  $hashString = $hash . $string;
  $password = crypt($password, $hashString);

 

  $connection = mysqli_connect("localhost", "root", "pass", "maestro");
  if (!$connection) {

    echo  "<script>alert('no connection')</script>";
  }

    $query = " SELECT username FROM kaka WHERE username = '$username' ";
    $insertingData = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($insertingData);

     if(!$row) {echo  "<script>alert('user not')</script>";

     }

    $query = " SELECT password, id FROM kaka WHERE password='$password' ";
    $insertingData2 = mysqli_query($connection, $query);
    $row2 = mysqli_fetch_assoc($insertingData2);
    echo $row['password'] ;
    
    if($row2){
      $_SESSION["id"] = $row2["id"];
      echo $_SESSION["id"] ;
      echo "sucessfull login";
      header("location:home.php");

    }

    else {
   
      echo  "<script>alert('password is wrong')</script>";

    }

    

  } else {

    echo  "<script>alert('user doesn't exist')</script>";
  }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>

    <style>
#success_message{ display: none;}

    </style>
</head>
<body>
<div class="container d-flex justify-content-center">

<form class="well form-horizontal" style="max-width: 540px;padding:10px;" action="" method="POST"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>LOG IN</b></h2></center></legend><br>




<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Username</label>  
<div class="col-md-8 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="username" placeholder="Username" class="form-control"  type="text">
</div>
</div>
</div>



<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Password</label> 
<div class="col-md-8 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="password" placeholder="Password" class="form-control"  type="password">
</div>
</div>
</div>






<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4 "><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLogin <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
</div>
</div>
<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4">
Register<a href="register.php" class="text-info"> here</a>
</div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->
    
</body>
</html>
</body>
</html>