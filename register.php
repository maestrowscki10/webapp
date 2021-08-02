<?php
session_start();
include "navbar.php"; ?>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hash = "$2a$10$";
  $string = "iamacomputersciencestudent";
  $hashString = $hash . $string;
  $password = crypt($password, $hashString);


  $file = $username . "-" . $_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
  $folder = "./file/";
  $new_file_name = strtolower($file);
  $final_file = str_replace(' ', '-', $new_file_name);

  $connection = mysqli_connect("localhost", "root", "pass", "maestro");
  if (!$connection) {
    echo  "<script>alert('no connection')</script>";
  } else echo "connected";


  move_uploaded_file($file_loc, $folder . $final_file);

  $query = " INSERT INTO kaka ( firstname , lastname , username, email, password, file )  VALUES ('$firstname',' $lastname',  '$username' , '$email', '$password' , '$final_file')";
  
  $insertingData = mysqli_query($connection, $query);

  var_dump($insertingData);

  if (!$insertingData) {
   
  } else {
  
    header("Location:login.php");
  }
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
    #success_messusername {
      display: none;
    }
  </style>



</head>


<body>




  <div class="container  d-flex justify-content-center">

    <form class="well form-horizontal" role="form" style="max-width: 540px;padding:10px;" action="" method="POST" id="contact_form" name="myForm" enctype="multipart/form-data">

      <fieldset>

        <!-- Form Name -->
        <legend>
          <center>
            <h2><b>Registration Form</b></h2>
          </center>
        </legend><br>

        <!-- Text input-->

        <div class="form-group bg-light">
          <label class="col-md-4 control-label">First Name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="firstname" placeholder="First Name" class="form-control" type="text"required>
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Last Name</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="lastname" placeholder="Last Name" class="form-control" type="text"required>
            </div>
          </div>
        </div>



        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Username</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="username" placeholder="Username" class="form-control" type="text"required>
            </div>
          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label">E-Mail</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input name="email" placeholder="E-Mail Address" class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="enter the right format for email"required>
            </div>
          </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label">Password</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="password" placeholder="Password" class="form-control" type="password"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required> 
            </div>
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-4 control-label">file</label>
          <div class="col-md-8 inputGroupContainer">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="file" placeholder="file" class="form-control" type="file"required>
            </div>
          </div>
        </div>


        <!-- Select Basic -->

        <!-- Success messusername -->
        <div class="alert alert-success" role="alert" id="success_messusername">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4"><br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegister <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
          </div>
        </div>
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-8"><br>
            &nbspif you have an account Log in<a href="login.php" class="text-info"> here</a>
          </div>
        </div>

      </fieldset>
    </form>
  </div>
  </div><!-- /.container -->

</body>

</html>