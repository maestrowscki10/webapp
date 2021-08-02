
<?php
session_start();

include "nav.php"; ?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $course_name= ($_POST["course_name"]);
  $course_code = ($_POST["course_code"]);
  $department= ($_POST["department"]);
  $semister= ($_POST["semister"]);
  $year= ($_POST["year"]);
  $instructor= ($_POST["instructor"]);  
  $result = ($_POST["result"]);
  $id = $_SESSION["id"];
  
  $connection = mysqli_connect("localhost", "root", "pass", "maestro");
  if (!$connection) {

    echo "no conn";
  }

  $query = "INSERT INTO dada( course_name, course_code ,department , semister , year,instructor ,result, parent_id ) VALUES('$course_name', '$course_code','$department' , '$semister', '$year' ,'$instructor' ,'$result', '$id' )";


  $insertingData = mysqli_query($connection, $query);

  if (!$insertingData) {
    echo  "<script>alert('Inserting  data to the Db failed')</script>";
  } else {
   echo  "<script>alert('Inserting  data to the Db succesfull')</script>";
  }
  header("location:mycourses.php");
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
label {
    display: inline-block;
    width: 140px;
    height: 40px;
    text-align: left}
    




input {
align-items: left;
}
      
.cente{
margin-left: 30%;
}
    </style>

</head>
<body>
<div class="container d-flex justify-content-center">

<form class="well form-horizontal " style="max-width: 540px;" action="" method="POST"   >


<!-- Form Name -->
<legend><center><h2><b>Course Enrollment</b></h2></center></legend><br>

<div class="px-3">
            
            <label for="couse name">Course Name</label>
            <select class="form-select w-50 py-2 form-select-sm mb-3" name="course_name">
            <option >None</option>
              <option >Bachelor of Science in Agriculture</option>
              <option >Bachelor of Science in Computer Science</option>
              <option >Bachelor of Science in Computer Engineering</option>
              <option >Bachelor of Science in Business in Information Technology</option>
              <option >Bachelor of Arts</option>
              <option >Bachelor of Science in Statistics</option>
              <option >Bachelor of Science in Architecture</option>
              <option >Bachelor of Science in Land Management and Evaluation</option>
            </select><br>
            <label for="course code">Course Code</label>
            <select class="form-select w-50 py-2 form-select-sm mb-3" name="course_code">
            <option >None</option>
           
              <option >CS 171</option>
              <option >CS 158</option>
              <option >CS 173</option>
              <option >IS 143</option>
            </select><br>
          

           
            <label for="department">Course Department</label>
            <select class="form-select w-50 py-2 form-select-sm mb-3" name="department">
            <option >None</option>
            
              <option >CoICT</option>
              <option >CoET</option>
              <option>SJMS</option>
              <option>UDBS</option>
            </select><br>
            
              <label for="semister">Semister </label>
            <select class="form-select w-50 py-2 form-select-sm mb-3" name="semister">
            <option >None</option>
            
              <option >Semister 1</option>
              <option >Semister 2</option>
            </select><br>
            <label for="year">Academic Year</label>
          <select class="form-select w-50 form-select-sm mb-3" name="year">
          <option >None</option>
            <option >2020 / 2021</option>
            <option >2019 / 2020</option>
            <option >2018 / 2019</option>
            <option >2017 / 2018</option>
          </select><br>
          <label for="instructor">Course Instructor</label>
        <select class="form-select w-50 py-2  form-select-sm mb-3" name="instructor">
        <option >None</option>
           
          <option >Mr. qqq</option>
          <option >Mr. www</option>
          <option >Mr.eee</option>
        </select><br>
        <label for="grade">Result (Grade)</label>
      <select class="form-select w-50 py-2 form-select-sm mb-3" name="result">
      <option >None</option>
            
        <option >A</option>
        <option >B</option>
        <option >C</option>
        <option >D</option>
        <option >F</option>
      </select><br>

      <input class ="btn btn-primary" type="submit" name="sub" value="Submit">

          </form>

        </div>
</div>

      
      </div>
    </body>

</html>
